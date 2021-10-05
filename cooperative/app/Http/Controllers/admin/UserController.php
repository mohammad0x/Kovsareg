<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VipRequest;
use App\Models\Advertising;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function CreateUsers()
    {
                $branches = Branch::all();
                
        return view('admin.create_users',
        [
            'menu'=>'users',
            'selected'=>'createUser',
            'branches'=>$branches
        ]);
    }

    public function registerUser(RegisterRequest $request)
    {
        $name = $request->input('name');
        $family = $request->input('family');
        $address = $request->input('address');
        $mobile = $request->input('mobile');
        $role = $request->input('role');
        $branch = $request->input('branch');
        
        $password = $request->input('password');
        $user = new User();
        $user->name = $name;
        $user->family = $family;
        $user->mobile = $mobile;
        $user->address = $address;
        $user->role = $role;
        $user->branch_id = $branch;

        $user->password = Hash::make($password);
        $result = $user->save();
        if ($result) {
            if ($result) {
                return redirect()->route('users.admin')->with('success','کاربر با موفقیت اضافه شد.');
            } else
                return redirect()->route('create_user.admin')->with('error','کاربر اضافه نشد.');
        }
    }
    public function users()
    {
        $users = User::where('role',0)->get();
        return view('admin.users',[
            'users'=>$users,
            'menu'=>'users',
            'selected'=>'users'
        ]);
    }
    public function premium()
    {
        $users = User::where('role',1)->get();
        return view('admin.users',[
            'users'=>$users,
            'menu'=>'users',
            'selected'=>'premiumUsers'
        ]);
    }

    public function userDetails($id)
    {
        $user = User::findOrFail($id);
        $branches = Branch::all();
        return view('admin.user_details',[
            'user'=>$user,
            'menu'=>'users',
            'branches'=>$branches,
            'selected'=>'userDetails'
        ]);
    }

    public function updateRole(VipRequest $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        $user->role = $request->input('role');
        $user->branch_id = $request->input('branch');
        $result = $user->save();
        if ($result){
            return redirect()->route('users.admin')->with('success','نقش کاربر با موفقیت اعمال شد.');
        }else{
            return redirect()->route('users.admin')->with('error','خطا در اعمال نقش کاربر.');
        }
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        if ($user){
            $result = $user->delete();
            $advertisings = Advertising::where('user_id',$user->id)->get();
            foreach ($advertisings as $advertising){
                $advertising->delete();
            }
            if ($result){
                return redirect()->route('users.admin')->with('success','با موفقیت حذف شد.');
            }else{
                return redirect()->route('users.admin')->with('error','خطا در حذف کاربر.');;
            }
        }else{
            return redirect()->route('users.admin')->with('error','خطا در حذف کاربر.');;

        }

    }
}
