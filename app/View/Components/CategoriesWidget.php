<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;

use App\Models\Category;

class CategoriesWidget extends Component
{
    /**
     * @var Category[]
     */
    public $categories;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = Cache::remember('categories', 60 * 5, function () {
            return Category::withCount('posts')->get()->sortByDesc(function($category) {
                return $category->posts_count;
            })->take(6);
        });
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.categories-widget', ['categories' => $this->categories]);
    }
}
