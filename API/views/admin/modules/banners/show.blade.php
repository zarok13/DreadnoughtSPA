@extends('admin.base')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" style="overflow: hidden">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route($moduleName .'.add') }}" class="btn btn-info"><i class="fas fa-plus fa-md"></i>
                        Add Item</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <ul id="sortable" data-url="{{ route($moduleName . '.sort') }}">
                    @foreach($items as $item)
                    <li id="{{ $item->lang_id }}" class="ui-state-default">
                        <i class="fas fa-arrows-alt fa-lg"></i> <span style="opacity: 0">{{ $item->sort }}</span>
                        {{ $item->title }}
                        <span class="list_right_section">
                            @include('admin.modules.banners._actions')
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
