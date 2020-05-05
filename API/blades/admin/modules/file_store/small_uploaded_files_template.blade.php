<div class="row">
    @foreach($new_items as $item)
        <div class="col-md-2 col-sm-3 col-xs-4 mb-5 files_effects">

            <embed class="media_files choose" data-url="{{ route('file_store.choose') }}"
                   title="{{ $item->src }}" src="{{ file_store_url($item->src) }}"
                   type="{{mime_content_type(public_path().'/storage/'.$item->src)}}"
                   width="100"
                   height="100">
            <ul class="list-inline file_icons animate text-center">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <li class="list-inline-item">
                            <a href="{{ file_store_url($item->src) }}" target="_blank"
                               class="btn btn-success"><i class="fas fa-eye"></i></a>
                            <input type="hidden" class="file_path" value="{{ $item->src }}"/>
                        </li>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <li class="list-inline-item">
                            <a href="javascript:void(0)"
                               data-url="{{ route('small_file_store.delete', ['id' => $item->id]) }}"
                               class="btn btn-danger delete"><i class="fas fa-trash"></i></a>
                        </li>
                    </div>
                </div>
            </ul>
        </div>
    @endforeach
</div>