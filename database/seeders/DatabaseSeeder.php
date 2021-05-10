<?php

namespace Database\Seeders;

use App\Models\HomeCategory;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(1)->create();
        HomeCategory::factory(1)->create();
        Sale::factory(1)->create();
    }
}
