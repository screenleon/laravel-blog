<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function list_of_posts_show_on_main_page()
    {
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

        /** @var Post */
        $postOne = Post::factory()->create([
            'title' => 'My First Post',
            'category_id' => $categoryOne->id,
        ]);

        /** @var Post */
        $postTwo = Post::factory()->create([
            'title' => 'My Second Post',
            'category_id' => $categoryTwo->id
        ]);

        $response = $this->get(route('posts.index'));
        
        $response->assertStatus(200);
        $response->assertSee($postOne->title);
        $response->assertSee($postOne->content);
        $response->assertSee($categoryOne->id);
        
        $response->assertSee($postTwo->title);
        $response->assertSee($postTwo->content);
        $response->assertSee($categoryTwo->id);
    }

    /** @test */
    public function single_page_shows_correctly_on_the_view_page()
    {
        /** @var Category */
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        
        /** @var Post */
        $post = Post::factory()->create([
            'title' => 'My First Post',
            'category_id' => $categoryOne->id
        ]);

        $response = $this->get(route('posts.view', $post));
        $response->assertSee($post->title);
        $response->assertSee($post->content);
        $response->assertSee($categoryOne->name);
    }

    /** @test */
    public function same_post_title_different_slugs()
    {
        /** @var Category */
        $category = Category::factory()->create(['name' => 'Category 1']);

        $postOne = Post::factory()->create([
            'title' => 'My First Post',
            'category_id' => $category->id,
            'content' => 'My first content'
        ]);

        $postTwo = Post::factory()->create([
            'title' => 'My First Post',
            'category_id' => $category->id,
            'content' => 'Another first content'
        ]);

        $response = $this->get(route('posts.view', $postOne));

        $response->assertSuccessful();
        $this->assertTrue(request()->path() === 'posts/my-first-post');

        $response = $this->get(route('posts.view', $postTwo));
        $response->assertSuccessful();
        $this->assertTrue(request()->path() === 'posts/my-first-post-2');
    }

    /** @test */
    public function list_of_posts_filter_title_show_on_main_page()
    {
        $category = Category::factory()->create(['name' => 'Category 1']);

        /** @var Post */
        $postOne = Post::factory()->create([
            'title' => 'My First Post',
            'category_id' => $category->id,
        ]);

        /** @var Post */
        $postTwo = Post::factory()->create([
            'title' => 'My Second Post',
            'category_id' => $category->id
        ]);

        $response = $this->get(route('posts.index', ['search' => 'First']));
        
        $response->assertStatus(200);
        $response->assertSee($postOne->title);
        $response->assertSee($postOne->content);
        
        $response->assertDontSee($postTwo->title);
        $response->assertDontSee($postTwo->content);
    }

    /** @test */
    public function list_of_posts_filter_category_show_on_main_page()
    {
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

        /** @var Post */
        $postOne = Post::factory()->create([
            'title' => 'My First Post',
            'category_id' => $categoryOne->id,
        ]);

        /** @var Post */
        $postTwo = Post::factory()->create([
            'title' => 'My Second Post',
            'category_id' => $categoryTwo->id
        ]);

        $response = $this->get(route('posts.index', ['category' => $categoryOne->name]));
        
        $response->assertStatus(200);
        $response->assertSee($postOne->title);
        $response->assertSee($postOne->content);
        
        $response->assertDontSee($postTwo->title);
        $response->assertDontSee($postTwo->content);
    }
}
