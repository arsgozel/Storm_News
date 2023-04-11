<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Contact;
use App\Models\Highlights;
use App\Models\IpAddress;
use App\Models\News;
use App\Models\UserAgent;
use App\Models\Visitor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(array(
            CategorySeeder::class,
            HighlightsSeeder::class,
            UserSeeder::class,
        ));

        Contact::factory()->count(30)->create();
        News::factory()->count(30)->create();
        UserAgent::factory()->count(50)->create();
        IpAddress::factory()->count(50)->create();
        Visitor::factory()->count(50)->create();
    }
}