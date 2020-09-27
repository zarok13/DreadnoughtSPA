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

@include('admin.applets.forms.text',[
    'name'=>'value',
    'label'=>'Value',
    'array'=>$array,
    'params' => [
        'class' => 'form-control text',
        'required' => true,
    ]
])