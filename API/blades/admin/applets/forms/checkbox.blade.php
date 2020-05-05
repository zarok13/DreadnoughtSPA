@php
$value = isset($array[$name]) && $array[$name] == true ? true : false;
@endphp
<div class="icheck-info d-inline">
    {!! Form::checkbox($name, 1, $value,['class'=>'form-check-input', 'id'=> $name ]) !!}
    {!! Form::label($name, $label, ['class' => 'form-check-label']) !!}
</div>
