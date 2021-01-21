@php
    $segments = Request::segments();
    $currentLang = $lang;
@endphp
@foreach (setting('langList') as $lang => $title)
    @php
        $segments[1] = $lang;
    @endphp
    <a href="{{ url(implode('/', $segments)) }}" title="{{ $title }}">
        <span class="btn btn-{{ $lang == $currentLang ? 'primary' : 'outline-secondary' }} fa-lg">{{ strtoupper($lang) }}</span>
    </a>
    &nbsp;
    &nbsp;
@endforeach