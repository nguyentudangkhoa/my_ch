@extends('admin.app.app')

@section('content')
    <div class="count-product">
        <a class="c-pro-all">Tất cả sản phẩm</a>
    </div>
    @include('admin.product.partials.search-box', [
        'action' => route('admin.product.all_product'),
        'categories' => $categories,
    ])
    <div class="widget">
        <div class="responsive-table">
            <table cellpadding="0" cellspacing="0" width="100%" class="table-order-title sTable withCheck mTable"
                id="checkAll">
                <thead>
                    <tr style="background-color: #e5e5e5">
                        <th style="text-align: center;"><input type="checkbox" name="" id="allProduct"></th>
                        <th style="text-align: inherit;">Sản Phẩm</th>
                        <th style="text-align: inherit;">Shop</th>
                        <th style="text-align: inherit;">Ngày đăng / sửa</th>
                        <th style="text-align: center;">GG Shopping</th>
                    </tr>
                </thead>
                <tbody style="background-color: #fff">
                    @foreach ($products as $product)
                        <tr>
                            <td style="text-align: center;"><input type="checkbox" name=""
                                    id="product{{ $product->id }}" value="{{ $product->id }}"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->shop->shop_title }}</td>
                            <td>{{ $product->updated_at }}</td>
                            <td style="text-align: center;">
                                <label class="toggle-table">
                                    <input type="checkbox" @if ($product->ggsp != 0) checked @endif>
                                    <span class="slider"></span>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    {{ $products->links('admin.app.partials.pagination.default') }}
@endsection
