<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('old_data_my_ch')->table('table_district')->orderBy('id')->chunk(100, function ($data) {
            foreach ($data as $item) {
                DB::table('districts')->insert([
                   'id' => $item->district_id,
                   'name'=> $item->district_name,
                   'province_id'=> $item->province_id,
                   'district_value' => $item->district_value,
                   'slug' => $item->tenkhongdau,
                   'display' => $item->hienthi,
                ]);
            }
        });
    }
}
