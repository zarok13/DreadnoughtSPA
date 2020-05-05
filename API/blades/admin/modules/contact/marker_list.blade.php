<table class="table table-bordered table-striped dreadnought-table" width="100%">
    <col width="60">
    <thead>
    <tr>
        <th>Sort</th>
        <th>Title</th>
    </tr>
    </thead>
    <tbody id="sortable" style="cursor: pointer;" data-url="{{ route($moduleName.'.sort') }}">
    @foreach($markerList as $item)
        <tr id="{{$item->lang_id}}" class="ui-state-default">
            <td><i class="fas fa-arrows-alt fa-lg"></i> <span style="opacity: 0">{{ $item->sort }}</span></td>
            <td>
                <div style="position:relative">
                    <span>{{ $item->title }}</span>
                    <div class="hideOnMove" style="position:absolute; top:-6px; right:0px;">
                        <a id="marker{{ $item->id }}" class="get_marker_form"
                           href="{{ route('contact.getMarkerForm', ['page_id' => $pageID,'marker_id' => $item->id]) }}"
                           data-toggle="modal"
                           data-target="#marker_modal" title="edit marker">
                            <i class="fas fa-edit btn btn-warning fa-xs mr-1"></i>
                        </a>
                        <a href="javascript:void(0)" class="delete_marker"
                           data-url="{{ route($moduleName.'.deleteMarker', ['marker_id' => $item->lang_id]) }}">
                            <i class="fas fa-trash btn btn-danger fa-xs"></i></a>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>Sort</th>
        <th>Title</th>
    </tr>
    </tfoot>
</table>

