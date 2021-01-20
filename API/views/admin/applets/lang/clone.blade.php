
<h3 class="float-right card-title">
    <a>Clone</a>
    &nbsp;
    &nbsp;
    @foreach (setting('langList') as $lowerCase => $title)
        <a href="{{ url('admin/' . $lowerCase . '/' . $moduleName) }}" title="{{ $title }}">
            <span class="btn btn-info fa-lg">{{ $lowerCase }}</span>
        </a>
    &nbsp;
    &nbsp;
@endforeach
</h3>