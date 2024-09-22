<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mydate = fake()->date('d F Y') . " " . fake()->time("H:i:s");
        return [
            "judul" => fake()->sentence(),
            "penulis_id" => User::factory(),
            "category_id" => Category::factory(),
            "waktu" => $mydate,
            "sinopsis" => fake()->paragraphs(5, true)
        ];
    }
}
