@php
    $array = isset($item) ? $item : null;
@endphp

@include('admin.applets.forms.text',[
    'name'=>'keyword',
    'label'=>'Keyword',
    'array'=>$array,
    'params' => [
        'class' => 'form-control text',
        'required' => true,
        'autofocus' => true,
    ]
])
@include('admin.applets.forms.select',[
    'name' => 'type',
    'label' => 'Type of Field',
    'array' => isset($typeList) ? $typeList : [],
    'selected' => !empty($array) ? $array['type'] : null,
    'data_url' => route('helper_fields.typeTemplate'),
    'data_id' => !empty($array['lang_id']) ? $array['lang_id'] : null,
])
<div id="type_template">
    @include('admin.modules.helper_fields._type_template', ['typeTemplate' => !empty($array['type']) ? $array['type'] : 1])
</div>
@include('admin.applets.forms.textarea',[
    'name'=>'description',
    'label'=>'Description',
    'array'=>$array,
    'params' => [
        'class' => 'form-control',
        'placeholder' => 'Type your description here...',
        'rows' => 5
    ]
])