@extends('admin.layout.admin')
@section('content')
<div class="container">
	@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
	@endif
	<table class="table table-bordered">
		<h3 style="text-align: left;"><b>Danh mục sản phẩm trong kho </b></h3>
		<hr>
		<thead>
			<tr>
				<th style="text-align: center;" scope="col">STT</th>
				<th style="text-align: center;" scope="col">Danh mục</th>
				<th style="text-align: center;" scope="col">Ngày tạo</th>
				<th style="text-align: center;" scope="col">Số lưọng sản phẩm hiện có</th>
			</tr>
		</thead>
		<tbody>
			@foreach($catalog as $cata)
			<tr>
				<td>{{++$index}}</td>
				<td>{{$cata[0]->name}}</td>
				<td>{{$cata[0]->created_at->format('d-m-Y')}}</td>
				<td>{{$cata[1]}}</td>
				<td>
					{!! Form::open(['method' => 'DELETE', 'url' => ['admin/category', $cata[0]->id]]) !!}
					{!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

</div>
@stop