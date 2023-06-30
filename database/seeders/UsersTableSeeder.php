<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'fullname' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'phone_number' => '0123456789',
        //     'username' => 'admin',
        //     'password' => Hash::make('admin'),
        //     'id_role' => '1',
        // ]);

        // DB::table('users')->insert([
        //     'fullname' => 'Nguyễn Thị Mỹ Linh',
        //     'email' => 'mylinh@gmail.com',
        //     'phone_number' => '0869698300',
        //     'username' => 'linhmn',
        //     'password' => Hash::make('123456'),
        //     'id_role' => '2',
        // ]);
        // DB::table('users')->insert([
        //     'fullname' => 'Nguyễn Văn A',
        //     'email' => 'ngvana@gmail.com',
        //     'phone_number' => '0869698212',
        //     'username' => 'nguyenvana',
        //     'password' => Hash::make('123456'),
        //     'id_role' => '2',
        // ]);
         
        // DB::table('users')->insert([
        //     'fullname' => 'Trần Trúc Ly',
        //     'email' => 'lytran@gmail.com',
        //     'phone_number' => '0869691234',
        //     'username' => 'lytran',
        //     'password' => Hash::make('123456'),
        //     'id_role' => '2',
        // ]);
    }
}
