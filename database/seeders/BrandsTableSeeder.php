<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'name_brand' => 'Nike'
        ]);

        DB::table('brands')->insert([
            'name_brand' => 'Adidas'
        ]);

        DB::table('brands')->insert([
            'name_brand' => 'MLB'
        ]);

        DB::table('brands')->insert([
            'name_brand' => 'Jordan'
        ]);

        DB::table('brands')->insert([
            'name_brand' => 'New Balance'
        ]);

        DB::table('brands')->insert([
            'name_brand' => 'Converse'
        ]);

    }
}
