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
          'title' => $this->faker->words(2, true),
          'content' => $this->faker->paragraph(20),
          'image' => $this->faker->numberBetween($min = 1, $max = 4),
          'created_at' => $this->faker->dateTimeBetween('-30 days', now()),
          'categorie_id' => $this->faker->numberBetween($min = 1, $max = 10),
        ];
    }
}
