<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::simplePaginate(Post::SINGLE_PAGE_AMOUNT);
        return view('posts.index', compact('posts'));
    }

    public function view(Post $post)
    {
        return view('posts.view', compact('post'));
    }
}
