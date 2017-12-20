@extends('master')
@section('title', "Tìm kiếm")
@section('content')
<div class="container">
  <div id="content" class="space-top-none">
    <div class="main-content">
      <div class="space60">&nbsp;</div>
      <div class="row">
        <div class="beta-products-list">
          <h4><span class="label label-success">Tìm thấy <strong>{{count($product)}}</strong> sản phẩm </span></h4>
          <div class="beta-products-details">              
            <div class="clearfix"></div>
          </div>
          @foreach($product as $new)
          <div class="col-sm-3 text-center well">
            <div class="single-item">
              <div class="single-item-header">
                <a href="{{route('detail', $new->id)}}"><img src="source/image/product/{{$new->image}}" height="280px" image-rendering='pixelated' alt=""></a>
              </div>
              <div class="single-item-body">
                <p class="single-item-title">{{$new->name}}</p>
                <br>
                <p class="single-item-price">

                  @if ($new->promotion_price == 0)
                  <span class="flash-salel">{{number_format($new->unit_price)}} đ</span>
                  @else
                  <div class="ribbon-wrapper">
                    <div class="ribbon sale">Sale</div>
                  </div>
                  <span class="flash-del">{{number_format($new->unit_price)}} đ</span>
                  <span class="flash-sale">{{number_format($new->promotion_price)}} đ</span>
                  @endif
                </p>
              </div>
              <div class="single-item-caption">
                <br>
                <a class="add-to-cart pull-left" href="{{route('addToCart', $new->id)}}"><i class="fa fa-shopping-cart"></i></a>
                <a class="btn btn-info" href="{{route('detail', $new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div> <!-- .beta-products-list -->
    </div>
  </div> <!-- end section with sidebar and main content -->
</div> <!-- .main-content -->
@endsection