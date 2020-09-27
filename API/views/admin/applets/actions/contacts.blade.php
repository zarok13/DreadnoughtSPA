<div class="dropdown show hideOnMove">
    <a class="btn btn-sm btn-info " href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="false" aria-expanded="false">
        <i class="fa fa-bars"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a id="marker{{ $item->id }}" class="dropdown-item get_marker_form"
            href="{{ route('contact.getMarkerForm', ['page_id' => $pageID,'marker_id' => $item->id]) }}"
            data-toggle="modal" data-target="#marker_modal" title="edit marker"> Edit
        </a>
        <hr>
        <a href="javascript:void(0)" class="dropdown-item delete_marker"
            data-url="{{ route($moduleName.'.deleteMarker', ['marker_id' => $item->lang_id]) }}"> Delete</a>
    </div>
</div>
