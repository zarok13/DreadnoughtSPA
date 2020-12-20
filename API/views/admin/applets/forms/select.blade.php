@php
$currentPlaceholder = null;
$currentSelected = 0;
$currentData_url = null;
$currentData_title = null;
$currentData_id = null;
$currentOnchange = null;

if(isset($placeholder) && !empty($placeholder)){
$currentPlaceholder = $placeholder;
}
if(isset($selected) && !empty($selected))
{
$currentSelected = $selected;
}
if(isset($data_url) && !empty($data_url)){
$currentData_url = $data_url;
}
if(isset($data_title) && !empty($data_title)){
$currentData_title = $data_title;
}
if(isset($data_id) && !empty($data_id)){
$currentData_id = $data_id;
}
if(isset($onchange) && !empty($onchange)){
$currentOnchange = $onchange;
}
$currentArray = isset($array) ? $array : [];
$defaultOption = isset($defaultOption) ? ['' => $defaultOption] + $currentArray : $currentArray;
@endphp
<div class="form-group">
    {!! Form::label($name, $label) !!} {!! (isset($params['required']) && $params['required'] == true) ? '<font
        color="red">*</font>' : '' !!}
    <div class="row">
        <div class="col-md-12 col-sm-12">

            {!! Form::select($name, $defaultOption, $currentSelected, ['class' => 'form-control '.$params['class'],
            'placeholder' => !empty($currentPlaceholder) ? $currentPlaceholder : null,
            'data-url' => $currentData_url,'data-title' => $currentData_title, 'data-id' => $currentData_id ]) !!}
        </div>
    </div>
</div>