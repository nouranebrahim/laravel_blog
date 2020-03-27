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

}
