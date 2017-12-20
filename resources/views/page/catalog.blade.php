@extends('master')
@section('title', 'Danh mục')
@section('content')

<div class="inner-header">
  <div class="container">
    <div class="pull-left">
      <h6 class="inner-title">Sản phẩm</h6>
    </div>
    <div class="pull-right">
      <div class="beta-breadcrumb font-large">
        <a href="{{route('homepage')}}">Trang chủ</a> / <span>Sản phẩm </span>
      </div>
    </div>

    <div class="clearfix"></div>
  </div>
  <hr>
  <div class="container">
    <div class="row">   
    </div>
  </div>
</div>


@if ($type == '')
{{'Danh muc san pham'}}
@else

<div class="container">
  <div id="content" class="space-top-none">
    <div class="main-content">
      <div class="space60">&nbsp;</div>
      <div class="row">
        <div class="col-sm-3">
          <ul class="aside-menu">
            @foreach($catalog as $danhmuc)
            <li><a href="{{route('catalog', $danhmuc->id)}}">{{$danhmuc->name}}</a></li>
            @endforeach
          </ul>
          <hr>
          {!! Form::open(['url' => "catalog/$type", 'method' => 'GET', 'data-parsley-validate'=>'']) !!}
          <ul class="aside-menu">
            <li>
              <div class="form-group ">
                {{ Form::label('name', 'Gía') }}
                {{ Form::select('price', ['1' => 'Tăng dần ', '2' => 'Giảm dần']) }}
              </div>
            </li>
            <li>
              <div class="form-group">
                {{ Form::label('name', 'Tên loại sản phẩm') }}
                {{ Form::select('test', ['1' => 'Tăng dần ', '2' => 'Giảm dần']) }}
              </div>
            </li>
            {{ Form::submit('Lọc', ['class' => 'btn btn-default'])}}
            {!! Form::close() !!}
          </ul>
        </div>
        
        <div class="col-sm-9">
          <div class="row">
              <h4><span class="label label-primary">{{$loaisp->name}}</span></h4>
              <div class="beta-products-details">
                <p class="pull-left label label-success" style="font-size: 18px;">Hiện có <strong>{{count($sp_theoloai)}}</strong> sản phẩm</p>
                <div class="clearfix"></div>
              </div>
              @foreach($sp_theoloai as $sp)

              <div class="col-sm-4 text-center well">
                <div class="single-item">
                  <div class="single-item-header">
                    <a href="{{route('detail', $sp->id)}}"><img src="source/image/product/{{$sp->image}}" height='280px' alt=""></a>
                  </div>
                  <div class="single-item-body">
                    <p class="single-item-title">{{$sp->name}}</p>
                    <br>
                    <p class="single-item-price">
                      @if ($sp->promotion_price == 0)
                      <span class="flash-salel">{{number_format($sp->unit_price)}} vnđ</span>
                      @else
                      <span class="flash-del">{{number_format($sp->unit_price)}} vnđ</span>
                      <span class="flash-sale">{{number_format($sp->promotion_price)}} vnđ</span>
                      <div class="ribbon-wrapper">
                        <div class="ribbon sale">Sale</div>
                      </div>
                      @endif
                    </p>
                  </div>
                  <div class="single-item-caption">
                    <br>
                    <a href="{{route('addToCart',$sp->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span>Thêm vào giỏ</a> 
                    <a href="{{route('detail', $sp->id)}}" class="btn btn-info">Chi tiết</a>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>

              @endforeach
          </div> 

          <div class="space50">&nbsp;</div>
        </div>
      </div>
    </div>

    <div class="row">
      <h4><span class="label label-primary">Sản phẩm khác</span></h4>
      <div class="space10">&nbsp;</div>

      @foreach($sp_khac as $sp)
      <div class="col-sm-3 well text-center">
        <div class="single-item">
          <div class="single-item-header">
            <a href="{{route('detail', $sp->id)}}"><img src="source/image/product/{{$sp->image}}" height="280px" alt=""></a>
          </div>
          <div class="single-item-body">
            <p class="single-item-title">{{$sp->name}}</p>
            <br>
            <p class="single-item-price">
              @if ($sp->promotion_price == 0)
              <span class="flash-salel">{{number_format($sp->unit_price)}} vnđ</span>
              @else
              <span class="flash-del">{{number_format($sp->unit_price)}} vnđ</span>
              <span class="flash-sale">{{number_format($sp->promotion_price)}} vnđ</span>
              <div class="ribbon-wrapper">
                <div class="ribbon sale">Sale</div>
              </div>
              @endif
            </p>
          </div>
          <div class="single-item-caption">
            <br>
            <a href="{{route('addToCart',$sp->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span>Thêm vào giỏ</a  > 
            <a href="{{route('detail', $sp->id)}}" class="btn btn-info">Chi tiết</a>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      @endforeach
        {{$sp_khac->links()}}

      <div class="space40">&nbsp;</div>
    </div> 
  </div>
</div>      
   
@endif
@stop
