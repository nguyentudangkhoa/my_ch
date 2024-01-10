<div class="widget">
    <div class="titlee">
        <div class="timkiem">
            <form name="search" action="{{ $action }}" method="GET" class="form giohang_ser">
                <input class="form_or" name="keyword" placeholder="Nhập mã đơn hàng" value="{{ request()->query('keyword') ?: '' }}" type="text">
                <input type="submit" class="blueB" value="Tìm kiếm" style="width:100px;">
                <div class="clear"></div>
            </form>
        </div><!--end tim kiem-->
    </div>
</div>
