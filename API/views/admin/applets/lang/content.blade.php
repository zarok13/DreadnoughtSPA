@php
    $segments = Request::segments();
@endphp
@foreach (setting('langList') as $lang => $title)
    @php
        $segments[1] = $lang;
    @endphp
    <a href="{{ url(implode('/', $segments)) }}" title="{{ $title }}">
        <span class="btn btn-outline-secondary fa-lg">{{ $lang }}</span>
    </a>
    &nbsp;
    &nbsp;
@endforeach