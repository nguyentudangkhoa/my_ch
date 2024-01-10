<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("INSERT INTO `categories` (`id`, `id_daily`, `type`, `feature`, `name`, `slug`, `advertising`, `advertising_thumb`, `left_advertising`, `left_advertising_thumb`, `right_advertising`, `right_advertising_thumb`, `link_left_advertising`, `link_advertising`, `title`, `keywords`, `description`, `photo`, `thumb`, `icon`, `priority`, `display`, `created_at`, `updated_at`, `second_thumb`, `second_photo`) VALUES
            (92, 0, 'product', 0, 'Trang sức & Phụ kiện thời trang','trang-suc-phu-kien-thoi-trang', '', '', '', '', '', '', '', '', '', '', '', 'trangsucphukien-1281.PNG', 'trangsucphukien-1281_60x60.png', '', 12, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (64, 0, 'product', 0, 'Chăm Sóc Thú Cưng', 'cham-soc-thu-cung', '', '', '', '', '', '', '', '', '', '', '', 'chamsocthucung-4587.jpg', 'chamsocthucung-4587_60x60.jpg', '', 23, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (45, 0, 'product', 1, 'Nhà Cửa Đời Sống', 'nha-cua-doi-song', '', '', '', '', '', '', '', '', '', '', '', 'bonoilaubepcon3lopmavangoemss040881341678861076-5220.png', 'bonoilaubepcon3lopmavangoemss040881341678861076-5220_60x60.png', '-8822.png', 6, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', 'h5-4068.jpg_163.85542168675x160.jpg', 'h5-4068.jpg'),
            (61, 0, 'product', 0, 'Thiết Bị & Dụng Cụ', 'thiet-bi-dung-cu', '', '', '', '', '', '', '', '', '', '', '', 'thietbidungcu-5288.png', 'thietbidungcu-5288_60x60.png', '', 22, 1,'2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (38, 0, 'product', 0, 'Mẹ & Bé', 'me-be', '', '', '', '', '', '', '', '', '', '', '', 'xedayembe-1140.png', 'xedayembe-1140_60x60.png', '', 5, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', 'h5-1199.jpg_163.85542168675x160.jpg', 'h5-1199.jpg'),
            (46, 0, 'product', 1, 'Làm Đẹp', 'lam-dep', '', '', '', '', '', '', '', '', '', '', '', 'lam-dep-3298.png', 'lam-dep-3298_60x60.png', '', 3, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', 'h3-5242.jpg_163.85542168675x160.jpg', 'h3-5242.jpg'),
            (88, 0, 'product', 0, 'Thời Trang Trẻ Em', 'thoi-trang-tre-em', '', '', '', '', '', '', '', '', '', '', '', 'thoitrangtreem-3065.png', 'thoitrangtreem-3065_60x60.png', '', 18, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (35, 0, 'product', 0, 'Máy Tính & Laptop', 'may-tinh-laptop', '', '', '', '', '', '', '', '', '', '', '','laptoppc-7133.png', 'laptoppc-7133_60x49.180327868852.png', '-9091.png', 8, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (36, 0, 'product', 0, 'Thời Trang Nam', 'thoi-trang-nam', '', '', '', '', '', '', '', '', '', '', '','thoi-trang-nam-3669.png', 'thoi-trang-nam-3669_60x60.png', '-1387.png', 2, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (84, 0, 'product', 0, 'Sức Khỏe', 'suc-khoe', '', '', '', '', '', '', '', '', '', '', '', 'suc-khoe-9905.png', 'suc-khoe-9905_60x60.png', '', 4, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (90, 0, 'product', 0, 'Giày dép nữ & Túi đeo', 'giay-dep-nu-tui-deo', '', '', '', '', '', '', '', '', '', '', '', 'giaydepnu2-7614.png', 'giaydepnu2-7614_60x60.png', '', 13, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (91, 0, 'product', 0, 'Đồng hồ & Mắt kính', 'dong-ho-mat-kinh', '', '', '', '', '', '', '', '', '', '', '', 'donghovamatkinh-2469.png', 'donghovamatkinh-2469_60x60.png', '', 11, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (37, 0, 'product', 0, 'Thời Trang Nữ', 'thoi-trang-nu', '', '', '', '', '', '', '', '', '', '', '', 'thoitrangnu-2926.png', 'thoitrangnu-2926_60x60.png', '-46.png', 1, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (89, 0, 'product', 0, 'Giày dép nam & Túi đeo', 'giay-dep-nam-tui-deo', '', '', '', '', '', '', '', '', '', '', '', 'giaydepnam3-8565.png', 'giaydepnam3-8565_60x60.png', '', 14, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (86, 0, 'product', 0, 'Giặt Ủi & Chăm Sóc Nhà Cửa', 'giat-ui-cham-soc-nha-cua', '', '', '', '', '', '', '', '', '', '', '', 'giatuichamsocquanao-1964.png', 'giatuichamsocquanao-1964_60x60.png', '', 20, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (87, 0, 'product', 0, 'Đồ Chơi', 'do-choi', '', '', '', '', '', '', '', '', '', '', '', 'dochoi-647.png', 'dochoi-647_60x60.png', '', 19, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (44, 0, 'product', 0, 'Thiết Bị Điện Gia Dụng', 'thiet-bi-dien-gia-dung', '', '', '', '', '', '', '', '', '', '', '', 'diengiadungdiendandung-6573.png', 'diengiadungdiendandung-6573_60x60.png', '-1313.png', 7, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', 'h6-392.jpg_163.85542168675x160.jpg', 'h6-392.jpg'),
            (83, 0, 'product', 0, 'Bách Hóa Online', 'bach-hoa-online', '', '', '', '', '', '', '', '', '', '', '', 'cuahangbachhoa-7306.png', 'cuahangbachhoa-7306_60x60.png', '', 16, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (53, 0, 'product', 1, 'Thể Thao & Du Lịch', 'the-thao-du-lich', '', '', '', '', '', '', '', '', '', '', '', 'leucamtrai810160x160-9252.png', 'leucamtrai810160x160-9252_60x56.470588235294.png', '', 15, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', 'h1-3048.jpg_163.85542168675x160.jpg', 'h1-3048.jpg'),
            (63, 0, 'product', 0, 'Nhà Sách Online', 'nha-sach-online', '', '', '', '', '', '', '', '', '', '', '', 'nhasach-8899.png', 'nhasach-8899_60x60.png', '', 17, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (62, 0, 'product', 0, 'Tivi & Âm Thanh', 'tivi-am-thanh', '', '', '', '', '', '', '', '', '', '', '', 'nghenhin-7579.png', 'nghenhin-7579_60x44.943820224719.png', '', 10, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (65, 0, 'product', 0, 'Xe & Phụ Kiện', 'xe-phu-kien', '', '', '', '', '', '', '', '', '', '', '', 'doxe1-772.png', 'doxe1-772_58.8x60.png', '', 21, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', ''),
            (82, 0, 'product', 0, 'Điện Thoại & Máy Ảnh', 'dien-thoai-may-anh', '', '', '', '', '', '', '', '', '', '', '', 'dienthoaimayanh-6207.png', 'dienthoaimayanh-6207_60x60.png', '', 9, 1, '2022-09-14 14:53:48', '2022-09-14 14:53:48', '', '');
        ");
    }
}
