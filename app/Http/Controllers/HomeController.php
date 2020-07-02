<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $posts=Post::paginate(2);
        return view('front.home',compact('posts','categories'));
    }

    public function post($slug)
    {
        $categories = Category::all();
        $post = Post::findBySlugOrFail($slug);
        $comments = $post->comments->where('is_active',1);
        return view('post',compact('post','comments','categories'));
    }
}
