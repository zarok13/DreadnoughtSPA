<div class="row">
    @foreach($new_items as $item)
        <div class="col-md-2 col-sm-3 col-xs-4 mb-5 files_effects">
            <embed class="media_files {{isset($smallWindow) ? 'choose' : ''}}" title="{{ $item->src }}"
                   data-url="{{isset($smallWindow) ?  route('file_store.choose') : '' }}"
                   src="{{ file_store_url($item->src) }}"
                   type="{{mime_content_type(public_path().'/storage/'.$item->src)}}"
                   width="100"
                   height="100">
            <ul class="list-inline file_icons animate text-center">
                <li class="list-inline-item">
                    <a href="{{ file_store_url($item->src) }}" target="_blank" class="btn btn-success"><i class="fas fa-eye"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript:void(0)" data-url="{{ route('file_store.delete', ['id' => $item->id]) }}" class="btn btn-danger delete {{ isset($smallWindow) ? 'small_window' : '' }}"><i class="fas fa-trash"></i></a>
                </li>
            </ul>
        </div>
    @endforeach
</div>