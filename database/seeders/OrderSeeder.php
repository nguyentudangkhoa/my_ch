<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('old_data_my_ch')->table('table_order')->orderBy('id')->chunk(100, function ($data) {
            foreach ($data as $item) {
                DB::table('orders')->insert([
                    'id' => $item->id,
                    'priority' => $item->stt,
                    'shop_id' => $item->id_shop,
                    'user_id' => $item->id_thanhvien,
                    'order_code' => $item->madonhang,
                    'view' => $item->view,
                    'full_name' => $item->hoten,
                    'phone' => $item->dienthoai,
                    'address' => $item->diachi,
                    'payment_method_id' => $item->httt,
                    'province_id' => $item->id_tinh,
                    'district_id' => $item->id_huyen,
                    'ward_id' => $item->id_xa,
                    'shipping_price' => $item->tienship,
                    'time' => $item->thoigian,
                    'ship_code' => $item->codeship,
                    'ship_name' => $item->nameship,
                    'quantity' => $item->soluong,
                    'weight' => $item->trongluong,
                    'total_price' => $item->tonggia,
                    'payment_price' => $item->phigiaodich,
                    'content' => $item->noidung,
                    'note' => $item->ghichu,
                    'shop_note' => $item->ghichushop,
                    'cancel_content' => $item->lydohuy,
                    'status' => $item->trangthai,
                    'return_order' => $item->trahang,
                    'order_number' => $item->order_number,
                    'shipping_bill' => $item->vandon,
                    'shipping_bill_date' => date('Y-m-d', (int) $item->ngaytaovandon),
                    'is_shipping' => $item->giaohang,
                    'is_shipping_confirm' => $item->xacnhangiaohang,
                    'payment' => $item->thanhtoan,
                    'mass' => $item->khoiluong,
                    'global_shipping' => $item->type,
                    'global_fee' => $item->phiquocte,
                    'added_fee' => $item->phicongthem,
                    'admin_note' => $item->ghichuadmin,
                    'is_complain' => $item->khieunai,
                    'is_refund' => $item->hoantien,
                    'is_payment' => $item->dathanhtoan,
                    'revenue' => $item->doanhthu,
                    'refund_date' => date('Y-m-d', (int) ($item->ngayhoantien ?: 0)),
                    'cancel_note' => $item->ghichuhuydon,
                    'cancel_status' => $item->trangthaihuydon,
                    'created_at' => now(),
                ]);
            }
        });
    }
}
