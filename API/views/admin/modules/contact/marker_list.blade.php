<ul id="sortable" data-url="{{ route($moduleName . '.sort') }}">
    @foreach($markerList as $item)
    <li id="{{ $item->lang_id }}" class="ui-state-default">
        <i class="fas fa-arrows-alt fa-lg"></i> <span style="opacity: 0">{{ $item->sort }}</span>
        {{ $item->title }}
        <span class="list_right_section" style="cursor: pointer;">
            @include('admin.modules.contact._actions')
        </span>
    </li>
    @endforeach
</ul>