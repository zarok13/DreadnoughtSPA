@if(!isset($ajaxRequest))
    <script src="{{ asset('scripts/admin/js/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.editor',
            theme: 'silver',
            height: 400,
            plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help code',
            toolbar: 'insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | pagebreak | removeformat | template | code',
            templates: [
                @include('admin.applets.tiny_editor.templates')
            ],
        });
    </script>
@endif
@php
    $currentPlaceholder = null;
    if(isset($placeholder) && !empty($placeholder)){
        $currentPlaceholder = $placeholder;
    }
    $params['placeholder'] = $placeholder;
    $params['class'] = 'form-control editor';
    $params['rows'] = 5;
    $value = isset($array) ? $array[$name] : null;
@endphp
<div class="group">
    {!! Form::label($name, $label) !!}
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="editor-shadow">
                {{ Form::textarea($name,$value,$params) }}
            </div>
        </div>
    </div>
</div>
