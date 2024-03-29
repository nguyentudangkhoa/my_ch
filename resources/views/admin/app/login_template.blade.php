<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mych - Quản Trị Admin</title>
    <link href="{{ asset('assets/admin/css/fontawesome512/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/main_repon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/shop.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/media.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/simple-notify.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{ asset('assets/admin/jsexternal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/jssimple-notify.js') }}"></script>
    <script src="{{ asset('assets/admin/jsjquery.price_format.2.0.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/admin/jsjquery.minicolors.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/jquery.minicolors.css') }}">
    <link href="{{ asset('assets/admin/jsselect-box-searching-jquery/select2.css') }}" rel="stylesheet"/>
    <script src="{{ asset('assets/admin/jsselect-box-searching-jquery/select2.js') }}"></script>
    <script src="{{ asset('assets/admin/jsjquery.smartuploader.js') }}"></script>
    <script src="{{ asset('assets/admin/jsSortable.js') }}"></script>
    <script src="{{ asset('assets/admin/jsjquery-confirm.min.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/jquery-confirm.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/filer/font-fileuploader.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/filer/jquery.fileuploader.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/filer/jquery.fileuploader-theme-dragdrop.css') }}">
    <script type="text/javascript" src="{{ asset('assets/admin/css/filer/jquery.fileuploader.min.js') }}" charset="utf-8"></script>

</head>
<body>
<div class="topNav">
    <div class="wrapper">
        <div class="topnav_kenhnguoiban">
            <div class="topnav_kenhnguoiban_left">
                <a class="logo-main" href="" title="Siêu thị đồ gia dụng My Châu"><img src="{{ asset('assets/admin/images/logomch-3381.png') }}" alt="MyChau"></a>
                <div class="welcome"></div>
            </div>
        </div>
    </div>
</div>
    @yield('content')
</body>
</html>
