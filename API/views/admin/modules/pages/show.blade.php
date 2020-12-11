@extends('admin.base')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route($moduleName . '.add') }}" class="btn btn-info"><i class="fas fa-plus fa-md"></i>
                        Add Item</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
                <table class="table table-bordered table-striped dreadnought-table" width="100%">
                    <col width="10">
                    <thead>
                        <tr>
                            <th>Sort</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Template</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="sortable" data-url="{{ route($moduleName . '.sort') }}"  >
                        @foreach($items as $item)
                        <tr id="{{ $item->lang_id }}" class="ui-state-default">
                            <td><i class="fas fa-arrows-alt fa-lg"></i> <span
                                    style="opacity: 0">{{ $item->sort }}</span></td>
                            <td>
                                {{ $item->title }}
                            </td>
                            <td>
                                {{ $typeList[$item->page_type_id] }}
                            </td>
                            <td>
                                {{ \App\Http\Controllers\Admin\Defaults\PagesController::getTemplates($item->page_type_id)[$item->page_template_id] }}
                            </td>
                            <td class="actions">
                                @include('admin.modules.pages._actions')
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
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection