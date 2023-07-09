@extends('layouts.app')

@section('title', 'Map Berdasarkan Status')
@section('css')
    
    <style>
        #container{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #map {
            width: 90%;
            height: 800px;
        }
        .ol-popup {
            position: absolute;
            background-color: white;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #cccccc;
            bottom: 12px;
            left: -50px;
            min-width: 200px;
        }

        .ol-popup:after,
        .ol-popup:before {
            top: 100%;
            left: 24%;
            border: solid transparent;
            content: ' ';
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }

        .ol-popup:after {
            border-top-color: white;
            border-width: 10px;
            margin-left: -10px;
        }

        .ol-popup:before {
            border-top-color: #cccccc;
            border-width: 11px;
            margin-left: -11px;
        }
        .ol-popup-closer {
            text-decoration: none;
            position: absolute;
            top: 2px;
            right: 8px;
            cursor: pointer;
        }
        .ol-popup-closer:after {
            content: "✖";
        }
        .blacker{
            color: black !important;
        }
        @media screen and (min-width: 768px) {
            #map {
                width: 80%;
                height:400px !important;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('ol/ol.css') }}">
@endsection
@section('content')
    <div id="container">
        <div id="map"></div>
        <div id="popup" class="ol-popup">
            <a role="button" id="popup-closer" class="ol-popup-closer" onclick="closePopup()"></a>
            <div id="popup-content"></div>
        </div>
    </div>
    @php
        $roles = Auth::user()->id_roles;
    @endphp
    <script src="{{ asset('ol/dist/ol.js') }}"></script>
    <script>
        // JSON data with point coordinates
        var jsonData = {!! $jsonData !!};
        var roles = {!! $roles !!};
            // Initialize the map and geolocation
            var map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                source: new ol.source.OSM(),
                }),
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([113.9213, -4.8893]), // Initial map center
                zoom: 6, // Initial zoom level
            }),
        });
        
        var geolocation = new ol.Geolocation({
            trackingOptions: {
                enableHighAccuracy: true,
            },
            projection: map.getView().getProjection(),
        });
        
        // Create a vector layer to display the points and user location
        var vectorLayer = new ol.layer.Vector({
            source: new ol.source.Vector({
                features: [],
            }),
            style: new ol.style.Style({
                image: new ol.style.Icon({
                    anchor: [0.5, 1],
                    src: '{{ URL::asset('/assets/icons/pin.png') }}', // Replace with your custom pin icon image path
                    scale: 0.08,
                }),
                text: new ol.style.Text({
                    text: '',
                    font: '12px sans-serif',
                    offsetX: 0,
                    offsetY: -20,
                    fill: new ol.style.Fill({ color: '#000000' }),
                    stroke: new ol.style.Stroke({ color: '#FFFFFF', width: 2 }),
                }),
            }),
        });
        var vectorLayerGrey = new ol.layer.Vector({
            source: new ol.source.Vector({
                features: [],
            }),
            style: new ol.style.Style({
                image: new ol.style.Icon({
                    anchor: [0.5, 1],
                    src: '{{ URL::asset('/assets/icons/grey-pin.png') }}', // Replace with your custom pin icon image path
                    scale: 0.08,
                }),
                text: new ol.style.Text({
                    text: '',
                    font: '12px sans-serif',
                    offsetX: 0,
                    offsetY: -20,
                    fill: new ol.style.Fill({ color: '#000000' }),
                    stroke: new ol.style.Stroke({ color: '#FFFFFF', width: 2 }),
                }),
            }),
        });
        
        // Add the vector layer to the map
        map.addLayer(vectorLayer);
        map.addLayer(vectorLayerGrey);

        function openPopup(coordinates, latitude, longitude, name, description, links, status) {
            var popupContent = document.getElementById('popup-content');
            popupContent.innerHTML = '<h4 class="blacker">' + name + '</h4>'
            if(roles == 11){
                popupContent.innerHTML += '<a class="text-primary text-decoration-none" href="/admin' + links + '" target="_blank">Cek Laporan</a>';
            }else if(roles == 99){
                popupContent.innerHTML += '<a class="text-primary text-decoration-none" href="/client' + links + '" target="_blank">Cek Laporan</a>';
            }
            if(status == 1){
                popupContent.innerHTML += '<p class="blacker my-0">  status : Belum Diperbaiki</p>'
            }else if(status == 2){
                popupContent.innerHTML += '<p class="blacker my-0">  status : Proses Perbaikan</p>'
            }else if(status == 3){
                popupContent.innerHTML += '<p class="blacker my-0">  status : Sudah Diperbaiki</p>'
            }
            popupContent.innerHTML += '<p class="blacker my-0">  latitude : ' + latitude.substring(0,7) + '...</p>'
            popupContent.innerHTML += '<p class="blacker my-0">  longitude : ' + longitude.substring(0,7) + '...</p>'

            popupOverlay.setPosition(coordinates);
        }
        
        // Function to close the popup
        function closePopup() {
            popupOverlay.setPosition(undefined);
        }
        
        map.on('click', function (event) {
            map.forEachFeatureAtPixel(event.pixel, function (feature) {
                var coordinates = feature.getGeometry().getCoordinates();
                var latitude = feature.get('latitude');
                var longitude = feature.get('longitude');
                var name = feature.get('name');
                var description = feature.get('description');
                var links = feature.get('links');
                var status = feature.get('status');

                openPopup(coordinates, latitude, longitude, name, description, links, status);
            });
        });

        // Handle close event of the popup
        document.getElementById('popup-closer').onclick = function () {
            closePopup();
            return false;
        };

        jsonData.features.forEach(function(point) {
            var marker = new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.fromLonLat(point.geometry.coordinates)),
                latitude: point.geometry.coordinates[0],
                longitude: point.geometry.coordinates[1],
                name: point.properties.name,
                description: point.properties.description,
                links: point.properties.links,
                status: point.properties.status,
            });
            if (point.properties.status == 1){
                vectorLayer.getSource().addFeature(marker);
            }else{
                vectorLayerGrey.getSource().addFeature(marker);
            }
        });

        var popupOverlay = new ol.Overlay({
            element: document.getElementById('popup'),
            positioning: 'bottom-center',
            offset: [0, -10],
            stopEvent: false,
        });

        map.addOverlay(popupOverlay);
        
        // Create and add points to the vector layer from the JSON data
        // jsonData.forEach(function(point) {
        //     var marker = new ol.Feature({
        //         geometry: new ol.geom.Point(ol.proj.fromLonLat([point.lon, point.lat])),
        //         name: 'Point ' + point.id,
        //     });
    
        // vectorLayer.getSource().addFeature(marker);
        // });
    
        // Track user's location
        // geolocation.on('change:position', function() {
        //     var coordinates = geolocation.getPosition();
        //     var accuracy = geolocation.getAccuracy();
        
        //     // Clear previous user location feature
        //     vectorLayer.getSource().clear();
        
            // Create a new feature for the user's location
            // var userMarker = new ol.Feature({
            //     geometry: new ol.geom.Point(coordinates),
            //     name: 'Your Location',
            // });
        
            // vectorLayer.getSource().addFeature(userMarker);
        
            // Update the HTML element with the coordinates 
        //     document.getElementById('coordinates').innerHTML =
        //     'Latitude: ' +
        //     coordinates[1].toFixed(6) +
        //     ', Longitude: ' +
        //     coordinates[0].toFixed(6) +
        //     ' (Accuracy: ' +
        //     accuracy.toFixed(2) +
        //     ' meters)';
        // });
      
        // Start tracking the user's location
        // geolocation.setTracking(true);
      </script>
@endsection