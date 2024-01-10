<div class="widget">
    <div class="titlee">
        <div class="timkiem">
            <form name="search" action="{{ $action }}" method="GET" class="form giohang_ser">
                <div class="search">
                    <select id="category" name="category_id" class="main_select">
                        <option>Chọn Danh mục</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input class="form_or" name="keyword" placeholder="Nhập tên hoặc mã sản phẩm" value="{{ request()->query('keyword') ?: '' }}" type="text">
                <input type="submit" class="blueB" value="Tìm kiếm" style="width:100px;">
                <div class="clear"></div>
            </form>
        </div><!--end tim kiem-->
    </div>
</div>
