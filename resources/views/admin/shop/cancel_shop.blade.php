@extends('admin.app.app')

@section('content')
    <div class="control_frm">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="{{ route('admin.shop.new_shop') }}"><span>Quản lý Shop</span></a></li>
                <li class="current"><a href="{{ route('admin.shop.pause_shop') }}"><span>Shop tạm nghỉ / đóng</span></a></li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    @include('admin.shop.partials.search-box', ['action' => route('admin.shop.pause_shop')])
    <div class="widget">
        <div class="count-product">
            <a class="c-pro-all">Shop tạm nghỉ / đóng</a>
        </div>
        <div class="responsive-table">
            <table cellpadding="0" cellspacing="0" width="100%" class="table-order-title sTable withCheck mTable" id="checkAll">
                <thead>
                <tr style="background-color: #fff">
                    <th class="sortCol">Tên shop</th>
                    <th class="sortCol-sl">Email</th>
                    <th style="text-align: center;">Địa chỉ</th>
                    <th style="text-align: center;">Điện Thoại</th>
                </tr>
                </thead>
                <tbody style="background-color: #fff">
                @foreach($shops as $shop)
                    <tr>
                        <td>{{ $shop->shop_title }}</td>
                        <td>{{ $shop->email }}</td>
                        <td>{{ $shop->address }}</td>
                        <td>{{ $shop->phone_number }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    {{ $shops->links('admin.app.partials.pagination.default') }}
@endsection
