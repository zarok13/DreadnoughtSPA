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

@include('admin.applets.forms.text',[
    'name' => 'slug',
    'label' => 'Slug',
    'array'=>$array,
    'params' => [
        'class' => 'form-control text',
        'disabled' => true,
    ]
])

@include('admin.applets.forms.select',[
    'name' => 'page_type_id',
    'label' => 'Type of Page',
    'array' => isset($typeList) ? $typeList : [],
    'selected' => !empty($array) ? $array->page_type_id : null,
    'data_url' => route('pages.templateGroup'),
    'params' => ['class'=>'']
])

@include('admin.applets.forms.select',[
   'name' => 'page_template_id',
   'label' => 'Template of Page',
   'array' => isset($templateList) ? $templateList : [],
   'selected' => !empty($array) ? $array->page_template_id : null,
   'params' => ['class'=>'']
])
