<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Advertising;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->count();
        $advertisings = Advertising::all()->count();
        $usualUsers = User::where('role',0)->get()->count();
        $premiumUsers = User::where('role',1)->get()->count();
        return view('admin.dashboard',[
            'menu'=>'dashboard',
            'selected'=>'dashboard',
            'posts'=>$posts,
            'advertisings'=>$advertisings,
            'usualUsers'=>$usualUsers,
            'premiumUsers'=>$premiumUsers
        ]);
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('web.login');
    }

    public function aboutUs()
    {
        $aboutUs = About::first();
        return view('admin.about_us',[
            'aboutUs'=>$aboutUs,
            'selected'=>'aboutUs',
            'menu'=>'dashboard',

        ]);

    }
    public function updateAboutUs(Request $request)
    {
        $aboutUs = About::first();
        $aboutUs->description = $request->input('description');
        if ($request->has('image')){
            $imageName = time().'.'.$request->image->extension();
            $path = '/uploads/images/aboutUs/';
            $request->image->move(public_path($path), $imageName);
            $filePath = $path.$imageName;
            /* Store $imageName name in DATABASE from HERE */
            $aboutUs->image = $filePath;

        }
        $result = $aboutUs->save();
        if ($result){
            return redirect()->route('about_us.admin')->with('success','درباره ما با موفقیت ویرایش شد.');
        }else{
            return redirect()->route('about_us.admin')->with('error','خطا در ویرایش درباره ما.');
        }
    }

}
