<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function category_selection($num)
    {
        $arrCategory = [
            "",
            "Programmer",
            "Politik",
            "Sosial",
            "Lingkungan dan Alam",
            "Kebersihan",
            "Kesehatan",
            "Makanan dan Minuman"
        ];

        return $arrCategory[$num];
    }

    public function definition(): array
    {
        return [
            "name" => $this->category_selection(rand(1, 7))
            // "name" => fake()->sentence(rand(1, 2), false)
        ];
    }
}
