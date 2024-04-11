<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class My_AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authorDetails = [
            'date' => '2023-04-01',
        ];
        DB::table('my_authors')->insert($authorDetails);
    }
}
