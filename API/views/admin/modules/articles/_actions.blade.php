<div class="dropdown hideOnMove">
    <a class="btn btn-sm btn-info " href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="false" aria-expanded="false">
        <i class="fa fa-bars"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{ route($moduleName . '.edit', $item->lang_id) }}">Edit</a>
        <hr>
        <a class="dropdown-item" href="{{ route($moduleName . '.delete', $item->lang_id) }}">Delete</a>
    </div>
</div>