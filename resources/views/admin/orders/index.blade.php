@extends('admin.app.app')

@section('content')
    <div class="w3-bar w3-black">
        <a class="w3-bar-item w3-button @if (!request()->has('status') || request()->query('status') === 0) @endif" href="{{ route('admin.order.index') }}">Tất cả <span></span></a>
        <a class="w3-bar-item w3-button @if (request()->query('status') === 1) @endif" href="{{ route('admin.order.index', ['status' => 1]) }}">Chờ xác nhận <span></span></a>
        <a class="w3-bar-item w3-button @if (request()->query('status') === 2) @endif" href="{{ route('admin.order.index', ['status' => 2]) }}">Chờ lấy hàng <span></span></a>
        <a class="w3-bar-item w3-button @if (request()->query('status') === 3) @endif" href="{{ route('admin.order.index', ['status' => 3]) }}">Đang giao <span></span></a>
        <a class="w3-bar-item w3-button @if (request()->query('status') === 4) @endif" href="{{ route('admin.order.index', ['status' => 4]) }}">Đã giao <span></span></a>
        <a class="w3-bar-item w3-button @if (request()->query('status') === 5) @endif" href="{{ route('admin.order.index', ['status' => 5]) }}">Đã huỷ <span></span></a>
    </div>
    <hr>
    @include('admin.orders.partials.search-box', ['action' => route('admin.order.index')])
    <div class="widget">
        <div class="responsive-table">
            @foreach ($orders as $order)
                <table cellpadding="0" cellspacing="0" width="100%" class="table-order-title sTable withCheck mTable"
                    id="checkAll">
                    <thead>
                        <tr style="background-color: #e5e5e5">
                            <th>Shop</th>
                            <th></th>
                            <th></th>
                            <th>Người đặt: {{ $order->user->name }}</th>
                            <th>Mã đơn: {{ $order->order_code }}</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #fff">
                        @foreach ($order->orderDetails as $orderDetail)
                            <tr>
                                <td><img src="{{ $orderDetail->product->product_thumb ?? '' }}" alt=""></td>
                                <td>{{ $orderDetail->quantity }} </td>
                                <td>{{ number_format($orderDetail->payment_price * $orderDetail->quantity) }}</td>
                                <td>{{ $order->ship_name }}</td>
                                @if($order->status === 1)
                                    <td>Chờ xác nhận</td>
                                @elseif ($order->status === 2)
                                    <td>Chờ lấy hàng</td>
                                @elseif ($order->status === 3)
                                    <td>Đang giao</td>
                                @elseif ($order->status === 4)
                                    <td>Đã giao</td>
                                @elseif ($order->status === 5)
                                    <td>Đã huỷ</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach

        </div>
    </div>
@endsection
