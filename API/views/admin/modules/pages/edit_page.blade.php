@extends('admin.base')
@section('content')
    @php
        $array = isset($item) ? $item : null;
    @endphp
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
                        <h3 class="card-title">Edit Page Content</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    {!! Form::model($item, ['url' => route($moduleName.'.updatePage', ['id' => $item['lang_id']]),'autocomplete' => 'off', 'files'=>true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                @include('admin.applets.forms.text',[
                                     'name'=>'title',
                                     'label'=>'Title',
                                     'array'=>$array,
                                     'params' => [
                                         'class' => 'form-control text',
                                         'required' => true,
                                         'autofocus' => true,
                                     ]
                                ])
                                {{-- @include('admin.applets.forms.editor',[
                                    'name' => 'text',
                                    'label' => 'Text',
                                    'array' => $array,
                                    'placeholder' => "Static page text..."
                                ]) --}}
                                @include('admin.applets.forms.attach_file',[
                                    'name' => 'main_image',
                                    'label' => 'Image',
                                    'array' => $array,
                                    'params' => [
                                        'class' => 'form-control text_upload',
                                        'required' => true
                                    ]
                                ])
                                <br>
                                @include('admin.applets.forms.file_store.file_store_reference')
                            </div>
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
