<?php

namespace Database\Factories;

use App\Models\Post;
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
            'post_image'    => null,
            'post_author'   => $this->faker->numberBetween(1, 2),
            'post_category' => $this->faker->numberBetween(1, 10),
            'post_title'    => $this->faker->sentence,
            'post_content'  => $this->faker->paragraph(50),
            'post_comment'  => $this->faker->boolean,
            'post_status'   => $this->faker->boolean

        ];
    }
}
