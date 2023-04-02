<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Highlights;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    public function definition()
    {
        $category = Category::inRandomOrder()->first();
        $highlights = Highlights::inRandomOrder()->first();

        $nameTm = fake()->streetName();
        $nameEn = null;
        $nameRu = null;

        return [
            'category_id' => $category->id,
            'highlights_id' => $highlights->id,
            'name_tm' => $nameTm,
            'name_en' => $nameEn,
            'name_ru' => $nameRu,
            'slug' => str()->slug($nameTm) . '-' . str()->random(10),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            'updated_at' => fake()->dateTimeBetween('-2 month', 'now')->format('Y-m-d H:i:s'),
            'viewed' => rand(100, 200),
            'description' => fake()->text(rand(300, 400)),
            'is_visible' => fake()->boolean(60),
        ];
    }
}
