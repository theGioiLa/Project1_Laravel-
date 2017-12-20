 <div class="container">
 	<div class="row">
 		<h4><span class="label label-primary">Sản phẩm đã xem</span></h4>
 		<br>
 		{{-- {{dd(session()->get('viewedProductList'))}} --}}
 		@if (session()->has('viewedProductList'))
 		@foreach(session()->get('viewedProductList') as $product)

 		<div class="col-sm-3 well text-center">
 			<div class="single-item-header">
 				<a href="{{ route('detail', $product->id) }}"><img src="source/image/product/{{$product->image}}" height="280px" image-rendering='pixelated' alt=""></a>
 			</div>
 			<div class="single-item-body">
 				<p class="single-item-title">{{ $product->name }}</p>
 				<br>
 				<p class="single-item-price">

 					@if($product->promotion_price == 0)
 					<span class="flash-sale">{{ number_format($product->unit_price) }} vnđ</span>
 					@else
					<span class="flash-del">{{ number_format($product->unit_price) }} đ</span>
					<span class="flash-sale">{{ number_format($product->promotion_price) }} vnđ</span>
					<div class="ribbon-wrapper">
						<div class="ribbon sale">Sale</div>
					</div>
 					@endif
 				</p>
 			</div>
			<div class="single-item-caption">
				<br>
				<a href="{{route('addToCart', $product->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span>Thêm vào giỏ</a  > 
				<a href="{{ route('detail', $product->id) }}" class="btn btn-info">Chi tiết</a>
				<div class="clearfix"></div>
			</div>
 		</div>
 		@endforeach
 		@endif
 	</div>
</div>