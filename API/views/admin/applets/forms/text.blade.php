@php
    $value = isset($array) ? $array[$name] : null;
@endphp
<div class="form-group">
    {!! Form::label($name, $label) !!} {!! (isset($params['required']) && $params['required'] == true) ? '<font color="red">*</font>' : '' !!}
    <div class="row">
        <div class="col-md-12 col-sm-12">
            {!! Form::text($name, $value, $params) !!}
        </div>
    </div>
</div>
