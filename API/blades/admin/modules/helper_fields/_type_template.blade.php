@switch($typeTemplate)
    @case(1)
    @include('admin.applets.forms.text',[
         'name'=>'value',
         'label'=>'Value',
         'array'=>$array,
         'params' => [
            'class' => 'form-control text',
        ]
     ])
    @break
    @case(2)
    @include('admin.applets.forms.textarea',[
        'name'=>'value',
        'label'=>'Value',
        'array'=>$array,
         'params' => [
            'class' => 'form-control',
            'placeholder' => 'Type your description here...',
        ]
    ])
    @break
    @case(3)
    @include('admin.applets.forms.editor',[
       'name' => 'value',
       'label' => 'Value',
       'array' => $array,
       'placeholder' => "Static page text...",
    ])
    @break
    @case(4)
    @include('admin.applets.forms.attach_file',[
        'name' => 'value',
        'label' => 'Value',
        'array' => $array,
        'params' => [
            'class' => 'form-control text_upload'
        ]
    ])
    @break
@endswitch