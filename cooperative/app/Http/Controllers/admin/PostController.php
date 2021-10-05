<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts()
    {
        $posts = Post::all();

        return view('admin.posts',[
            'posts'=>$posts,
            'menu'=>'posts',
            'selected'=>'posts'
        ]);
    }
    public function createPost()
    {
        return view('admin.create_post',[
            'menu'=>'posts',
            'selected'=>'createPost'
        ]);

    }

    public function storePost(PostRequest $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $status = $request->input('status');
        $imageName = time().'.'.$request->image->extension();
        $path = '/uploads/images/posts/';
        $request->image->move(public_path($path), $imageName);
        $filePath = $path.$imageName;
        /* Store $imageName name in DATABASE from HERE */
        $post = new Post();
        $post->image = $filePath;
        $post->title = $title;
        $post->description = $description;
        $post->status = $status;
        $result = $post->save();
        if ($result){
            return redirect()->route('posts.admin')->with('success','با موفقیت اضافه شد.');
        }else{
            return redirect()->route('posts.admin')->with('error','اضافه نشد.');
        }
    }

    public function postDetails($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post_details',[
            'post'=>$post,
            'menu'=>'posts',
            'selected'=>'postDetails'
        ]);
    }

    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        if ($post){

            unlink(public_path($post->image));
            $result = $post->delete();
            if ($result){
                return redirect()->route('posts.admin')->with('success','پست مورد نظر حذف شد.');
            }else{
                return redirect()->route('posts.admin')->with('error','پست مورد نظر حذف نشد.');
            }
        }else{
            return redirect()->route('posts.admin')->with('error','پست مورد نظر حذف نشد.');

        }
    }

    public function updatePostStatus(Request $request)
    {
        $status = $request->status;
        $post_id = $request->post_id;
        $post = Post::findOrFail($post_id);
        $post->status = $status;
        $result = $post->save();
        if ($result){

            return redirect()->route('posts.admin')->with('success',',وضعیت پست با موفقیت ویرایش شد.');
        }else{
            return redirect()->route('posts.admin')->with('error','خطا در ویرایش وضعیت پست.');

        }
    }
}
