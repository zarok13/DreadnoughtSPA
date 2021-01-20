@extends('admin.base')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            @include('admin.messages.errors')
            @include('admin.messages.messages')
        </div>
    </div>
    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">@include('admin.applets.helpers.back', ['backUrl' => route($moduleName, ['id'
                        => $pageID])])
                        Edit Page Content</h3>
                        {{-- {{ dd('fsd') }} --}}
                        @include('admin.applets.lang.clone')
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::model($item, ['url' => route($moduleName.'.update', ['id' => $ID]),'autocomplete' => 'off',
                'files'=>true]) !!}
                <div class="card-body">
                    <div class="row">
                        @include('admin.modules.articles._form')
                        <div class="col-md-4 page-edit-right-column">
                            {!! Form::submit('Update',['class' => 'btn btn-block bg-gradient-success']) !!}
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                {!! Form::close() !!}
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection