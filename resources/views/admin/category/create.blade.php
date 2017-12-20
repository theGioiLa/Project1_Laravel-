@extends('admin.layout.admin')
@section('content')
<div class="container">
	<div class="row">
		@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
		<h3> Các loại sản phẩm trong kho hiện có </h3>
		<ul class="list-inline">
		@foreach($categories as $category)
			<li>{{$category->name}}</li>
		@endforeach
		</ul>
		<hr>

		<h2>Thêm loại sản phẩm</h2>
	<hr>
	<div class="panel-body" id="app">
		{!! Form::open(['route' => 'category.store', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal']) !!}
			<table class="table table-hover" id='myTable'>
				<thead>
					<tr>
						<th style="width: 5px;">STT</th>
						<th style="width: 150px;">Loại sản phẩm</th>
						<th style="width: 400px;" >Mô tả</th>
						<th style="width: 20px;">Ảnh đại diện</th>
					</tr>
				</thead>
				<tbody v-sortable.tr="rows">
					@for ($i = 0; $i < 3; $i++)
					<tr>

						<td>
							{{ $i+1 }}
						</td>
						<td>
							{{ Form::text('name[]', null, array('class' => 'form-control')) }}
						</td>
						
						<td>
							{{ Form::text('description[]', '',['class' => 'form-control', 'placeholder' => 'Mô tả loại sản phẩm']) }}
						</td>
						<td>
							{{ Form::file('image[]' ,['class' => 'form-control']) }}
						</td>

					</tr>
					@endfor
				</tbody>
			</table>
			{{ Form::submit('Create', ['class' => 'btn btn-success'])}}
		{!! Form::close() !!}
	</div>
</div>
@stop