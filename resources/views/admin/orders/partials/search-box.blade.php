<div class="widget">
    <div class="titlee">
        <div class="timkiem">
            <form name="search" class="d-flex" action="{{ $action }}" method="GET" class="form giohang_ser">
                <select id="orderCode" name="orderCode" class="main_select">
                    <option>Chọn mã đơn hàng</option>
                    @foreach($orders as $order)
                        <option value="{{ $order->id }}">{{ $order->order_code }}</option>
                    @endforeach
                </select>
                <input class="form_or" name="keyword" placeholder="Nhập mã đơn hàng" value="{{ request()->query('keyword') ?: '' }}" type="text">
                <input type="submit" class="blueB" value="Tìm kiếm" style="width:100px;">
                <div class="clear"></div>
            </form>
        </div><!--end tim kiem-->
    </div>
</div>
