<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use \App\Models\Post;

use  App\Http\Requests\PostRequest;
use App\Models\User;

class PostsController extends Controller
{
    //middlewareによる認証制限
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $posts = \App\Models\Post::all();
        // $posts = Post::all();
        // $posts = Post::orderBy("created_at", "desc")->get();
        $posts = Post::latest()->get();
        // $posts = [];
        // dd($posts->toArray());
        // return view("posts.index", ["post" => $posts]);
        return view("posts.index")->with("posts", $posts);
    }

    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        return view("posts.show")->with("post", $post);
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        //ログインしているユーザーIDを取得
        $user_id = Auth::id();

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $user_id;
        $post->save();
        return redirect("/");
    }
    public function edit(Post $post)
    {
        // $post = Post::findOrFail($id);
        return view("posts.edit")->with("post", $post);
    }
    public function update(PostRequest $request, Post $post)
    {

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect("/");
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
