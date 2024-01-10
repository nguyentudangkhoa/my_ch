@extends('admin.app.app')

@section('content')
    <style>
        .table-order-title tr th {
            padding: 10px 0px;
        }

        .sTable tbody th {
            /* border-left: 1px solid #f1f1f1!important; */
            padding: 6px;
            vertical-align: middle;
            font-size: 12px;
        }

        .withCheck thead tr th:first-child, .withCheck thead tr th:first-child {
            padding: 11px 10px;
        }

        .responsive-table {
            overflow-y: scroll;
        }
    </style>

    <div class="widget">
        <div class="titlee">
            <div class="timkiem">
                <form name="search" action="index.php" method="GET" class="form giohang_ser">
                    <input class="form_or" name="keyword" placeholder="Nhập từ khóa.." value="" type="text">
                    <input type="submit" class="blueB" value="Tìm kiếm" style="width:100px;">
                    <div class="clear"></div>
                </form>
            </div><!--end tim kiem-->
        </div>
    </div>
    <div class="widget responsive-table">
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
    {{ $shops->links('admin.app.partials.pagination.default') }}
@endsection
