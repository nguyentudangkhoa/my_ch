<div id="leftSide">
    <div class="sidebarSep mt0"></div>
    <ul id="menu" class="nav">
        @foreach ($menus as $menu)
            <li class="categories_li {{ $menu['icon'] }} @if($menu['is_active']) active @endif"><a href="{{ $menu['url'] }}" title=""
                    class="exp"><span>{{ $menu['name'] }}</span>
                    @if (isset($menu['children']) && count($menu['children']) > 0)
                        <span class="arrow-up"></span>
                    @endif
                </a>
                @if (isset($menu['children']) && count($menu['children']) > 0)
                    <ul class="sub" style="display: none;">
                        @foreach ($menu['children'] as $child)
                            <li><a href="{{ $child['url'] }}"  @if($child['is_active']) class="active" @endif title="">{{ $child['name'] }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
