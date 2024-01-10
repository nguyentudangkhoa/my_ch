<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('old_data_my_ch')->table('table_shop')->orderBy('id')->chunk(100, function ($data) {
            foreach ($data as $item) {
                DB::table('shops')->insert([
                    'id' => $item->id,
                    'account_name' => $item->tentaikhoan,
                    'shop_title' => $item->tenshop,
                    'slug' => $item->tenkhongdau,
                    'shop_code' => $item->mashop,
                    'email' => $item->email,
                    'password' => $item->password,
                    'phone_number' => $item->dienthoai,
                    'address' => $item->diachi,
                    'photo' => $item->photo,
                    'description' => $item->mota,
                    'shop_type' => $item->loaishop,
                    'created_at' => now(),
                    'priority' => $item->stt,
                    'display' => $item->hienthi,
                    'view' => $item->view,
                    'is_online' => $item->online,
                    'is_cancel' => $item->huy,
                    'is_pause' => $item->tamdung,
                    'pin_code' => $item->mapin,
                    'reason' => $item->lydo ?: 0,
                    'notification' => $item->thongbao,
                    'updated_at' => now(),
                    'banner' => $item->banner,
                ]);
            }
        });
    }
}
