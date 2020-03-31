<?php

namespace App\Http\Controllers\API;
use App\Http\Resources\PostResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    function index(){
        //$posts=Post::all();
        return PostResource::collection(
            // Post::paginate(3)
            Post::with('user')->get()
        );
    }
    function show($post){
    
        return new PostResource(Post::find($post));
    }
    function store(){
        $request=request();
        Post::create([
           
            'title'=>$request->title,
            'description'=>$request->description,
            'user'=>$request->user
        ]);
    }


}
