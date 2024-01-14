<div class="wrapper">
    <a class="logo-main" href="" title="Siêu thị đồ gia dụng My Châu"><img
            src="{{ asset('assets/admin/images/logomch-3381.png') }}" alt="MyChau"></a>
    <div class="welcome">Admin</div>
    <div class="userNav">
        <ul>
            <li><img src="http://placehold.it/30x30"
                     onerror="this.src='http://placehold.it/30x30';">{{ auth()->user()->user_name }}
                <ul>
                    <li><a href="{{ route('admin.auth.logout') }}" title=""><i class="fas fa-sign-out-alt"></i>
                            Đăng xuất</a></li>

                </ul>
            </li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
