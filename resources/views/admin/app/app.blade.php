<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mych - Quản Trị Admin</title>
    @include('admin.app.partials.head_html')

</head>
<body>
<div class="topNav">
    <style>
        .topNav {
            height: unset;
        }
    </style>
    @include('admin.app.partials.user_element')
</div>
@include('admin.app.partials.menu')
<div id="rightSide">
    <div class="wrapper" style="padding-top: 10px">
        @yield('content')
    </div>
    @include('admin.app.partials.foot_html')
</div>
</body>
</html>
