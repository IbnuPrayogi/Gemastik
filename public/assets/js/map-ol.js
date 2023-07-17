export default function mapping(){
    var map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([0, 0]),
            zoom: 2
        })
    });

    // Add a marker when the user clicks on the map
    map.on('click', function(event) {
        var coordinate = event.coordinate;
        var marker = new ol.Feature({
            geometry: new ol.geom.Point(coordinate)
        });
        var vectorSource = new ol.source.Vector({
            features: [marker]
        });
        var vectorLayer = new ol.layer.Vector({
            source: vectorSource
        });
        map.addLayer(vectorLayer);
        
        // Save the coordinates to the server
        var latitude = coordinate[1];
        var longitude = coordinate[0];
        saveCoordinates(latitude, longitude);
    });

    // Function to save the coordinates to the server
    function saveCoordinates(latitude, longitude) {
        console.log('Saving coordinates:', latitude, longitude);
        document.getElementById("latitude").innerHTML = latitude;
        document.getElementById("longitude").innerHTML = longitude;
    //     fetch('/save-coordinates', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //         },
    //         body: JSON.stringify({
    //             latitude: latitude,
    //             longitude: longitude
    //         })
    //     })
    //     .then(function(response) {
    //         if (response.ok) {
    //             console.log('Coordinates saved successfully.');
    //         } else {
    //             console.log('Failed to save coordinates.');
    //         }
    //     })
    //     .catch(function(error) {
    //         console.log('An error occurred while saving coordinates:', error);
    //     });
    }   
}