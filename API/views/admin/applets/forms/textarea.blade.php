@php
    $value = isset($array) ? $array[$name] : null;
@endphp
<div class="group">
    {!! Form::label($name, $label) !!}
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="editor-shadow">
                {{ Form::textarea($name,$value,$params) }}
            </div>
        </div>
    </div>
</div>