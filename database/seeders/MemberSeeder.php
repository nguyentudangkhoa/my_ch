<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('old_data_my_ch')->table('table_member')->orderBy('id')->chunk(100, function ($data) {
            foreach ($data as $item) {
                DB::table('members')->insert([
                    'id' => $item->id,
                    'email' => $item->email,
                    'password' => $item->password,
                    'name' => $item->ten,
                    'bcoin' => $item->bcoin,
                    'build_up' => $item->tichluy,
                    'phone' => $item->dienthoai,
                    'birthday' => date('Y-m-d', (int) ($item->ngaysinh ?: 0)),
                    'address' => $item->diachi,
                    'sex' => $item->sex,
                    'photo' => $item->photo,
                    'district_id' => $item->id_district,
                    'city_id' => $item->id_city,
                    'active' => $item->active,
                    'register_time' => date('Y-m-d H:i:s', (int) ($item->ngaydangky ?: 0)),
                    'last_login' => date('Y-m-d H:i:s', (int) ($item->lastlogin ?: 0)),
                    'priority' => $item->stt,
                    'random_key' => $item->randomkey,
                    'limit_time' => $item->limit_time,
                    'facebook_auth' => $item->facebook_auth_id,
                    'google_auth' => $item->google_auth_id,
                    'com' => $item->com,
                    'display' => $item->hienthi,
                    'block_user' => $item->block_user,
                    'like_product' => $item->splike,
                    'product_view' => $item->spview,
                    'oauth_provider' => $item->oauth_provider,
                    'my_wallet' => $item->vicuatoi,
                    'device' => $item->device,
                ]);
            }
        });
    }
}
