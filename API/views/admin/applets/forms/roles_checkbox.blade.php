@php
    $params['id'] = $name;
    $params['class'] = isset($class) ? $class : '';
    $params['class'] .= ' form-check-input';
    $checked = true;
    $value = !isset($value) ? 0 : $value;

    if($class != 'special_all'){
        $check = $array[$moduleName][$label];

        if (empty($check))
            $checked = false;
    } else {
        if(in_array(0, $array[$moduleName]))
            $checked = false;
    }
@endphp

<div class="icheck-info d-inline">
    {!! Form::checkbox($name, $value, $checked,$params) !!}
    {!! Form::hidden($name, $value) !!}
    {!! Form::label($name, $label, ['class' => 'form-check-label']) !!}
</div>
