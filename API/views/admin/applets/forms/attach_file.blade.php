@php
    $params[] .= 'readonly';
    $value = isset($array) ? $array[$name] : null;
@endphp
<label for="{{ $name }}">{{ $label }} {!! (isset($required) && $required != false) ? '<span>*</span>' : '' !!}</label>
<div class="input_icon_group">
    <a href="{{ route('small_file_store') }}" class="upload_file_icons attach"><h5><i
                    class="far fa-file-alt fa-lg"></i></h5></a>
    <a href="{{ file_store_url('/') }}" target="_blank" class="upload_file_icons view" title="{{ file_store_url('/') }}"><h4><i
                    class="fas fa-eye"></i></h4></a>
    <div class="attached_file_name" style="width:100%">
        {!! Form::text($name, empty($value) ? '' : $value, $params) !!}
    </div>
    <a href="javascript:void(0)"
       class="upload_file_icons clear"><h5><i class="fas fa-broom fa-lg"></i></h5></a>
</div>



