<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\About;
use App\Models\Advertising;
use App\Models\Category;
use App\Models\Order;
use App\Models\Post;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WebController extends Controller
{
    public function register()
    {
        return view('web.register');
    }

    public function registerUser(RegisterRequest $request)
    {
        $name = $request->input('name');
        $family = $request->input('family');
        $password = $request->input('password');
        $mobile = $request->input('mobile');

        $user = new User();
        $user->name = $name;
        $user->family = $family;
        $user->password = Hash::make($password);
        $user->mobile = $mobile;
        $result = $user->save();
        if ($result){
            return redirect()->route('web.login');
        }else{
            return redirect()->route('web.register');
        }
    }

    public function login()
    {
        return view('web.login');
    }
    public function loginUser(LoginRequest $request)
    {
        $mobile = $request->input('mobile');
        $password = $request->input('password');

        if (Auth::attempt([
            'mobile'=>$mobile,
            'password'=>$password
        ])){
            return redirect()->route('web.index');
        }else{
            return redirect()->route('web.login');
        }
    }

    public function index()
    {
        $advertisings = Advertising::where('verified',1)->paginate(12);
        $categories = Category::all();
        $slides = Post::where('status',1)->take(3)->get();
        $newPosts = Post::where('status',1)->skip(3)->take(5)->get();
        return view('web.index',
        [
            'slides'=>$slides,
            'categories'=>$categories ,
            'posts'=>$newPosts,
            'newPosts'=>$newPosts,
            'advertisings'=>$advertisings
        ]);
    }
    public function home()
    {
        $advertisings = Advertising::where('verified',1)->paginate(12);
        $categories = Category::all();
        $slides = Post::where('status',1)->take(3)->get();
        $newPosts = Post::where('status',1)->skip(3)->take(5)->get();

        return view('web.index',
            [
                'slides'=>$slides,
                'categories'=>$categories ,
                'posts'=>$newPosts,
                'newPosts'=>$newPosts,
                'advertisings'=>$advertisings
            ]);
    }
    public function postDetails($id)
    {
        $slides = Post::where('status',1)->take(3)->get();
        $newPosts = Post::where('status',1)->skip(3)->take(5)->get();
        $post = Post::where('id',$id)->first();

        if ($post != null){

            return view('web.postDetails',[
                'newPosts'=>$newPosts,
                'post'=>$post,
                'slides'=>$slides
            ]);
        }else{
              return view('web.404',[
                'newPosts'=>$newPosts,
                'slides'=>$slides
            ]);
        }
    }

    public function advertisingDetails($id)
    {
        $newPosts = Post::where('status',1)->skip(3)->take(5)->get();
        $slides = Post::where('status',1)->take(3)->get();
        $advertising = Advertising::where('id',$id)->first();
        if ($advertising != null){
            return view('web.advertisingDetails',[
                'advertising'=>$advertising,
                'slides'=>$slides,
                'newPosts'=>$newPosts
            ]);
        }else{
            return view('web.404',[
                'slides'=>$slides,
                'newPosts'=>$newPosts
            ]);
        }
    }

    public function aboutUs()
    {
        $slides = Post::where('status',1)->take(3)->get();
        $newPosts = Post::where('status',1)->skip(3)->take(5)->get();
        $about = About::first();
        return view('web.aboutUs',[
            'slides'=>$slides,
            'about'=>$about,
            'newPosts'=>$newPosts
        ]);
    }

    public function posts()
    {
        $slides = Post::where('status',1)->take(3)->get();
        $newPosts = Post::where('status',1)->skip(3)->take(5)->get();
        $posts = Post::where('status',1)->paginate(12);
        return view('web.posts',[
            'slides'=>$slides,
            'posts'=>$posts,
            'newPosts'=>$newPosts
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
            return redirect()->route('about_us.admin');
        }else{
            return redirect()->route('about_us.admin');

        }
    }

    public function profile()
    {
        $user_id = Auth::guard('user')->user()->id;
        $user = User::findOrFail($user_id);
        return view('web.profile',[
            'user'=>$user
        ]);
    }

    public function userTransactions()
    {
        $user = Auth::guard('user')->user()->id;
        $transactions = Transaction::where('user_id',$user)->get();
        return view('web.userTransactions',[
            'transactions'=>$transactions
        ]);
    }
    public function userOrders()
    {
        $user = Auth::guard('user')->user()->id;
        $orders = Order::where('user_id',$user)->get();
        return view('web.userOrders',[
            'orders'=>$orders
        ]);
    }

    public function advertisings(){
    $advertisings = Advertising::where('verified',1)->paginate(12);
    $categories = Category::all();
        return view('web.advertisings',
        [
            'advertisings'=>$advertisings,
            'categories'=>$categories
        ]
        );
    }
    public function advertisingsByCategory(Request $request){

        $category = null;
        $name = null;
        if ($request->input('category')){
            $category = $request->input('category');
        }
        if ($request->input('name')){
            $name = $request->input('name');
        }
        if ($category != null && $category != 0 && $category != ''){
            $advertisings = Advertising::where('category_id',$category)->get();
        }else if ($name != null && $name != ''){
            $advertisings = Advertising::where('title', 'LIKE', "%{$name}%")->paginate(12);

        }else{

            $advertisings = Advertising::offset(0)->limit(12)->get();
        }
        $categories = Category::all();
        return view('web.advertisings',
            [
                'advertisings'=>$advertisings,
                'categories'=>$categories
            ]
        );
    }
}
