@extends('admin.base')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @include('admin.messages.errors')
                @include('admin.messages.messages')
            </div>
        </div>
        <div class="card">
            
            <div class="card-header">
                <h3 class="card-title">
                    @include('admin.applets.helpers.back', ['backUrl' => route('pages')])
                    <a href="{{ route($moduleName .'.add', ['id' => $pageID]) }}" class="btn btn-info"><i
                            class="fas fa-plus fa-md"></i> Add Item</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="overflow: hidden">
                <table id="dreadnoughtDataTable" class="table table-bordered table-striped dreadnought-table"
                    width="100%">
                    <col width="60">
                    <col width="900">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="non-sortable">
                        @foreach($items as $index => $item)
                        <tr>
                            <td>
                                <i class="far fa-calendar-alt fa-lg" title="date order"></i>
                                <span style="display: none">{{ $index }}</span>
                            </td>
                            <td>
                                {{ $item->title }}
                            </td> 
                             <td class="actions">
                                @include('admin.modules.articles._actions')
                             </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@include('admin.applets.helpers._deletion_modal')
@endsection