<?php

namespace App\Http\Controllers\premium;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PremiumController extends Controller
{
    public function premium()
    {

        $id = Auth::guard('user')->user()->id;
        $user = Auth::guard('user')->user();
        $branch = Auth::guard('user')->user()->branch;
        $myAdvertisings = Advertising::where('user_id',$id)->get()->count();
        $advertisings = Advertising::all()->count();
        return view('premium.index',
        [
            'selected'=>'dashboard',
            'menu'=>'dashboard',
            'myAdvertisings'=>$myAdvertisings,
            'advertisings'=>$advertisings,
            'branch'=>$branch,
            'user'=>$user
        ]
        );
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('web.login');

    }
}
