<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('old_data_my_ch')->table('table_wards')->orderBy('id')->chunk(100, function ($data) {
            foreach ($data as $item) {
                DB::table('wards')->insert([
                   'id' => $item->wards_id,
                   'name'=> $item->wards_name,
                   'district_id'=> $item->district_id,
                   'slug' => $item->tenkhongdau,
                   'display' => $item->hienthi,
                ]);
            }
        });
    }
}
