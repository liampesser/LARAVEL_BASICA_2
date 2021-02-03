<?php

namespace Database\Factories;

use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Work::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'title' => $this->faker->words(2, true),
          'content' => $this->faker->paragraph(2),
          'image' => $this->faker->numberBetween($min = 1, $max = 8),
          'inSlider' => $this->faker->numberBetween($min = 0, $max = 1),
          'created_at' => $this->faker->dateTimeBetween('-30 days', now()),
          'client_id' => $this->faker->numberBetween($min = 1, $max = 5),
        ];
    }
}
