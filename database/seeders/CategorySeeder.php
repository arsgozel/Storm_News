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
        $objs = [
            [
                'Travel', null, null,
                'Sport', null, null,
                'Economy', null, null,
                'Lifestyle', null, null,
                'Health', null, null,
            ],
        ];

        for ($i = 0; $i < count($objs); $i++) {
            Category::create([
                'name_tm' => $objs[$i][0],
                'name_en' => $objs[$i][1],
                'name_ru' => $objs[$i][2],
                'sort_order' => $i + 1,
            ]);
        }
    }
}
