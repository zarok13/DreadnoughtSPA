@extends('admin.base')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card" style="overflow: hidden">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{ route($moduleName .'.add') }}" class="btn btn-info"><i
                                    class="fas fa-plus fa-md"></i> Add Item</a>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped dreadnought-table" width="100%">
                        <col width="60">
                        <col width="500">
                        <thead>
                        <tr>
                            <th>Sort</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Template</th>
                        </tr>
                        </thead>
                        <tbody id="sortable" style="cursor: pointer;" data-url="{{ route($moduleName.'.sort') }}">
                        @foreach($items as $item)
                            <tr id="{{$item->lang_id}}" class="ui-state-default">
                                <td><i class="fas fa-arrows-alt fa-lg"></i> <span
                                            style="opacity: 0">{{ $item->sort }}</span></td>
                                <td>
                                    {{ $item->title }}
                                </td>
                                <td>
                                    {{ $typeList[$item->page_type_id] }}
                                </td>
                                <td>
                                    <div style="position:relative">
                                        {{ \App\Http\Controllers\Admin\Defaults\PagesController::getTemplates($item->page_type_id)[$item->page_template_id]}}
                                        <div class="hideOnMove" style="position:absolute; top:-6px; right:0;">
                                            <a style="text-align:right"
                                               href="{{ getPageTypeUrl($item->page_type_id, $item->lang_id) }}"
                                               title="Edit page content"><i
                                                        class="fas fa-align-justify btn btn-secondary fa-sm mr-2"></i></a>
                                            <a style="text-align:right"
                                               href="{{ route($moduleName.'.edit', $item->lang_id) }}"
                                               title="Edit item"><i class="fas fa-edit btn btn-warning fa-sm mr-1"></i></a>
                                            <a style="text-align:right"
                                               href="{{ route($moduleName.'.delete', $item->lang_id) }}"
                                               title="Remove item"><i
                                                        class="fas fa-trash btn btn-danger fa-sm ml-1"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sort</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Template</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
