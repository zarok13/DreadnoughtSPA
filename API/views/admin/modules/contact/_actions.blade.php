<span class="free_space"> </span>
<a class="edit get_marker_form"
    href="{{ route('contact.getMarkerForm', ['page_id' => $pageID,'marker_id' => $item->id]) }}" data-toggle="modal"
    data-target="#marker_modal" title="edit marker"><i class="fas fa-edit"></i></a>
<span class="free_space"> </span>
<a class="remove delete_marker" href="javascript:void(0)"
    data-url="{{ route($moduleName.'.deleteMarker', ['marker_id' => $item->lang_id]) }}"><i
        class="far fa-trash-alt"></i></a>