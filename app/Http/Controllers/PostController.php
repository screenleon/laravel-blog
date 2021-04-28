<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(Request $request)
    {
        /** @var \Illuminate\Database\Query\Builder */
        $query = Post::select('posts.*');
        $condition = [];

        // Set search filter
        if ($request->input('search') != null) {
            $search = $request->input('search');
            $condition[] = ['title', 'like', "%$search%"];
        }

        // Set Category filter
        if($request->input('category') != null) {
            $category = $request->input('category');
            $query = $query->leftJoin((new Category)->getTable(), 'posts.category_id', '=', 'categories.id');
            $condition[] = ['categories.name', '=', $category];
        }

        $posts = $query->where($condition)->simplePaginate(Post::SINGLE_PAGE_AMOUNT);
        return view('posts.index', compact('posts'));
    }

    public function view(Post $post)
    {
        return view('posts.view', compact('post'));
    }
}
