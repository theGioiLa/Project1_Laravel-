@extends('admin.layout.admin')
@section('content')


@if (Session::has('status'))

<div class="alert alert-success alert-dismissable fade in">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>{{Session::get('status')}}</strong>
</div>
@endif

@foreach($categories as $id => $name)
<div class="well well-lg">
	<a><h4>{{$name}} (Hiện có {{$count[$id]}} sản phẩm)</h4></a>
	<div class="row">
		@foreach($product[$id] as $idType => $sp)

		<div class="col-sm-3">
			<div class="thumbnail">
				<img src="source/image/product/{{$sp->image}}" style="width:260px; height:240px" class="img-rounded" >
				<div class="caption">
					<p>Tên: {{ $sp->name }}</p>
					<p>
						<button type="button" class="btn " data-toggle="collapse" data-target="#{{$sp->id}}">Mô tả</button>
						<div id="{{$sp->id}}" class="collapse">
							{{ $sp->description }}
						</div>
					</p>
					<p>Giá : {{ $sp->unit_price }}</p>
					<p>
						<div class="btn-group">
							<a href="{{ route('product.edit', [$sp->id]) }}" ><button class="btn btn-primary"> Chỉnh sửa</button></a>
						</div>
						<div class="btn-group">
							{!! Form::open(['method' => 'DELETE', 'url' => ['admin/product', $sp->id]]) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
						</div>
					</p>
				</div>
			</div>
		</div>

		@endforeach

	</div>
</div>

<hr>
@endforeach

@endsection