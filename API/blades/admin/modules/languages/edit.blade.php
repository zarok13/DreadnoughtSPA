@extends('admin.base')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @include('admin.messages.errors')
                    @include('admin.messages.messages')
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Edit Item</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::model($item, ['url' => route($moduleName.'.update', ['id' => $item['lang_id']]),'autocomplete' => 'off']) !!}
                <div class="card-body">
                    @include('admin.modules.'.$moduleName.'._form')
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {!! Form::submit('Update',['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection
