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
                        <thead>
                        <tr>
                            <th>Sort</th>
                            <th>Title</th>
                            <th>Parent</th>
                        </tr>
                        </thead>
                        <tbody id="sortable" style="cursor: pointer;" data-url="{{ route($moduleName.'.sort') }}">
                        @foreach($items as $item)
                            <tr id="{{$item->lang_id}}" class="ui-state-default">
                                <td><i class="fas fa-arrows-alt fa-lg"></i> <span
                                            style="opacity: 0">{{ $item->sort }}</sp>
                                </td>        
                                <td>
                                    {{ $item->title }}
                                </td>
                                <td>
                                    <div style="position:relative">
                                        @if( $item->parent_id != null)
                                        @php 
                                            $parent = $item->getParent($item->parent_id);
                                        @endphp
                                         <div class="hideOnMove" style="position:absolute; top:-6px">
                                        <a href="{{ route($moduleName.'.edit', $parent->lang_id) }}">
                                                <span class="btn btn-warning" style="font-size: 12px;">
                                                    {{$parent->title}}
                                                </span>
                                            </a>
                                        </div>
                                        @endif
                                        <div class="hideOnMove" style="position:absolute; top:-6px; right:0px;">               
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
                            <th>Sort</th>
                            <th>Title</th>
                            <th>Parent</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
