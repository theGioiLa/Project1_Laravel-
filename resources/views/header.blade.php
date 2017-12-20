<div class="row">@if (Session::has('thongbao')) <script type="text/javascript">alert('Dat hang thanh cong');</script> @endif</div>
<div id="header">


  <div class="header-top">
    <div class="container">
      @include('status')
      <div class="pull-left">
        <ul class="menu-beta list-inline">
          <li><a ><i class="fa fa-home fa-lg"></i>Nguyễn Xiển - Thanh Xuân - Hà Nội</a></li>
          <li><a ><i class="fa fa-phone fa-lg"></i> 01630990990</a></li>
        </ul>
      </div>
      <div class="pull-right ">
        <ul class="list-inline menu-beta">
          @guest
          <li><a href="{{route('register')}}">Đăng kí</a></li>
          <li><a href="{{route('login')}}">Đăng nhập</a></li>
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chào {{Auth::user()->name}} <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Đăng xuất
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>

        @endguest
      </ul>
    </div>
    <div class="clearfix"></div>
  </div> <!-- .container -->
</div> <!-- .header-top -->



  <div class="header-body">
    <div class="container beta-relative">
      <div class="pull-left">
        <a href="{{route('homepage')}}" id="logo"><img src="source/assets/dest/images/Owl-Book-256.png" height="80px" alt=""></a>
      </div>
      <div class="pull-right beta-components space-left ov">
        <div class="space10">&nbsp;</div>
        <div class="beta-comp">
          <form role="search" method="get" id="searchform" action="{{route('search')}}">
            <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
            <button class="fa fa-search" type="submit" id="searchsubmit"></button>
          </form>
        </div>
        <div class="beta-comp">
          <div class="cart">
            <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if (Session::has('cart')) {{Session('cart')->totalQty}} @else Trống @endif) <i class="fa fa-chevron-down"></i></div>
            @if (Session::has('cart'))
            <div class="beta-dropdown cart-body">

              @foreach($product_cart as $product)

              <div class="cart-item">
                <a class="cart-item-delete" href="{{route('xoaItem', $product['item']->id)}}"><i class="material-icons">close</i>

                <div class="media">
                  <a class="pull-left" href="{{route('detail', $product['item']->id)}}"><img src="source/image/product/{{$product['item']->image}}" alt=""></a>
                  <div class="media-body">
                    <span class="cart-item-title">{{$product['item']['name']}}</span>
                    {{-- <span class="cart-item-options">Size: XS; Colar: Navy</span> --}}
                    <span class="cart-item-amount">{{$product['qty']}} x <span>{{ $product['item']['promotion_price']? $product['item']->promotion_price:$product['item']->unit_price}} vnđ</span></span>
                  </div>
                </div>
              </div>


              @endforeach


              <div class="cart-caption">
                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{$totalPrice}} vnđ</span></div>
                <div class="clearfix"></div>

                <div class="center">
                  <div class="space10">&nbsp;</div>
                  <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                </div>
              </div>
            </div>
            @endif

          </div> <!-- .cart -->
        </div>

      </div>
      <div class="clearfix"></div>
    </div> <!-- .container -->
  </div> <!-- .header-body -->
  <div class="header-bottom" style="background-color: #679C22;">
    <div class="container">
      <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
      <div class="visible-xs clearfix"></div>
      <nav class="main-menu">
        <ul class="l-inline ov">
          <li><a href="{{route('homepage')}}">Trang chủ</a></li>
          <li><a href="{{route('catalog')}}">Danh mục</a>
            <ul class="sub-menu">
              @foreach($loaisp as $loai)
              <li><a href="{{route('catalog', $loai->id)}}">{{$loai->name}}</a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="{{route('about')}}">Giới thiệu</a></li>
          <li><a href="{{route('contact')}}">Liên hệ</a></li>
        </ul>
        <div class="clearfix"></div>
      </nav>
    </div> <!-- .container -->
  </div> <!-- .header-bottom -->
</div> <!-- #header -->
