<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

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
            $query = $query->addSelect(['category_id' => function ($query) use ($category) {
                /** @var \Illuminate\Database\Query\Builder $query */
                $query->select('id')->from('categories')->where(['name' => $category])->get(1);
            }]);
        }

        $posts = $query->where($condition)->simplePaginate(Post::SINGLE_PAGE_AMOUNT);
        return view('posts.index', compact('posts'));
    }

    public function view(Post $post)
    {
        return view('posts.view', compact('post'));
    }
}
