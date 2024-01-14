@extends('admin.app.app')

@section('content')
    <div class="count-product">
        <a class="c-pro-all">Lịch sử rút tiền</a>
    </div>
    <div class="widget">
        <div class="responsive-table">
            <table cellpadding="0" cellspacing="0" width="100%" class="table-order-title sTable withCheck mTable" id="checkAll">
                <thead>
                <tr style="background-color: #e5e5e5">
                    <th style="text-align: inherit;">Thời gian hoàn thành</th>
                    <th style="text-align: inherit;">Shop</th>
                    <th style="text-align: inherit;">Số tiền rút</th>
                    <th style="text-align: center;">Phí thanh toán</th>
                </tr>
                </thead>
                <tbody style="background-color: #fff">
                @foreach($withdrawMoney as $money)
                    <tr>
                        <td>{{ $money->confirm_date }}</td>
                        <td>{{ $money->shop->shop_title ?? ''}}</td>
                        <td>{{ number_format($money->total) }}</td>
                        <td>{{ number_format($money->city_fee) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    {{ $withdrawMoney->links('admin.app.partials.pagination.default') }}
@endsection
