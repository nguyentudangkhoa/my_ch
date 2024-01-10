<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('old_data_my_ch')->table('table_product')->orderBy('id')->chunk(100, function ($data) {
            foreach ($data as $item) {
                $oldDataItem = DB::connection('old_data_my_ch')
                    ->table('table_product_item')
                    ->where('id', $item->id_item)->first();
                $itemCategory = DB::table('categories')->where('slug', $oldDataItem->tenkhongdau ?? '')->first();
                DB::table('products')->insert([
                    'id' => $item->id,
                    'category_id' => $item->id_cat,
                    'list_id' => $item->id_list,
                    'item_id' => $itemCategory->id ?? 0,
                    'shop_id' => $item->id_shop,
                    'delivery_time' => $item->id_tggiao,
                    'rate' => $item->rate,
                    'price_text' => $item->gia,
                    'size' => $item->size,
                    'size_image' => $item->hinhsize,
                    'stock_quantity_size' => $item->soluongtonsize,
                    'type' => $item->type,
                    'product_photo' => $item->photo,
                    'product_thumb' => $item->thumb,
                    'product_code' => $item->masp,
                    'name' => $item->ten_vi,
                    'slug'=> $item->tenkhongdau,
                    'weight' => $item->trongluong,
                    'des_char' => $item->trongluong,
                    'is_noindex' => $item->is_noindex,
                    'price' => $item->giaban,
                    'old_price' =>$item->giacu,
                    'description' => $item->mota_vi,
                    'content' => $item->noidung_vi,
                    'attribute' => $item->thuoctinh,
                    'sold_quantity' => $item->soluongban,
                    'deal_quantity' => $item->soluongdeal,
                    'stock_quantity' => $item->soluongton,
                    'view' => $item->luotxem,
                    'tag_id' => $item->tags !== '' ?: 0,
                    'color' => $item->mausac,
                    'ggsp' => $item->ggsp,
                    'is_order' => $item->hangdattruoc,
                    'status' => $item->tinhtrang ?: 1,
                    'violation_content' => $item->noidungvipham,
                    'is_violation' => $item->vipham,
                    'best_seller' => $item->banchay,
                    'is_outstanding' => $item->noibat,
                    'display' => $item->hienthi,
                    'approval' => $item->duyet,
                    'keywords' => $item->keywords,
                    'title' => $item->title,
                ]);
            }
        });
    }
}
