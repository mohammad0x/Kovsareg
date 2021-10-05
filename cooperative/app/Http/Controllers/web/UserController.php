<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerUser(RegisterRequest $request)
    {
        $name = $request->input('name');
        $family = $request->input('family');
        $address = $request->input('address');
        $password = $request->input('password');
        $mobile = $request->input('mobile');

        $user = new User();
        $user->name = $name;
        $user->role = 0;
        $user->family = $family;
        $user->address = $address;
        $user->mobile = $mobile;
        $user->password = Hash::make($password);
        $result = $user->save();
        if ($result){
            return redirect()->route('web.login')->with('success','ثبت نام شما با موفقیت انجام شد.
            جهت ورود شماره موبایل و کلمه عبور خود را وارد نموده و برروی ورود کلیک نمایید
            ');
        }else{
            return redirect()->route('web.register')->with('error','در عملیات ثبت نام شما خطایی رخ داده است،لطفا مجددا تلاش بفرمایید.');
        }
    }

    public function loginUser(LoginRequest $request)
    {
        $mobile = $request->input('mobile');
        $password = $request->input('password');

        if (Auth::guard('admin')->attempt([
            'mobile'=>$mobile,
            'password'=>$password
        ])){
            return redirect()->route('index.admin');
        }elseif(Auth::guard('user')->attempt([
            'mobile'=>$mobile,
            'password'=>$password
        ])){
            if (Auth::guard('user')->user()->role == 1){
                return redirect()->route('index.premium');
            }
            else{

                return redirect()->route('web.index');
            }
        }else
            return redirect()->route('web.login')->with('error','نام کاربری یا رمز عبور اشتباه است.');


    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('web.login');
    }
}
