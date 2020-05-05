<div class="modal-header">
    <h5 class="modal-title" id="marker_modal_label">{{ $modalTitle }} Marker</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    @php
        $title = isset($item->title) ? $item->title : '';
        $desc = isset($item->desc) ? $item->desc : '';
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
</div>
<div class="modal-footer">
    <button type="button" id="marker_form" title="{{ $modalTitle }}" class="btn btn-success" data-url="{{ route('contact.updateMarker', ['page_id' => $pageID, 'marker_id' => isset($item) ? $item->id : null]) }}">Save Changes</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>