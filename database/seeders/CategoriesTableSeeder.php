<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name_category' => 'Sneaker',
        ]);

        DB::table('categories')->insert([
            'name_category' => 'Sandal',
        ]);

        DB::table('categories')->insert([
            'name_category' => 'Slide',
        ]);
    }
}
