<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.base.header')
@php
    $managerAction = 'choose';
    if($fileReferences == true){
        $managerAction = 'multiple_attach';
    }
@endphp
<body class="hold-transition sidebar-mini layout-fixed">
    <div id="image-loader" style="display: none;">
        <img src="{{ statimg('loadingImg.gif', true) }}">
    </div>
    <div class="wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {!! Form::open(['url' => route($moduleName.'.upload'),
                        'data-url' => route($moduleName.'.upload'), 'id' => 'dreadnought-file-store', 'files'=>true])
                        !!}
                        <div class="drag-and-drop-container">
                            <div id="file-uploading-loader" style="display: none;">
                                <img src="{{ statimg('fileUploading.gif', true) }}">
                            </div>
                            <div class="drag-and-drop-title">
                                <h2><i class="fab fa-skyatlas fa-lg"></i> Drag&Drop</h2>
                            </div>
                            {!! Form::file('files[]',[
                            'class' => 'form-control',
                            'id' => 'drag-and-drop-field',
                            'accept' => 'application/msword,
                            application/vnd.ms-excel,
                            application/vnd.ms-powerpoint,
                            text/plain, application/pdf,
                            image/*',
                            'multiple' => true,
                            ]) !!}
                            {!! Form::hidden('smallWindow', 'true') !!}
                        </div>
                        {!! Form::close() !!}
                        @if($fileReferences == true)
                            <a
                            href="javascript:void(0)"
                            id="apply_references"
                            data-url="{{ route($moduleName.'.applyReferences',
                            ['reference_type' => $referenceType, 'reference_id' => $referenceID]) }}"
                            class="btn btn-success"
                            title="Apply selected"
                            style="margin-left:20px;">
                                <span><i class="fas fa-memory fa-sm"></i>&nbsp;&nbsp;Apply selected</span>
                            </a>
                        @endif
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body" style="overflow: hidden">

                        <div class="uploaded_files {{ $managerAction }}">
                            <div class="row">
                                @foreach($items as $item)
                                <div class="col-md-2 col-sm-3 col-xs-4 mb-5 files_effects">
                                    <embed id="{{ $fileReferences == true ? $item->id : '' }}"
                                        class="media_files {{ $managerAction }}"
                                        src="{{ file_store_url($item->src) }}"
                                        title="{{ $item->src }}"
                                        data-url="{{ $fileReferences != true ? route('file_store.choose') : '' }}"
                                        type="{{mime_content_type(public_path().'/storage/'.$item->src)}}"
                                        width="100"
                                        height="100">
                                    <ul class="list-inline file_icons animate text-center">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <li class="list-inline-item">
                                                    <a href="{{ file_store_url($item->src) }}" target="_blank"
                                                        class="btn btn-success"><i class="fas fa-eye"></i></a>
                                                    <input type="hidden" class="file_path" value="{{ $item->src }}" />
                                                </li>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)"
                                                        data-url="{{ route('file_store.delete', ['id' => $item->id]) }}"
                                                        class="btn btn-danger delete small_window"><i
                                                            class="fas fa-trash"></i></a>
                                                </li>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    @include('admin.base.scripts')
</body>

</html>
