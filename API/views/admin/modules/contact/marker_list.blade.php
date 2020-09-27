<table class="table table-bordered table-striped dreadnought-table" width="100%">
    <col width="10">
    <thead>
        <tr>
            <th>Sort</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="sortable" style="cursor: pointer;" data-url="{{ route($moduleName.'.sort') }}">
        @foreach($markerList as $item)
        <tr id="{{$item->lang_id}}" class="ui-state-default">
            <td><i class="fas fa-arrows-alt fa-lg"></i> <span style="opacity: 0">{{ $item->sort }}</span></td>
            <td>
                <span style="font-size: 18px" title="{{ $item->title }}">{{ $item->title }}</span>
            </td>
            <td class="actions">
                @include('admin.applets.actions.contacts')
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Sort</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>
