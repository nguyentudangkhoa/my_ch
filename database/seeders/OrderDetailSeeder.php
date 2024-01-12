<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::connection('old_data_my_ch')->table('table_order_detail')->orderBy('id')->chunk(100, function ($data) {
            foreach ($data as $item) {
                DB::table('order_details')->insert([
                    'id' => $item->id,
                    'product_id' => $item->id_product,
                    'order_id' => $item->id_order,
                    'name' => $item->ten,
                    'color' => $item->mau,
                    'size' => $item->size,
                    'payment_price' => $item->gia,
                    'quantity' => $item->soluong,
                    'weight' => $item->trongluong,
                ]);
            }
        });
    }
}
