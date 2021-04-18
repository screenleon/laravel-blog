<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => User::factory()->create(array_merge(User::factory()->raw(), ['type' => UserType::Writer()])),
            'category_id' => $this->faker->numberBetween(1, 4),
            'title' => ucwords($this->faker->word(4, true)),
            'content' => $this->faker->paragraph(4)
        ];
    }
}
