@extends('admin.layout.admin')
@section('content')
<div class="row"> 
	<div class="col-sm-6">
		{!! Form::model($product, ['route' => ['product.update', $product->id], 'method' => 'PUT', 'files' => true]) !!}

		<div class="form-group">
			{{ Form::label('name', 'Tên sản phẩm') }}
			{{ Form::text('name', null, array('class' => 'form-control')) }}
		</div>

		<div>
			{{ Form::label('id_type', 'Loại')}}
			{{ Form::select('id_type', $categories, null, array('class' => 'form-control', 'placeholder' => 'Loại')) }}
			<br>
		</div>

		<div class="form-group">
			{{ Form::label('description', 'Mô tả') }}
			{{ Form::text('description', null, array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('unit_price', 'Giá gốc') }}
			{{ Form::text('unit_price', null, array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('promotion_price', 'Giá KM') }}
			{{ Form::text('promotion_price', null, array('class' => 'form-control')) }}
		</div>

		<div>
			{{ Form::label('newProduct', 'Hàng mới') }}
			{{ Form::select('new', [0 => 'Không', 1 => 'Có' ], $product->new, array('class' => 'form-control')) }}
			<br>
		</div>

		<div class="form-group">
			{{ Form::label('image', 'Ảnh đại diện') }}
			{{ Form::file('image', ['class' => 'form-control']) }}
		</div>

		{{ Form::submit('Edit', ['class' => 'btn btn-success'])}}

		{!! Form::close() !!}
	</div>

	<div class="col-sm-6">
		<br>
		<img src="source/image/product/{{$product->image}}" width="480px" height="480px" class="img-rounded">
	</div>
</div>
@endsection