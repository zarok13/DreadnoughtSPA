@extends('admin.login_wrapper')

@section('content')
@php
    $language = app()->getLocale();
@endphp

<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>Dr</b>eadnought {{ setting('version') }}</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{  lang('admin_login_text') }}</p>

            {!! Form::open(['route' => ['login', $language],'autocomplete' => 'on', 'id' => 'dreadnought_login']) !!}
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
                    {!! Form::submit('Log in',['class'=>'btn btn-primary btn-block', 'id' =>
                    'dreadnought_login_button']) !!}
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
<script>
    $(document).ready(function(){
        console.log($('#dreadnought_login'));
        $('#dreadnought_login').on('submit', function () {
            $('#dreadnought_login_button').attr("disabled", true).css("background", "gray");
        });
    });
</script>
@endsection