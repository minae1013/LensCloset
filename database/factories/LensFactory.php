<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lens>
 */
class LensFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = DB::table('users')->pluck('id')->toArray();
        $categories = DB::table('categories')->pluck('id')->toArray();

        return [
            'user_id' => $users[array_rand($users)],
            'category_id' => $categories[array_rand($categories)],
            'brand' => $this->faker->realText(10),
            'color' => $this->faker->realText(100),
            'lens_diameter' => $this->faker->randomFloat(1, 14, 15),
            'colored_diameter' => $this->faker->randomFloat(1, 11, 15),
            'lifespan' => $this->faker->randomElement(['1day', '2week', '1month']),
            'price' => $this->faker->numberBetween(1000, 5000),
            'image_path' => 'https://picsum.photos/200/300',
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->realText(200),
            'repeat' => $this->faker->randomElement(['あり', 'なし']),
        ];
    }
}
