
// <div id="map" class="map"></div>

mapboxgl.accessToken = 'pk.eyJ1IjoiemFyb2siLCJhIjoiY2s4Njl5eHpxMDA3dTNubGs5ZDh6ZjJyciJ9.9KM0OsYdbSC3KzlF2tjUEw';
var monument = [{{ $options['lng'] }}, {{ $options['lat'] }}];
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/{{ $options['templateType'] }}-v9',
    center: monument,
    zoom: {{ $options['zoom'] }},
height: 800,
});

map.scrollZoom.disable();
map.addControl(new mapboxgl.NavigationControl());

var locations = [
    @foreach($markerList as $row)
    @php
    $lat = !empty($row->lat) ? $row->lat : $defaultMarkerCoordinates['lat'];
$lng = !empty($row->lng) ? $row->lng : $defaultMarkerCoordinates['lng'];
$title = '<center>'.$row->title.'</center>';
$markerID = $row->id;
$desc = '<p>'.preg_replace('~[\r\n]+~', '', nl2br($row->desc)).'</p>';
@endphp
    ['{!! $title !!}', "{!! $desc !!}",{{ $lat }},{{ $lng }},{{ $markerID }}, '{{ strip_tags($title) }}'],
@endforeach
];

for (i = 0; i < locations.length; i++) {
    // create the popup
    var popup = new mapboxgl.Popup({ offset: 30 })
        .setHTML(locations[i][0] + '\n' + locations[i][1]);
    var lat = locations[i][2];
    var lng = locations[i][3];

    var el = changeMarker();
    var markerCoord = [lng, lat];
    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat(markerCoord)
        // .setPopup(popup) // sets a popup on this marker
        .addTo(map);
}

function changeMarker()
{
    var el = document.createElement('div');
    el.id = 'marker';
    el.style.backgroundImage = 'url({{ statimg('marker.png') }})';
    el.style.width = '43px';
    el.style.height = '60px';
    return el;
}
