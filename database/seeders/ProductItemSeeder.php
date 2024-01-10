<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('old_data_my_ch')->table('table_product_item')->orderBy('id')->chunk(100, function ($data) {
            foreach ($data as $item) {
                DB::table('categories')->insert([
                    'parent' => $item->id_cat,
                    'id_daily' => $item->id_daily,
                    'type' => $item->type,
                    'name' => $item->ten_vi,
                    'slug' => $item->tenkhongdau,
                    'description' => $item->description,
                    'title' => $item->title,
                    'keywords' => $item->keywords,
                    'photo' => $item->photo,
                    'thumb' => $item->thumb,
                    'priority' => $item->stt,
                    'display' => $item->hienthi,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }
}
