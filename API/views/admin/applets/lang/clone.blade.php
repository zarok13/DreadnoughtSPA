
<h3 class="float-right card-title">
    <a>Clone</a>
    &nbsp;
    &nbsp;
    @foreach (setting('langList') as $lang => $title)
    @php
        $exists = 'info';
        if($modelName::where('lang', $lang)->where('lang_id', $ID)->exists()){
            $exists = 'success';
        }
    @endphp
        <a href="{{ url('admin/' . $lang . '/' . $moduleName) }}" title="{{ $title }}">
            <span class="btn btn-" . $exists ." fa-lg">{{ $lang }}</span>
        </a>
    &nbsp;
    &nbsp;
@endforeach
</h3>