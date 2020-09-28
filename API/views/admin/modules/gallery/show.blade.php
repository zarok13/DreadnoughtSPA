@extends('admin.base')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <div class="card-body">
                @include('admin.applets.forms.file_store.file_store_reference')
            </div>
        </div>
    </div>
</div>

@endsection