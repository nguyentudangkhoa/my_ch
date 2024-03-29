@extends('admin.app.app')

@section('content')
    <div class="count-product">
        <a class="c-pro-all">Tổng doanh thu nước ngoài</a>
    </div>
    <div class="widget">
        <div class="responsive-table">
            <table cellpadding="0" cellspacing="0" width="100%" class="table-order-title sTable withCheck mTable" id="checkAll">
                <thead>
                <tr style="background-color: #e5e5e5">
                    <th >Doanh thu năm</th>
                    <th >Doanh thu tháng</th>
                    <th >Doanh thu tuần</th>
                    <th >Phí vận chuyển</th>
                    <th >Phí giao dịch</th>
                </tr>
                </thead>
                <tbody style="background-color: #fff;text-align: center">
                <tr>
                    @foreach($financeSums as $financeSum)
                        <td>{{ number_format($financeSum) }}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    {{--    @include('admin.product.partials.search-box', ['action' => route('admin.product.index'), 'categories' => $categories])--}}
    <div class="widget">
        <div class="responsive-table">
            <table cellpadding="0" cellspacing="0" width="100%" class="table-order-title sTable withCheck mTable" id="checkAll">
                <thead>
                <tr style="background-color: #e5e5e5">
                    <th >Shop</th>
                    <th >Doanh thu năm</th>
                    <th >Doanh thu tháng</th>
                    <th >Phí vận chuyển</th>
                    <th >Phí giao dịch</th>
                </tr>
                </thead>
                <tbody style="background-color: #fff">
                @foreach($shops as $shop)
                    <tr>
                        <td>{{ $shop->shop_title }}</td>
                        <td>{{ $shop->orders->sum('total_price') }}</td>
                        <td>{{ $shop->orders->sum('payment_price') }}</td>
                        <td>{{ $shop->orders->sum('payment_price') }}</td>
                        <td >0
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $shops->links('admin.app.partials.pagination.default') }}
@endsection
