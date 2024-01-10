<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('old_data_my_ch')->table('table_httt')->orderBy('id')->chunk(100, function ($data) {
            foreach ($data as $item) {
                DB::table('payment_methods')->insert([
                    'id' => $item->id,
                    'name' => $item->ten,
                ]);
            }
        });
    }
}
