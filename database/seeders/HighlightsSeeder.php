<?php

namespace Database\Seeders;

use App\Models\Highlights;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HighlightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            ['MONEY, INNOVATION & LEADERSHIP', null, null],
            ['FUTURE OF WORK', null, null],
            ['EDITOR\'S PICKS', null, null],
            ['YOU SHOULD KNOW', null, null],
        ];

        for ($i = 0; $i < count($objs); $i++) {
            Highlights::create([
                'name_tm' => $objs[$i][0],
                'name_en' => $objs[$i][1],
                'name_ru' => $objs[$i][2],
                'sort_order' => $i + 1,
            ]);
        }
    }
}
