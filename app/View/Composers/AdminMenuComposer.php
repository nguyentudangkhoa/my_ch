<?php

namespace App\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class AdminMenuComposer
{
    /**
     * The user repository implementation.
     *
     * @var array menu
     */
    protected $menus;

    /**
     * Summary of __construct
     */
    public function __construct()
    {
        $this->menus = [
            [
                'name' => __('Thông báo tổng'),
                'url' => null,
                'icon' => null,
                'is_active' => false,
                'children' => [],
            ],
            [
                'name' => __('Quản lý đơn hàng'),
                'url' => null,
                'icon' => 'order',
                'is_active' => Route::is('admin.order.index') || Route::is('admin.order.outsea_order') || Route::is('admin.order.complain_return_order'),
                'children' => [
                    [
                        'name' => __('Đơn hàng trong nước'),
                        'url' => route('admin.order.index'),
                        'icon' => null,
                        'is_active' => Route::is('admin.order.index'),
                    ],
                    [
                        'name' => __('Đơn hàng nước ngoài'),
                        'url' => route('admin.order.outsea_order'),
                        'icon' => null,
                        'is_active' => Route::is('admin.order.outsea_order'),
                    ],
                    [
                        'name' => __('Kiếu nại/Hoàn tiền'),
                        'url' => route('admin.order.complain_return_order'),
                        'icon' => null,
                        'is_active' => Route::is('admin.order.complain_return_order'),
                    ],
                ],
            ],
            [
                'name' => __('Quản lý tài chính'),
                'url' => null,
                'icon' => 'financial',
                'is_active' => Route::is('admin.finance.internal_shop') || Route::is('admin.finance.outsea_order') || Route::is('admin.finance.withdraw_money'),
                'children' => [
                    [
                        'name' => __('Shop trong nước'),
                        'url' => route('admin.finance.internal_shop'),
                        'icon' => null,
                        'is_active' => Route::is('admin.finance.internal_shop'),
                    ],
                    [
                        'name' => __('Shop nước ngoài'),
                        'url' => route('admin.finance.outsea_order'),
                        'icon' => null,
                        'is_active' => Route::is('admin.finance.outsea_order'),
                    ],
                    [
                        'name' => __('Lịch sử rút tiền'),
                        'url' => route('admin.finance.withdraw_money'),
                        'icon' => null,
                        'is_active' => Route::is('admin.finance.withdraw_money'),
                    ],
                    [
                        'name' => __('Phí giao dịch/rút tiền'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                ],
            ],
            [
                'name' => __('Quản lý sản phẩm'),
                'url' => null,
                'icon' => 'product',
                'is_active' => Route::is('admin.product.all_product') || Route::is('admin.product.violation_product') || Route::is('admin.product.gg_product'),
                'children' => [
                    [
                        'name' => __('Tất cả sản phẩm'),
                        'url' => route('admin.product.all_product'),
                        'icon' => null,
                        'is_active' => Route::is('admin.product.all_product'),
                    ],
                    [
                        'name' => __('Sản phẩm vi phạm'),
                        'url' => route('admin.product.violation_product'),
                        'icon' => null,
                        'is_active' => Route::is('admin.product.violation_product'),
                    ],
                    [
                        'name' => __('sản phẩm trong GG shopping'),
                        'url' => route('admin.product.gg_product'),
                        'icon' => null,
                        'is_active' => Route::is('admin.product.gg_product'),
                    ],
                    [
                        'name' => __('Export to GG shoping'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                ],
            ],
            [
                'name' => __('Quản lý shop'),
                'url' => null,
                'icon' => 'shop',
                'is_active' => false,
                'children' => [
                    [
                        'name' => __('Tất cả shop'),
                        'url' => route('admin.shop.new_shop'),
                        'icon' => null,
                        'is_active' => false,
                    ],
                    [
                        'name' => __('Kho shop nước ngoài'),
                        'url' => route('admin.shop.overseas_shop'),
                        'icon' => null,
                        'is_active' => false,
                    ],
                    [
                        'name' => __('Thông báo shop'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                    [
                        'name' => __('Videos hướng dẫn shop'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                ],
            ],
            [
                'name' => __('Quản lý danh mục'),
                'url' => null,
                'icon' => 'category',
                'is_active' => false,
                'children' => [
                    [
                        'name' => __('Quản lý & di chuyển'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                ],
            ],
            [
                'name' => __('Quản lý vận chuyển'),
                'url' => null,
                'icon' => 'delivery',
                'is_active' => false,
                'children' => [
                    [
                        'name' => __('Nội dung vận chuyển'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                    [
                        'name' => __('Text Xác nhận đơn'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                    [
                        'name' => __('Địa chỉ kho TQ'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                    [
                        'name' => __('Phí vận chuyển quốc tế'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                ],
            ],
            [
                'name' => __('Quản lý web'),
                'url' => null,
                'icon' => 'web',
                'is_active' => false,
                'children' => [
                    [
                        'name' => __('Logo & favicon'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                    [
                        'name' => __('Banner'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                    [
                        'name' => __('Quản lý tags từ khóa'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                    [
                        'name' => __('Share mạng xã hội'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                    [
                        'name' => __('Giới thiệu & hổ trợ'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                    [
                        'name' => __('Thanh toán & vận chuyển'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                    [
                        'name' => __('Bộ công thương'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                    [
                        'name' => __('Footer'),
                        'url' => null,
                        'icon' => null,
                        'is_active' => false,
                    ],
                ],
            ],
        ];
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menus', $this->menus);
    }
}
