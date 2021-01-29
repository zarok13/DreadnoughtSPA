@extends('admin.base')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="contact_tools">
                        @include('admin.applets.forms.select',[
                           'name' => 'template_type',
                           'label' => 'Template Type',
                           'array' => isset($templateTypes) ? $templateTypes : [],
                           'selected' => !empty($selectedTemplateType) ? $selectedTemplateType : null,
                           'params' => ['class' => '']
                        ])
                        <div class="contact_tools_links">                           
                            <a class="get_marker_form" href="{{ route('contact.getMarkerForm', ['page_id' => $pageID]) }}"
                               data-toggle="modal" data-target="#marker_modal" title="add marker">
                                <i class="fas fa-plus-square btn btn-primary fa-md"></i>
                            </a>                     
                            <a id="save_data_coordinates"
                               href="{{ route($moduleName.'.saveDataCoordinates',['page_id' => $pageID]) }}"
                               title="Save Data Coordinates">
                                <i class="fas fa-sd-card btn btn-success fa-md"></i>
                            </a>
                        </div>
                    </div>
                    <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
                    <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet'/>
                    <div id="map_wrapper">
                        @include('admin.modules.contact.map_box')
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="overflow: hidden">
                <div class="card-header">
                    <div class="card-title">
                        Markers
                    </div>
                </div>
                <div class="card-body">
                    <div id="markers_wrapper">
                        @include('admin.modules.contact.marker_list')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.modules.contact._modal')
@endsection