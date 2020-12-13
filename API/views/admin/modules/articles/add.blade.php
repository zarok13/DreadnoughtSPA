@extends('admin.base')
@section('content')
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
                        <h3 class="card-title">@include('admin.applets.helpers.back', ['backUrl' => route($moduleName, ['id' => $pageID])])
                            Create an item</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    {!! Form::open(['url' => route($moduleName.'.create', ['id' => $pageID]),'autocomplete' => 'off']) !!}
                    <div class="card-body">
                        <div class="row">
                            @include('admin.modules.articles._form')
                            <div class="col-md-4 page-edit-right-column">
                                {!! Form::submit('Create',['class' => 'btn btn-block bg-gradient-primary']) !!}
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


