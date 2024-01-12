<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::connection('old_data_my_ch')->table('table_province')->orderBy('id')->chunk(100, function ($data) {
            foreach ($data as $item) {
                DB::table('provinces')->insert([
                    'id' => $item->province_id,
                    'name'=> $item->province_name,
                    'province_code' => $item->province_code,
                    'slug' => $item->tenkhongdau,
                    'display' => $item->hienthi,
                ]);
            }
        });
    }
}
