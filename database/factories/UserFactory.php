<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_image'        => null,
            'user_fullname'     => $this->faker->name,
            'user_name'         => $this->faker->userName,
            'user_pass'         => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'user_desc'         => $this->faker->paragraph,
            'user_facebook'     => $this->faker->userName,
            'user_instagram'    => $this->faker->userName,
            'user_twitter'      => $this->faker->userName
        ];
    }
}
