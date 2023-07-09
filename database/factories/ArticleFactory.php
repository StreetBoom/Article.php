<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->realTextBetween(20,30),
            'text' => $this->faker->realTextBetween(100,300),
            'views' =>random_int(1,50),
            'likes' =>random_int(1,50)
        ];
    }
}
