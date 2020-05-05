@php
    $transmitter = null;
    $original = $array;
    $params['id'] = $name;
    $params['class'] = 'form-check-input';
    $checked = true;
    $value = 1;
    if(is_array($field) && !empty($array)){
        foreach ($field as $index => $item) {
            $array = isset($array[$item]) ? $array[$item] : '';
        }
    } else {
        $array = isset($array[$field]) ? $array[$field] : '';
    }
    if(!empty($transmitter)){
        unpack_array:
        $array = $transmitter;
    }
    if ( isset($class) && $class == 'special_all' && !empty($array)) {
        foreach ($array as $index => $check) {
            if(is_array($check)){
                $transmitter = $check;
                unset($original[$index]);
                goto unpack_array;
            } else {
                if($check == 0){
                    $checked = false;
                    $value = 0;
                    break;
                }
            }
        }
        if($name == 'permissions'){
            if(count($original) > 0){
                $transmitter = $original;
                goto unpack_array;
            }
        }
    } else {
        if ($array != 1) {
            $checked = false;
            $value = 0;
        }
    }
    $params['class'] .= isset($class) ? ' ' . $class : '';
@endphp
<div class="icheck-info d-inline">
    {!! Form::checkbox($name, '1', $checked,$params) !!}
    {!! Form::hidden($name,$value) !!}
    {!! Form::label($name, $label, ['class' => 'form-check-label']) !!}
</div>
