@php
    $array = isset($item) ? $item : null;
@endphp

@include('admin.applets.forms.text',[
    'name'      => 'url',
    'label'     => 'Url',
    'array'    => $array,
    'params' => [
        'class' => 'form-control text',
        'placeholder' => 'http://',
    ]
])

@include('admin.applets.forms.select',[
    'name' => 'product_id',
    'label' => 'Product',
    'array' => isset($productsList) ? $productsList : [],
    'selected' => !empty($array) ? $array->product_id : null,
    'defaultOption' => 'Select',
    'params' => ['class'=>'']
])

@include('admin.applets.forms.text',[
    'name'=>'title',
    'label'=>'Title',
    'array'=>$array,
    'params' => [
        'class' => 'form-control text',
        'required' => true,
        'autofocus' => true,
    ]
])

@include('admin.applets.forms.attach_file',[
    'name' => 'image',
    'label' => 'Image',
    'array' => $array,
    'params' => [
        'class' => 'form-control text_upload',
        'required' => true,
    ]
])

@include('admin.applets.forms.textarea',[
    'name'=>'desc',
    'label'=>'Description',
    'array'=>$array,
    'params' => [
        'class' => 'form-control text',
    ]
])







