<span class="free_space"> </span>
<a class="content_edit" href="{{ getPageTypeUrl($item->page_type_id, $item->lang_id) }}"><i
        class="far fa-file-alt"></i></a>
<span class="free_space"> </span>
<a class="edit" href="{{ route($moduleName . '.edit', $item->lang_id) }}"><i class="fas fa-edit"></i></a>
<span class="free_space"> </span>
<a class="remove delete_an_item" id="{{ $item->title . '_' . $item->lang_id }}" href="jovascript:void(0)"
        data-toggle="modal" data-target="#confirm_delete"><i class="far fa-trash-alt"></i></a>