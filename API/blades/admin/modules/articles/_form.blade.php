@php
    $array = isset($item) ? $item : null;
@endphp

@include('admin.applets.forms.text',[
    'name' => 'title',
    'label' => 'Title',
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

@if($template == 'services')
    @include('admin.applets.forms.textarea',[
        'name'=>'desc',
        'label'=>'Description',
        'array'=>$array,
        'params' => [
            'class' => 'form-control',
            'placeholder' => 'Type your description here...',
            'rows' => 5
        ]
    ])
@endif

@include('admin.applets.forms.editor',[
    'name' => 'text',
    'label' => 'Text',
    'array' => $array,
    'placeholder' => "Article page text..."
])
@include('admin.applets.forms.attach_file',[
    'name' => 'image',
    'label' => 'Image',
    'array' => $array,
    'params' => [
        'class' => 'form-control text_upload'
    ]
])


