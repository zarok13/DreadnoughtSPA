@php
    $array = isset($item) ? $item : null;
@endphp


@include('admin.applets.forms.text',[
    'name'=>'name',
    'label'=>'Name',
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
        'class' => 'form-control text_upload'
    ]
])

@include('admin.applets.forms.textarea',[
    'name'=>'review',
    'label'=>'Review',
    'array'=>$array,
    'params' => [
        'class' => 'form-control',
        'placeholder' => 'Type your description here...',
        'rows' => 5
    ]
])




