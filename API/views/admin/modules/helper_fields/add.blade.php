@extends('admin.base')
@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					@include('admin.messages.errors')
					@include('admin.messages.messages')
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<!-- left column -->
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">@include('admin.applets.helpers.back', ['backUrl' => route($moduleName)])
						Add instance</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				{!! Form::open(['url' => route($moduleName.'.create'),'autocomplete' => 'off']) !!}
				<div class="card-body">
					@include('admin.modules.'.$moduleName.'._form')
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					{!! Form::submit('Create',['class' => 'btn btn-success']) !!}
				</div>
				{!! Form::close() !!}
			</div>
			<!-- /.card -->
		</div>
	</div>
</div>
<script src="{{ asset('scripts/admin/js/tinymce.min.js') }}" referrerpolicy="origin"></script>
@endsection
