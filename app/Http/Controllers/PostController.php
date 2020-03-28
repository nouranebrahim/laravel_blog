<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //
    public function index(){
        $posts=Post::all();
        return view('index',[
            'posts'=>$posts
        ]);
    }
    public function show(){
        $request = request();
        $postId = $request->post;
        $userId=$request->user;



        $post=Post::find($postId);
        $user=Post::find($userId);
        return view('show',[
            'post'=>$post,
            'user'=>$user
        ]);
        
    }
    public function destroy(){
        $request = request();
        $postId = $request->post;

        // $post = Post::find($postId);

        // $post->delete();
        Post::destroy($postId);

        return redirect()->route('posts.index');

    }
    // public function delete(){
    //     $request = request();
    //     $postId = $request->post;
    //     //dd($postId);
    //     return view('delete',['post'=>$postId]);

    // }
    public function edit(){
        $request = request();
        $postId = $request->post;
        $post=Post::find($postId);
        return view('edit',[
            'post'=>$post
        ]);

        
    }
    public function update(StoreBlogPost $request){
       // $request=request();
        //dd($request->id);



        $post = Post::find($request->id);

        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();
        return redirect()->route('posts.index');

    }
    public function create(){
        $users = User::all();
       
        return view('create',['users'=>$users]);
    }
    public function store(StoreBlogPost $request){
        $request=request();
        $title=$request->title;
        

        $slug = Str::slug($title, '-');
        // dd($slug);

       
        Post::create([
            "title"=> $request->title,
            "description"=> $request->description,
            "user_id"=>$request->user_id,
            "slug"=>$slug,
        ]);
       
        return redirect()->route('posts.index');
    }

}
