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

{{--@include('admin.applets.forms.text',[--}}
{{--    'name'=>'sub_title',--}}
{{--    'label'=>' Sub Title',--}}
{{--    'array'=>$array,--}}
{{--    'params' => [--}}
{{--        'class' => 'form-control text',--}}
{{--    ]--}}
{{--])--}}

@include('admin.applets.forms.text',[
    'name'      => 'url',
    'label'     => 'Url',
    'array'    => $array,
    'params' => [
        'class' => 'form-control text',
        'placeholder' => 'http://',
    ]
])

@include('admin.applets.forms.attach_file',[
    'name' => 'src',
    'label' => 'Image',
    'array' => $array,
    'params' => [
        'class' => 'form-control text_upload'
    ]
])

@include('admin.applets.forms.editor',[
    'name' => 'desc',
    'label' => 'Description',
    'array' => $array,
    'placeholder' => "Type your description here..."
])




