
<h3 class="float-right card-title">
    <a>Clone</a>
    &nbsp;
    &nbsp;
    @foreach ($clonableLangs as $lang)
        <a href="{{ route('articles.cloneArticle',['id' => $ID,'lang' => $lang]) }}" title="{{ $lang }}">
            <span class="btn btn-outline-warning fa-lg">{{ strtoupper($lang) }}</span>
        </a>
    &nbsp;
    &nbsp;
@endforeach
</h3>