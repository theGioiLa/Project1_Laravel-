{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{route('admin.index')}}"><i class="glyphicon glyphicon-home"></i>
            Dashboard</a></li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Sản phẩm
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('product.index')}}">Sản phẩm hiện có</a></li>

                    <li><a href="{{route('product.create')}}">Thêm mới sản phẩm</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Danh mục sản phẩm
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('category.index')}}">Trong kho hiện có</a></li>
                    <li><a href="{{route('category.create')}}">Thêm mới danh mục</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div> <!-- ADMIN SIDE NAV-->