<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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



        $post=Post::find($postId);
        return view('show',[
            'post'=>$post
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
    public function update(){
        $request=request();
        //dd($request->id);



        $post = Post::find($request->id);

        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();
        return redirect()->route('posts.index');

    }
    public function create(){
       
        return view('create');
    }
    public function store(){
        $request=request();
        //dd($request->title);
        Post::create([
            "title"=> $request->title,
            "description"=> $request->description
        ]);
       
        return redirect()->route('posts.index');
    }

}
