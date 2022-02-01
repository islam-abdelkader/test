<?php

namespace Database\Seeders;

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
        \App\Models\User::factory()->create([
            'email' => 'test@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
        ]);
        \App\Models\Category::factory(3)->create();
        \App\Models\Category::factory(5)->create([
            'category_id'=>1
        ]);
        \App\Models\Category::factory(2)->create([
            'category_id'=>2
        ]);
        \App\Models\Category::factory(4)->create([
            'category_id'=>3
        ]);
    }
}
