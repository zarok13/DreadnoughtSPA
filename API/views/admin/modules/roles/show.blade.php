@extends('admin.base')
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            {!! Form::open(['url' => route('administration.roles.update'),'autocomplete' => 'off']) !!}
            <div class="card-header">
                @include('admin.applets.forms.select',[
                'name' => 'role',
                'label' => 'Roles:',
                'array' => isset($roleList) ? $roleList : [],
                'selected' => null,
                'params' => ['class'=>'']
                ])
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <ul id="tree1">
                    <div class="icheck-info d-inline">
                        {!! Form::checkbox('permissions', 1, $allChecked, ['class' => 'form-check-input special_all', 'id' => 'permissions'])
                        !!}
                        {!! Form::label('permissions', 'All permissions', ['class' => 'form-check-label']) !!}
                    </div>

                    @foreach($permissions as $index => $module)
                    <li>
                        <div class="role_trigger">
                            <i class="indicator fas fa-minus"></i>
                            {{ trans('default.'.$index) }}
                        </div>
                        <ul>
                            <li>
                                @include('admin.applets.forms.roles_checkbox',[
                                    'name' => 'permissions['.$index.']',
                                    'label' => 'All',
                                    'moduleName' => $index,
                                    'array' => $permissions,
                                    'class' => 'special_all'
                                ])
                            </li>

                            @foreach($module as $index2 => $action)
                            <li>
                                @include('admin.applets.forms.roles_checkbox',[
                                    'name' => 'actions['.$index.']['.$index2.']',
                                    'label' => $index2,
                                    'value' => !empty($action) ? 1 : 0,
                                    'moduleName' => $index,
                                    'array' => $permissions,
                                    'class' => 'special',
                                ])
                            </li>
                            @endforeach

                        </ul>
                    </li>
                    @endforeach

                </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="update_roles">
                    {!! Form::submit('Update',['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close()!!}
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Add new role
                </h3>
            </div>
            {!! Form::open(['url' => route('administration.roles.create'),'autocomplete' => 'off']) !!}
            <div class="card-body">
                @include('admin.applets.forms.text',[
                'name'=>'title',
                'label'=>'Title',
                'params' => [
                'class' => 'form-control text',
                'required' => true,
                ]
                ])
            </div>
            <div class="card-footer">
                <div class="update_roles">
                    {!! Form::submit('Create',['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>
@endsection
