@extends('master')
@section('title', $product->name)
@section('content')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=412802182453520';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sản phẩm </h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large"> 
				<a href="{{route('homepage')}}">Trang chủ</a> / <span>Sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">

				<div class="row">
					<div class="col-sm-4 well">
						<img src="source/image/product/{{$product->image}}" height="320px" width="270px" alt="">
						@if ($product->promotion_price != 0)
						<div class="ribbon-wrapper">
							<div class="ribbon sale">Sale</div>
						</div>
						@endif
					</div>

					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title"><h2>{{$product->name}}</h2></p><hr>
							<p class="single-item-price">
								<span class="label label-info">Giá</span>
								@if ($product->promotion_price == 0)
								<span class="flash-salel">{{number_format($product->unit_price)}} vnđ</span>
								@else
								<span class="flash-del">{{number_format($product->unit_price)}} vnđ</span>
								<span class="flash-sale">{{number_format($product->promotion_price)}} vnđ</span>
								<hr>
								@endif
							</p>
							<p>
								<a href="{{route('addToCart', $product->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span>Thêm vào giỏ</a  > 
							</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Mô tả</a></li>
						<li><a href="#tab-reviews">Đánh giá</a></li>
					</ul>

					<div class="panel" id="tab-description">
						<p> {{ $product->description }}</p>
					</div>
					<div class="panel" id="tab-reviews">
						
						<div class="fb-comments" data-href="http://localhost/project7/public/index.php/product_detail/{{$product->id}}" data-width="800" data-numposts="3"></div>								
					</div>
				</div>
				<div class="space50">&nbsp;</div>

					<div class="row">
						<h4><span class="label label-primary">Sản phẩm cùng loại</span></h4><br>

						@foreach($similarPro as $sp)
						
						<div class="col-sm-4 text-center well">
							<div class="single-item">
								<div class="single-item-header">
									<a href="{{ route('detail', $sp->id) }}"><img src="source/image/product/{{$sp->image}}" height="280px" image-rendering='pixelated' alt=""></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">{{ $sp->name }}</p>
									<br>
									<p class="single-item-price">

										@if($sp->promotion_price == 0)
										<span class="flash-sale">{{ number_format($sp->unit_price) }} vnđ</span>
										@else
										<span class="flash-del">{{ number_format($sp->unit_price) }} vnđ</span>
										<span class="flash-sale">{{ number_format($sp->promotion_price) }} vnđ</span>
										<div class="ribbon-wrapper">
											<div class="ribbon sale">Sale</div>
										</div>
										@endif
									</p>
								</div>
								<div class="single-item-caption">
									<br>
									<a href="{{route('addToCart', $sp->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span>Thêm vào giỏ</a  > 
									<a href="{{ route('detail', $sp->id) }}" class="btn btn-info">Chi tiết</a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						
						@endforeach
						
					</div>
					<div class="row">
						{{$similarPro->links()}}
					</div>
			</div>
			<div class="col-sm-3 aside">
				{{-- <div class="widget">
					<h3 class="widget-title">Best Sellers</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							<div class="media beta-sales-item">
								<a class="pull-left" href="{{route('detail')}}"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="{{route('detail')}}"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="{{route('detail')}}"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="{{route('detail')}}"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- best sellers widget --> --}}
				<div class="widget">
					<h3 class="widget-title">Sản phẩm mới</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							@foreach($newPro as $sp)
							<div class="media beta-sales-item">
								<a class="pull-left" href="{{route('detail', $sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt=""></a>
								<div class="media-body">
									{{$sp->name}}
									<span class="beta-sales-price">{{$sp->unit_price}} vnđ</span>
								</div>
							</div>
							@endforeach
							
						</div>
						
					</div>
				</div> <!-- best sellers widget -->
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection
