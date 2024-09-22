<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrCategory = [
            "Programmer",
            "Politik",
            "Sosial",
            "Lingkungan dan Alam",
            "Kebersihan",
            "Kesehatan",
            "Makanan dan Minuman"
        ];

        foreach ($arrCategory as $value) {
            Category::create([
                'name' => $value,
            ]);
        }
    }
}
