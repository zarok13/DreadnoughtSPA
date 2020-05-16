@extends('admin.base')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{ route($moduleName .'.add') }}" class="btn btn-info"><i
                                    class="fas fa-plus fa-md"></i> Add Item</a>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="overflow: hidden">
                    <table id="dreadnoughtDataTable" class="table table-bordered table-striped dreadnought-table"
                           width="100%">
                        <col width="60">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Keyword</th>
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
                                    <div style="position:relative">
                                        {{ $item->keyword }}
                                        <div style="position:absolute; top:-6px; right:0px;">
                                            <a href="{{ route($moduleName.'.edit', $item->lang_id) }}">
                                                <span class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </a>
                                            &nbsp;&nbsp;&nbsp;
                                            <a href="{{ route($moduleName.'.delete', $item->lang_id) }}">
                                                <span class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Keyword</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
