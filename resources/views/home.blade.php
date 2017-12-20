@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Xin Chào <b>{{Auth::user()->name}} </b></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    Bạn đã đăng kí thành công! <a href="{{route('homepage')}}">Quay lại trang chủ </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
