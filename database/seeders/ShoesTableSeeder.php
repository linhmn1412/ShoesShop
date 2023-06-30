<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shoes')->insert([
            'name_shoe' => 'Giày Nike Air Force 1 Low “Bronx Origins”',
            'id_category' => '1',
            'id_brand' => '1',
            'description' => '<p>✔️ Đế giày được thiết kế chịu ma sát tốt, tăng chiều cao, nhẹ, êm, cân bằng và thoáng khí.&nbsp;</p><p>✔️ Kiểu dáng hottrend của năm nay.&nbsp;</p><p>✔️ Giày đẹp, nhẹ, bền. Có thể làm giày cặp, giày nhóm. Thích hợp đi chơi, chạy bộ, gym, đi học, đi làm...&nbsp;</p><p>✔️ Đế cao su bền chắc, có độ bám cao.</p><p>✔️ Mẫu mới nhất hiện nay mang êm chân thời trang cá tính.&nbsp;</p><p>✔️ Dễ dàng kết hợp với hầu hết các phong cách thời trang như: đi học, đi chơi, đi du lịch. Giày đôi, giày nhóm...</p><p>✔️ Có thể kết hợp với váy, jeans, sooc…. Đều phù hợp!!&nbsp;</p>',
            'price' => '3290000',
            'quantity_stock' => '98',
            'image_1' => 'giay1.jpg',
            'image_2' => 'giay1.jpg',
            'image_3' => 'giay1.jpg',
            'id_discount' => '1',
            'quantity_sold' => '2',
            'created_at' => '2023-06-26 23:41:26',
            'updated_at' => '2023-06-26 23:41:26',
        ]);

        DB::table('shoes')->insert([
            'name_shoe' => 'Dép Nike Offcourt Slide ‘Summit White’',
            'id_category' => '3',
            'id_brand' => '1',
            'description' => '<p>✔️ Đế Dép được thiết kế chịu ma sát tốt, tăng chiều cao, nhẹ, êm, cân bằng và thoáng khí.&nbsp;</p><p>✔️ Kiểu dáng hottrend của năm nay.&nbsp;</p><p>✔️ Giày đẹp, nhẹ, bền. Có thể làm giày cặp, giày nhóm. Thích hợp đi chơi, chạy bộ, gym, đi học, đi làm...&nbsp;</p><p>✔️ Đế cao su bền chắc, có độ bám cao.</p><p>✔️ Mẫu mới nhất hiện nay mang êm chân thời trang cá tính.&nbsp;</p><p>✔️ Dễ dàng kết hợp với hầu hết các phong cách thời trang như: đi học, đi chơi, đi du lịch. Giày đôi, giày nhóm...</p><p>✔️ Có thể kết hợp với váy, jeans, sooc…. Đều phù hợp!!&nbsp;</p>',
            'price' => '1400000',
            'quantity_stock' => '100',
            'image_1' => 'giay2.jpg',
            'image_2' => 'giay2.jpg',
            'image_3' => 'giay2.jpg',
            'id_discount' => '2',
            'quantity_sold' => '0',
            'created_at' => '2023-06-26 23:41:28',
            'updated_at' => '2023-06-26 23:41:28',
        ]);

        DB::table('shoes')->insert([
            'name_shoe' => 'Giày Nike SB Dunk Low ‘Jarritos’',
            'id_category' => '1',
            'id_brand' => '1',
            'description' => '<p>✔️ Đế Giày được thiết kế chịu ma sát tốt, tăng chiều cao, nhẹ, êm, cân bằng và thoáng khí.&nbsp;</p><p>✔️ Kiểu dáng hottrend của năm nay.&nbsp;</p><p>✔️ Giày đẹp, nhẹ, bền. Có thể làm giày cặp, giày nhóm. Thích hợp đi chơi, chạy bộ, gym, đi học, đi làm...&nbsp;</p><p>✔️ Đế cao su bền chắc, có độ bám cao.</p><p>✔️ Mẫu mới nhất hiện nay mang êm chân thời trang cá tính.&nbsp;</p><p>✔️ Dễ dàng kết hợp với hầu hết các phong cách thời trang như: đi học, đi chơi, đi du lịch. Giày đôi, giày nhóm...</p><p>✔️ Có thể kết hợp với váy, jeans, sooc…. Đều phù hợp!!&nbsp;</p>',
            'price' => '3950000',
            'quantity_stock' => '90',
            'image_1' => 'giay3.jpg',
            'image_2' => 'giay3.jpg',
            'image_3' => 'giay3.jpg',
            'id_discount' => '1',
            'quantity_sold' => '10',
            'created_at' => '2023-06-26 23:42:28',
            'updated_at' => '2023-06-26 23:42:28',
        ]);

        DB::table('shoes')->insert([
            'name_shoe' => 'Giày Nike Air Jordan 5 Retro SP "Crimson"',
            'id_category' => '1',
            'id_brand' => '4',
            'description' => '<p>✔️ Đế Giày được thiết kế chịu ma sát tốt, tăng chiều cao, nhẹ, êm, cân bằng và thoáng khí.&nbsp;</p><p>✔️ Kiểu dáng hottrend của năm nay.&nbsp;</p><p>✔️ Giày đẹp, nhẹ, bền. Có thể làm giày cặp, giày nhóm. Thích hợp đi chơi, chạy bộ, gym, đi học, đi làm...&nbsp;</p><p>✔️ Đế cao su bền chắc, có độ bám cao.</p><p>✔️ Mẫu mới nhất hiện nay mang êm chân thời trang cá tính.&nbsp;</p><p>✔️ Dễ dàng kết hợp với hầu hết các phong cách thời trang như: đi học, đi chơi, đi du lịch. Giày đôi, giày nhóm...</p><p>✔️ Có thể kết hợp với váy, jeans, sooc…. Đều phù hợp!!&nbsp;</p>',
            'price' => '7850000',
            'quantity_stock' => '100',
            'image_1' => 'giay4.jpg',
            'image_2' => 'giay4.jpg',
            'image_3' => 'giay4.jpg',
            'id_discount' => '0',
            'quantity_sold' => '0',
            'created_at' => '2023-06-26 23:43:28',
            'updated_at' => '2023-06-26 23:43:28',
        ]);

        DB::table('shoes')->insert([
            'name_shoe' => 'Sandal adidas Duramo Sl',
            'id_category' => '2',
            'id_brand' => '2',
            'description' => '<p>✔️ Đế Giày được thiết kế chịu ma sát tốt, tăng chiều cao, nhẹ, êm, cân bằng và thoáng khí.&nbsp;</p><p>✔️ Kiểu dáng hottrend của năm nay.&nbsp;</p><p>✔️ Giày đẹp, nhẹ, bền. Có thể làm giày cặp, giày nhóm. Thích hợp đi chơi, chạy bộ, gym, đi học, đi làm...&nbsp;</p><p>✔️ Đế cao su bền chắc, có độ bám cao.</p><p>✔️ Mẫu mới nhất hiện nay mang êm chân thời trang cá tính.&nbsp;</p><p>✔️ Dễ dàng kết hợp với hầu hết các phong cách thời trang như: đi học, đi chơi, đi du lịch. Giày đôi, giày nhóm...</p><p>✔️ Có thể kết hợp với váy, jeans, sooc…. Đều phù hợp!!&nbsp;</p>',
            'price' => '890000',
            'quantity_stock' => '100',
            'image_1' => 'giay5.jpg',
            'image_2' => 'giay5.jpg',
            'image_3' => 'giay5.jpg',
            'id_discount' => '0',
            'quantity_sold' => '0',
            'created_at' => '2023-06-26 23:44:28',
            'updated_at' => '2023-06-26 23:44:28',
        ]);

        DB::table('shoes')->insert([
            'name_shoe' => 'Giày MLB Liner Basic New York Yankees “Green”',
            'id_category' => '1',
            'id_brand' => '3',
            'description' => '<p>✔️ Đế Giày được thiết kế chịu ma sát tốt, tăng chiều cao, nhẹ, êm, cân bằng và thoáng khí.&nbsp;</p><p>✔️ Kiểu dáng hottrend của năm nay.&nbsp;</p><p>✔️ Giày đẹp, nhẹ, bền. Có thể làm giày cặp, giày nhóm. Thích hợp đi chơi, chạy bộ, gym, đi học, đi làm...&nbsp;</p><p>✔️ Đế cao su bền chắc, có độ bám cao.</p><p>✔️ Mẫu mới nhất hiện nay mang êm chân thời trang cá tính.&nbsp;</p><p>✔️ Dễ dàng kết hợp với hầu hết các phong cách thời trang như: đi học, đi chơi, đi du lịch. Giày đôi, giày nhóm...</p><p>✔️ Có thể kết hợp với váy, jeans, sooc…. Đều phù hợp!!&nbsp;</p>',
            'price' => '2690000',
            'quantity_stock' => '100',
            'image_1' => 'giay6.jpg',
            'image_2' => 'giay6.jpg',
            'image_3' => 'giay6.jpg',
            'id_discount' => '3',
            'quantity_sold' => '0',
            'created_at' => '2023-06-26 23:45:28',
            'updated_at' => '2023-06-26 23:45:28',
        ]);

        DB::table('shoes')->insert([
            'name_shoe' => 'Sandal New Balance GS Flip-Flops ‘Black Orange’ ',
            'id_category' => '2',
            'id_brand' => '5',
            'description' => '<p>✔️ Đế Giày được thiết kế chịu ma sát tốt, tăng chiều cao, nhẹ, êm, cân bằng và thoáng khí.&nbsp;</p><p>✔️ Kiểu dáng hottrend của năm nay.&nbsp;</p><p>✔️ Giày đẹp, nhẹ, bền. Có thể làm giày cặp, giày nhóm. Thích hợp đi chơi, chạy bộ, gym, đi học, đi làm...&nbsp;</p><p>✔️ Đế cao su bền chắc, có độ bám cao.</p><p>✔️ Mẫu mới nhất hiện nay mang êm chân thời trang cá tính.&nbsp;</p><p>✔️ Dễ dàng kết hợp với hầu hết các phong cách thời trang như: đi học, đi chơi, đi du lịch. Giày đôi, giày nhóm...</p><p>✔️ Có thể kết hợp với váy, jeans, sooc…. Đều phù hợp!!&nbsp;</p>',
            'price' => '2650000',
            'quantity_stock' => '100',
            'image_1' => 'giay7.jpg',
            'image_2' => 'giay7.jpg',
            'image_3' => 'giay7.jpg',
            'id_discount' => '3',
            'quantity_sold' => '0',
            'created_at' => '2023-06-26 23:46:28',
            'updated_at' => '2023-06-26 23:46:28',
        ]);

        DB::table('shoes')->insert([
            'name_shoe' => 'Giày Converse Run Star Hi ‘Black’ ',
            'id_category' => '1',
            'id_brand' => '6',
            'description' => '<p>✔️ Đế Giày được thiết kế chịu ma sát tốt, tăng chiều cao, nhẹ, êm, cân bằng và thoáng khí.&nbsp;</p><p>✔️ Kiểu dáng hottrend của năm nay.&nbsp;</p><p>✔️ Giày đẹp, nhẹ, bền. Có thể làm giày cặp, giày nhóm. Thích hợp đi chơi, chạy bộ, gym, đi học, đi làm...&nbsp;</p><p>✔️ Đế cao su bền chắc, có độ bám cao.</p><p>✔️ Mẫu mới nhất hiện nay mang êm chân thời trang cá tính.&nbsp;</p><p>✔️ Dễ dàng kết hợp với hầu hết các phong cách thời trang như: đi học, đi chơi, đi du lịch. Giày đôi, giày nhóm...</p><p>✔️ Có thể kết hợp với váy, jeans, sooc…. Đều phù hợp!!&nbsp;</p>',
            'price' => '3650000',
            'quantity_stock' => '96',
            'image_1' => 'giay8.jpg',
            'image_2' => 'giay8.jpg',
            'image_3' => 'giay8.jpg',
            'id_discount' => '0',
            'quantity_sold' => '4',
            'created_at' => '2023-06-26 23:47:28',
            'updated_at' => '2023-06-26 23:47:28',
        ]);

        DB::table('shoes')->insert([
            'name_shoe' => 'Dép Converse Slide Slip “White” ',
            'id_category' => '3',
            'id_brand' => '6',
            'description' => '<p>✔️ Đế Giày được thiết kế chịu ma sát tốt, tăng chiều cao, nhẹ, êm, cân bằng và thoáng khí.&nbsp;</p><p>✔️ Kiểu dáng hottrend của năm nay.&nbsp;</p><p>✔️ Giày đẹp, nhẹ, bền. Có thể làm giày cặp, giày nhóm. Thích hợp đi chơi, chạy bộ, gym, đi học, đi làm...&nbsp;</p><p>✔️ Đế cao su bền chắc, có độ bám cao.</p><p>✔️ Mẫu mới nhất hiện nay mang êm chân thời trang cá tính.&nbsp;</p><p>✔️ Dễ dàng kết hợp với hầu hết các phong cách thời trang như: đi học, đi chơi, đi du lịch. Giày đôi, giày nhóm...</p><p>✔️ Có thể kết hợp với váy, jeans, sooc…. Đều phù hợp!!&nbsp;</p>',
            'price' => '650000',
            'quantity_stock' => '100',
            'image_1' => 'giay9.jpg',
            'image_2' => 'giay9.jpg',
            'image_3' => 'giay9.jpg',
            'id_discount' => '1',
            'quantity_sold' => '0',
            'created_at' => '2023-06-26 23:48:28',
            'updated_at' => '2023-06-26 23:48:28',
        ]);

        DB::table('shoes')->insert([
            'name_shoe' => 'Giày Nike Air Force 1 Low ’07 LX Command Force ‘Gorge Green’ (W)',
            'id_category' => '1',
            'id_brand' => '1',
            'description' => '<p>✔️ Đế Giày được thiết kế chịu ma sát tốt, tăng chiều cao, nhẹ, êm, cân bằng và thoáng khí.&nbsp;</p><p>✔️ Kiểu dáng hottrend của năm nay.&nbsp;</p><p>✔️ Giày đẹp, nhẹ, bền. Có thể làm giày cặp, giày nhóm. Thích hợp đi chơi, chạy bộ, gym, đi học, đi làm...&nbsp;</p><p>✔️ Đế cao su bền chắc, có độ bám cao.</p><p>✔️ Mẫu mới nhất hiện nay mang êm chân thời trang cá tính.&nbsp;</p><p>✔️ Dễ dàng kết hợp với hầu hết các phong cách thời trang như: đi học, đi chơi, đi du lịch. Giày đôi, giày nhóm...</p><p>✔️ Có thể kết hợp với váy, jeans, sooc…. Đều phù hợp!!&nbsp;</p>',
            'price' => '3650000',
            'quantity_stock' => '100',
            'image_1' => 'giay10.jpg',
            'image_2' => 'giay10.jpg',
            'image_3' => 'giay10.jpg',
            'id_discount' => '0',
            'quantity_sold' => '0',
            'created_at' => '2023-06-26 23:49:28',
            'updated_at' => '2023-06-26 23:40:28',
        ]);

        DB::table('shoes')->insert([
            'name_shoe' => 'Giày adidas Samba Classic ‘White’',
            'id_category' => '1',
            'id_brand' => '2',
            'description' => '<p>✔️ Đế Giày được thiết kế chịu ma sát tốt, tăng chiều cao, nhẹ, êm, cân bằng và thoáng khí.&nbsp;</p><p>✔️ Kiểu dáng hottrend của năm nay.&nbsp;</p><p>✔️ Giày đẹp, nhẹ, bền. Có thể làm giày cặp, giày nhóm. Thích hợp đi chơi, chạy bộ, gym, đi học, đi làm...&nbsp;</p><p>✔️ Đế cao su bền chắc, có độ bám cao.</p><p>✔️ Mẫu mới nhất hiện nay mang êm chân thời trang cá tính.&nbsp;</p><p>✔️ Dễ dàng kết hợp với hầu hết các phong cách thời trang như: đi học, đi chơi, đi du lịch. Giày đôi, giày nhóm...</p><p>✔️ Có thể kết hợp với váy, jeans, sooc…. Đều phù hợp!!&nbsp;</p>',
            'price' => '2450000',
            'quantity_stock' => '92',
            'image_1' => 'giay11.jpg',
            'image_2' => 'giay11.jpg',
            'image_3' => 'giay11.jpg',
            'id_discount' => '0',
            'quantity_sold' => '8',
            'created_at' => '2023-06-26 23:50:28',
            'updated_at' => '2023-06-26 23:50:28',
        ]);
    }
}
