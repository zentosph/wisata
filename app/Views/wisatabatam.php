<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Wisata</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>

        #mapid {
            height: 100vh;
            width: 100%;
            /* position: relative; */
        }
        .search-container {
    position: absolute;
    top: 100px;
    left: 60%;
    transform: translateX(-50%);
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: 10px;  
    width: auto;
    max-width: 600px;
    z-index: 1;
    opacity: 0.7;
}
        .search-container label {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }
        .search-container input {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            font-size: 14px;
            flex-grow: 1;
            outline: none;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        }
        .search-container input:focus {
            border-color: #007bff;
        }
        .search-container button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .search-container button:hover {
            background-color: #0056b3;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .voice-input-button {
            background-color: #28a745;
            border: none;
            color: white;
            padding: 10px 15px;
            text-align: center;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .voice-input-button:hover {
            background-color: #218838;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .marker {
            background-image: url(<?=base_url('images/location.png')?>);
            background-size: cover;
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }
        .page-wrapper {
    height: 100%;
    width: 100%;
    overflow: hidden; /* Pastikan tidak ada scroll yang muncul */
}
.cih {
    display: flex;
    margin-left: 260px;
    height: 100vh; /* Mengatur tinggi elemen menjadi 100% dari tinggi viewport */
    width: 82%; /* Mengatur lebar elemen menjadi 100% dari lebar kontainer parent */
    justify-content: center;
}
    </style>
</head>
<body>
<div class="cih">
    <div class="container-fluid">

        <div id="mapid"></div>

        <div class="search-container">
        <form id="searchForm">
            <label for="search">Nama Wisata:</label>
            <input type="text" id="search" placeholder="Masukkan nama tempat wisata" name="wisata" value="<?=$wisata->nama_objek?>" disabled/>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/ol@6.14.1/dist/ol.js"></script>
        <script>
        // Default coordinates for the tourist spot (from $wisata)
        var defaultLatitude = <?= json_encode($wisata->latitude) ?>;
        var defaultLongitude = <?= json_encode($wisata->longitude) ?>;

        // Initialize the map
        var map = new ol.Map({
            target: 'mapid',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM() // OpenStreetMap base layer
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([defaultLongitude, defaultLatitude]),
                zoom: 10 // Set a more appropriate default zoom level
            })
        });

        var userMarker, locationMarker;
        var markers = []; // Array to store marker coordinates

        function addMarkerAndRoute(lng, lat, placeName) {
            var location = ol.proj.fromLonLat([lng, lat]);
            markers = [window.userLocation, [lng, lat]]; // Store marker coordinates

            // Remove previous location marker if it exists
            if (locationMarker) {
                map.removeOverlay(locationMarker);
            }

            // Add location marker
            locationMarker = new ol.Overlay({
                position: location,
                positioning: 'center-center',
                element: document.createElement('div'),
                stopEvent: false
            });
            locationMarker.getElement().className = 'marker';
            map.addOverlay(locationMarker);

            // Calculate and add route if user location is available
            if (window.userLocation) {
                var start = window.userLocation.join(',');
                var end = [lng, lat].join(',');
                var apiKey = '5b3ce3597851110001cf62488c2d7298c599422c99945d956a9f741a';

                fetch(`https://api.openrouteservice.org/v2/directions/driving-car?api_key=${apiKey}&start=${start}&end=${end}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.features && data.features.length > 0) {
                            var route = data.features[0].geometry.coordinates;
                            var routeCoords = route.map(coord => ol.proj.fromLonLat([coord[0], coord[1]]));

                            var routeFeature = new ol.Feature({
                                geometry: new ol.geom.LineString(routeCoords)
                            });

                            var routeLayer = new ol.layer.Vector({
                                source: new ol.source.Vector({
                                    features: [routeFeature]
                                }),
                                style: new ol.style.Style({
                                    stroke: new ol.style.Stroke({
                                        color: '#0000FF',
                                        width: 4
                                    })
                                })
                            });

                            var existingRouteLayer = map.getLayers().getArray().find(layer => layer instanceof ol.layer.Vector && layer.getSource().getFeatures().length > 0);
                            if (existingRouteLayer) {
                                map.removeLayer(existingRouteLayer);
                            }

                            map.addLayer(routeLayer);
                        } else {
                            console.error("No route found in the API response.");
                        }
                    })
                    .catch(error => console.error('Error fetching route:', error));
            }

            if (markers.length > 0) {
                var extent = ol.extent.boundingExtent(markers.map(coord => ol.proj.fromLonLat(coord)));
                console.log("Extent:", extent); // Debugging output
                map.getView().fit(extent, { padding: [50, 50, 50, 50], duration: 500 });
            }
        }

        function requestLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    console.log("User Location:", lat, lng); // Debugging output
                    var userLocation = ol.proj.fromLonLat([lng, lat]);

                    // Center map on user's location
                    map.getView().setCenter(userLocation);
                    map.getView().setZoom(10);

                    if (userMarker) {
                        map.removeOverlay(userMarker);
                    }

                    // Add user marker
                    userMarker = new ol.Overlay({
                        position: userLocation,
                        positioning: 'center-center',
                        element: document.createElement('div'),
                        stopEvent: false
                    });
                    userMarker.getElement().className = 'marker';
                    map.addOverlay(userMarker);

                    window.userLocation = [lng, lat]; // Store user's location in global variable

                    // Add marker and route to the tourist spot
                    addMarkerAndRoute(defaultLongitude, defaultLatitude, "Wisata");
                }, function(error) {
                    console.error("Error getting location: " + error.message);
                    addMarkerAndRoute(defaultLongitude, defaultLatitude, "Wisata");
                });
            } else {
                alert("Geolocation is not supported by this browser.");
                addMarkerAndRoute(defaultLongitude, defaultLatitude, "Wisata");
            }
        }

        // Request location when the page loads
        window.onload = requestLocation;

        // Handle search form submission
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var query = document.getElementById('search').value;

            fetch(`/search?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    if (data && data.latitude && data.longitude) {
                        addMarkerAndRoute(data.longitude, data.latitude, query);
                    } else {
                        alert("Tempat wisata tidak ditemukan.");
                    }
                })
                .catch(error => console.error('Error fetching search results:', error));
        });
        window.onload = requestLocation;
        </script>
    </div>
</div>
</body>
</html>
