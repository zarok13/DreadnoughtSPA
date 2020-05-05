@extends('admin.login_wrapper')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>Dr</b>eadnought</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            {!! Form::open(['route' => 'login','autocomplete' => 'on']) !!}
            <div class="input-group mb-3">
                {!! Form::text('email',null,['class' => 'form-control', 'placeholder' => 'Email', 'autofocus']) !!}
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password']) !!}
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <!-- /.col -->
                <div class="col-4">
                    {!! Form::submit('Log in',['class'=>'btn btn-primary btn-block']) !!}
                </div>
                <!-- /.col -->
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.login-card-body -->
    </div>
	@include('admin.messages.errors')
	@include('admin.messages.messages')
</div>
<!-- /.login-box -->
@endsection
