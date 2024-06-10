@extends('layouts.template')

@section('styles')

    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }

        #map {
            height: calc(100vh - 56px);
            width: 100%
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <div id="map" style="width: 100vw; height: 100vh; margin: 0"></div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://unpkg.com/terraformer@1.0.7/terraformer.js"></script>
    <script src="https://unpkg.com/terraformer-wkt-parser@1.1.2/terraformer-wkt-parser.js"></script>
    <script>
        // Map
        var map = L.map('map').setView([-7.7956, 110.3695], 13);

        //Basemap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);



        /* GeoJSON Point */
        var point = L.geoJson(null, {
    onEachFeature: function (feature, layer) {
        var popupContent = "Name: " + feature.properties.name + "<br>" +
            "Description: " + feature.properties.description + "<br>" +
            "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
            "' class='img-thumbnail' alt='...'>"


            ;



        layer.on({
            click: function (e) {
                layer.bindPopup(popupContent).openPopup();
            },
            mouseover: function (e) {
                layer.bindTooltip(feature.properties.kab_kota).openTooltip();
            },
        });
    },
});

                    $.getJSON("{{ route('api.points')}}", function (data) {
                        point.addData(data);
                        map.addLayer(point);
                    });


        /* GeoJSON Polyline */
        var polyline = L.geoJson(null, {
    onEachFeature: function (feature, layer) {
        var popupContent = "Name: " + feature.properties.name + "<br>" +
            "Description: " + feature.properties.description + "<br>" +
            "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
            "' class='img-thumbnail' alt='...'>"

            ;
                layer.on({
                    click: function(e) {
                        polyline.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polyline.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polylines') }}", function(data) {
            polyline.addData(data);
            map.addLayer(polyline);
        });

        /* GeoJSON polygon */
        var polygon = L.geoJson(null, {
    onEachFeature: function (feature, layer) {
        var popupContent = "Name: " + feature.properties.name + "<br>" +
            "Description: " + feature.properties.description + "<br>" +
            "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
            "' class='img-thumbnail' alt='...'>"

            ;

                layer.on({
                    click: function(e) {
                        polygon.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polygon.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polygons') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });
    // layer control
var overlayMaps = {
    "Point": point,
    "Polyline": line,
    "Polygon": polygon
};

var layerControl = L.control.layers(null, overlayMaps).addTo(map);
</script>
@endsection
