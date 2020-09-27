<div class="row">
    @foreach($items as $item)
    <div class="col-md-3 col-sm-3 col-xs-4 mb-5 files_effects">
        <embed id="{{ $item->file_id }}" class="media_files" src="{{ file_store_url($item->image->src) }}"
            title="{{ $item->image->src }}" type="{{mime_content_type(public_path().'/storage/'.$item->image->src)}}"
            width="100" height="100">
        <ul class="list-inline file_icons animate text-center">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <li class="list-inline-item">
                        <a href="{{ file_store_url($item->image->src) }}" target="_blank" class="btn btn-success"><i
                                class="fas fa-eye"></i></a>
                        <input type="hidden" class="file_path" value="{{ $item->image->src }}" />
                    </li>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <li class="list-inline-item">
                        <a href="javascript:void(0)"
                            data-url="{{ route('file_store.unsetReference', ['reference_type' => $referenceType, 'reference_id' =>  $referenceID ]) }}"
                            class="btn btn-danger unset"><i class="fas fa-trash"></i></a>
                    </li>
                </div>
            </div>
        </ul>
    </div>
    @endforeach
</div>
