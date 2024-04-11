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
        $this->call([
            CategoriesTableSeeder::class,
            AuthorsTableSeeder::class,
            WrapperTableSeeder::class,
            NumberTableSeeder::class,
            My_AuthorsTableSeeder::class
        ]);
    }
}
