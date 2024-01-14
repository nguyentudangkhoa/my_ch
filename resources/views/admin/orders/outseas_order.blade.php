@extends('admin.app.app')

@section('content')
    <div class="w3-bar w3-black">
        <a class="w3-bar-item w3-button @if (!request()->has('status') || request()->query('status') == 0) active @endif" href="{{ route('admin.order.outsea_order') }}">Tất cả <span class="count-text">{{ $countOrders }}</span></a>
        <a class="w3-bar-item w3-button @if (request()->query('status') == 1) active @endif" href="{{ route('admin.order.outsea_order', ['status' => 1]) }}">Chờ xác nhận <span class="count-text">{{ $countConfirmOrder }}</span></a>
        <a class="w3-bar-item w3-button @if (request()->query('status') == 2) active  @endif" href="{{ route('admin.order.outsea_order', ['status' => 2]) }}">Chờ lấy hàng <span class="count-text">{{ $countWaitingProduct }}</span></a>
        <a class="w3-bar-item w3-button @if (request()->query('status') == 3) active  @endif" href="{{ route('admin.order.outsea_order', ['status' => 3]) }}">Đang giao <span class="count-text">{{ $countOnDelivery }}</span></a>
        <a class="w3-bar-item w3-button @if (request()->query('status') == 4) active  @endif" href="{{ route('admin.order.outsea_order', ['status' => 4]) }}">Đã giao <span class="count-text">{{ $countDelivery }}</span></a>
        <a class="w3-bar-item w3-button @if (request()->query('status') == 5) active  @endif" href="{{ route('admin.order.outsea_order', ['status' => 5]) }}">Đã huỷ <span class="count-text">{{ $countCancel }}</span></a>
    </div>
    <hr>
    @include('admin.orders.partials.search-box', ['action' => route('admin.order.outsea_order')])
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
                                <td>
                                    <div class="d-flex product">
                                        <img src="{{ $orderDetail->product->product_thumb ?? '' }}" alt="{{ $orderDetail->product->slug ?? 'image' }}">
                                        <div class="product-info">
                                            <p>{{ $orderDetail->name ?? '' }}</p>
                                            <p>Size: {{ $orderDetail->size ?? '' }}</p>
                                            <p>Màu: {{ $orderDetail->color ?? '' }}</p>
                                        </div>
                                    </div>
                                </td>
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
        {{ $orders->links('admin.app.partials.pagination.default') }}
    </div>
@endsection
