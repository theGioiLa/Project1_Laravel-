@extends('admin.layout.admin')
@section('content')
@if (session('status'))
	<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{ session('status') }}
	</div>
@endif
<h2>Thêm sản phẩm</h2>
<hr>
<div class="panel-body" id="app">
	{!! Form::open(['route' => 'product.store', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal']) !!}
		<table class="table table-hover" id='myTable'>
			<thead>
				<tr>
					<th style="width: 5px;">STT</th>
					<th style="width: 150px;">Tên sản phẩm</th>
					<th style="width: 150px;">Loại sản phẩm</th>
					<th style="width: 400px;" >Mô tả</th>
					<th style="width: 150px;">Giá gốc</th>
					<th style="width: 150px;">Khuyến mãi</th>
					<th style="width: 20px;">Ảnh đại diện</th>
				</tr>
			</thead>
			<tbody v-sortable.tr="rows">
				@for ($i = 0; $i<5; $i++)
				<tr>

					<td>
						{{ $i+1 }}
					</td>
					<td>
						{{ Form::text('name[]', null, array('class' => 'form-control')) }}
					</td>
					<td>
						{{ Form::select('id_type[]', $categories, null, ['class' => 'form-control', 'placeholder' => 'Loại']) }}
					</td>
					<td>
						{{ Form::text('description[]', '',['class' => 'form-control', 'placeholder' => 'Mô tả sản phẩm']) }}
					</td>
					<td>
						{{ Form::text('unit_price[]', null, ['class' => 'form-control']) }}
					</td>
					<td>
						{{ Form::text('promotion_price[]', null, ['class' => 'form-control']) }}
					</td>
					<td>
						{{ Form::file('image[]') }}
					</td>

				</tr>
				@endfor
			</tbody>
		</table>
		{{ Form::submit('Create', ['class' => 'btn btn-success'])}}
	{!! Form::close() !!}
</div>

@endsection