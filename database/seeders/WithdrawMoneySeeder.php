<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WithdrawMoneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('old_data_my_ch')->table('table_wallet_detail')->orderBy('id')->chunk(100, function ($data) {
            foreach ($data as $item) {
                DB::table('wallet_details')->insert([
                    'id' => $item->id,
                    'shop_id' => $item->id_shop,
                    'bank_id' => $item->id_nganhang,
                    'total' => $item->tongtien,
                    'city_fee' => $item->phithanhtoan,
                    'created_at' =>  date('Y-m-d H:i:s', (int) ($item->ngaytao ?: 0)),
                    'confirm_date' => date('Y-m-d H:i:s', (int) ($item->ngayxacnhan ?: 0)),
                    'is_confirm' => $item->xacnhan,
                    'priority' => $item->stt,
                    'display' => $item->hienthi,
                    'total_receive' => $item->tongtiennhan,
                    'total_send' => $item->sotienchuyen,
                ]);
            }
        });
    }
}
