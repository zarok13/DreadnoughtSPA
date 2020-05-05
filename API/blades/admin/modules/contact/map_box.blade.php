<div id="map" class="map"></div>
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiemFyb2siLCJhIjoiY2s4Njl5eHpxMDA3dTNubGs5ZDh6ZjJyciJ9.9KM0OsYdbSC3KzlF2tjUEw';
    var monument = [{{ $options['lng'] }}, {{ $options['lat'] }}];
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/{{ $options['templateType'] }}-v9',
        center: monument,
        zoom: {{ $options['zoom'] }},
    });


    var locations = [
            @foreach($markerList as $row)
            @php
                $lat = !empty($row->lat) ? $row->lat : $defaultMarkerCoordinates['lat'];
                $lng = !empty($row->lng) ? $row->lng : $defaultMarkerCoordinates['lng'];
                $title = $row->title;
                $markerID = $row->id;
            @endphp
        ['{{ $title }}',{{ $lat }},{{ $lng }},{{ $markerID }}],
        @endforeach
    ];

    for (i = 0; i < locations.length; i++) {
        var markerCoord = [locations[i][2], locations[i][1]];
        var marker = new mapboxgl.Marker({
            draggable: true
        }).setLngLat(markerCoord).addTo(map);

        /* listeners */
        dragListener(marker, i, locations[i]);

    }
    zoomListener(map);
    mapDragEndListener(map);
    /* change map type */
    $(document).ready(function () {
        $("#template_type").change(function () {
            var template_type = $("#template_type option:selected").val();
            switchLayer(template_type);
        });
    });


    function switchLayer(template_type) {
        map.setStyle('mapbox://styles/mapbox/' + template_type + '-v9');
    }

    function dragListener(marker, i, item) {
        marker.on('dragend', function () {
            let lat = marker.getLngLat().lat;
            let lng = marker.getLngLat().lng;
            let markerID = item[3];
            document.getElementById('lat_' + markerID).value = lat;
            document.getElementById('lng_' + markerID).value = lng;
            document.getElementById("marker"+markerID).setAttribute("data-lat",lat);
            document.getElementById("marker"+markerID).setAttribute("data-lng",lng);
        });
    }

    function zoomListener(map) {
        map.on('zoom', function () {
            document.getElementById('default_zoom').value = map.getZoom();
        });
    }

    function mapDragEndListener(map) {
        map.on('dragend', function () {
            document.getElementById('default_lat').value = map.getCenter().lat;
            document.getElementById('default_lng').value = map.getCenter().lng;
        });
    }
</script>


{!! Form::open(['id' => 'data_coordinates','files' => true]) !!}
@foreach($markerList as $row)
    <input type="hidden" name="coordinates[{{ $row->id }}][lat]" id="lat_{{ $row->id }}" value="{{ $row->lat }}">
    <input type="hidden" name="coordinates[{{ $row->id }}][lng]" id="lng_{{ $row->id }}" value="{{ $row->lng }}">
@endforeach
<input type="hidden" name="lat" id="default_lat" value="{{ $options['lat'] }}">
<input type="hidden" name="lng" id="default_lng" value="{{ $options['lng'] }}">
<input type="hidden" name="zoom" id="default_zoom" value="{{ $options['zoom'] }}">
{!! Form::close() !!}
