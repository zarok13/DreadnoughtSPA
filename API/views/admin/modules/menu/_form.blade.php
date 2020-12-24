@php
    $array = isset($item) ? $item : null;
@endphp

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

@include('admin.applets.forms.checkbox',[
    'name'=>'main',
    'label'=>'Main Page',
    'array'=>$array
])

@include('admin.applets.forms.select',[
    'name'=>'page_id',
    'label'=>'Page',
    'array'=>isset($pageList) ? $pageList : [],
    'selected' => !empty($array) ? $array['page_id'] : null,
    'placeholder'=>'no page',
    'params' => ['class'=>'']
])

@include('admin.applets.forms.select',[
    'name'=>'parent_id',
    'label'=>'Parent',
    'array'=>isset($parentList) ? $parentList : [],
    'selected' => !empty($array) ? $array['parent_id'] : null,
    'placeholder'=>'no parent',
    'params' => ['class'=>'']
])

