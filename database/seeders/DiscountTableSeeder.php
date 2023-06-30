<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discount')->insert([
            'name_discount' => 'Không khuyến mãi',
            'discount_value' => '0'
        ]);

        DB::table('discount')->insert([
            'name_discount' => 'Khuyến mãi 5%',
            'discount_value' => '5'
        ]);

        DB::table('discount')->insert([
            'name_discount' => 'Khuyến mãi 7%',
            'discount_value' => '7'
        ]);

        DB::table('discount')->insert([
            'name_discount' => 'Khuyến mãi 10%',
            'discount_value' => '10'
        ]);

        DB::table('discount')->insert([
            'name_discount' => 'Khuyến mãi 12%',
            'discount_value' => '12'
        ]);

        DB::table('discount')->insert([
            'name_discount' => 'Khuyến mãi 15%',
            'discount_value' => '15'
        ]);
    }
}
