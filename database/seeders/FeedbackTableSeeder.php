<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('feedback')->insert([
            'id_shoe' => '4',
            'id_user' => '2',
            'username' => 'linhmn',
            'rated' => '5',
            'comment' => 'Sản phẩm đẹp lắm.',
            'created_at' => '2023-06-27 07:27:28',
            'updated_at' => '2023-06-27 07:27:28',
        ]);

        DB::table('feedback')->insert([
            'id_shoe' => '10',
            'id_user' => '3',
            'username' => 'nguyenvana',
            'rated' => '5',
            'comment' => 'Sản phẩm trên cả mong đợi.',
            'created_at' => '2023-06-27 08:27:28',
            'updated_at' => '2023-06-27 08:27:28',
        ]);
    }
}
