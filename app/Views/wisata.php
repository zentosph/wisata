<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Wisata</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
        }
        #mapid {
            height: 100vh;
            width: 100%;
            position: relative;
        }
        .search-container {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
            width: 80%;
            max-width: 600px;
            z-index: 1;
            margin-top: 100px;
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
    </style>
</head>
<body>
<div class="page-wrapper">
<div class="container-fluid">
    <div id="mapid"></div>
    <div class="search-container">
        <form id="searchForm">
            <label for="search">Cari Wisata:</label>
            <input type="text" id="search" placeholder="Masukkan nama tempat wisata" name="wisata"/>
        </form>
        <button class="voice-input-button" id="voiceSearch"><i class="fas fa-microphone"></i></button>
    </div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/ol@6.14.1/dist/ol.js"></script>
    <script>
        var map = new ol.Map({
            target: 'mapid',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM() // OpenStreetMap base layer
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([104.1978000, 0.8275000]), // Default coordinates
                zoom: 13
            })
        });

        var userMarker, locationMarker, routeLayer;
        var markers = []; // Array to store marker coordinates

        function addMarkerAndRoute(lng, lat, placeName) {
            var location = ol.proj.fromLonLat([lng, lat]);
            markers = [window.userLocation, [lng, lat]]; // Store marker coordinates

            map.getView().setCenter(location);
            map.getView().setZoom(14);

            if (locationMarker) {
                map.removeOverlay(locationMarker);
            }

            locationMarker = new ol.Overlay({
                position: location,
                positioning: 'center-center',
                element: document.createElement('div'),
                stopEvent: false
            });
            locationMarker.getElement().className = 'marker';
            map.addOverlay(locationMarker);

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
                map.getView().fit(extent, { padding: [50, 50, 50, 50], duration: 1000 });
            }
        }

        // Determine user's location automatically
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                var userLocation = ol.proj.fromLonLat([lng, lat]);

                map.getView().setCenter(userLocation); // Center map on user's location
                map.getView().setZoom(15); // Zoom in

                if (userMarker) {
                    map.removeOverlay(userMarker);
                }

                userMarker = new ol.Overlay({
                    position: userLocation,
                    positioning: 'center-center',
                    element: document.createElement('div'),
                    stopEvent: false
                });
                userMarker.getElement().className = 'marker';
                map.addOverlay(userMarker);

                window.userLocation = [lng, lat]; // Store user's location in global variable
            }, function(error) {
                console.error("Error getting location: " + error.message);
                // Use default location if geolocation fails
                var defaultLocation = ol.proj.fromLonLat([104.1978000, 0.8275000]); // Default location
                map.getView().setCenter(defaultLocation);
                map.getView().setZoom(13);
            });
        } else {
            alert("Geolocation is not supported by this browser.");
            // Use default location if geolocation is not supported
            var defaultLocation = ol.proj.fromLonLat([104.1978000, 0.8275000]);
            map.getView().setCenter(defaultLocation);
            map.getView().setZoom(13);
        }

        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var query = document.getElementById('search').value;

            fetch('<?=base_url('home/cariwisata')?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({ 'wisata': query })
            })
            .then(response => response.json())
            .then(data => {
                if (Array.isArray(data) && data.length > 0) {
                    var firstResult = data[0];
                    var lng = parseFloat(firstResult.longitude);
                    var lat = parseFloat(firstResult.latitude);
                    var placeName = firstResult.nama_objek;

                    if (!isNaN(lng) && !isNaN(lat)) {
                        addMarkerAndRoute(lng, lat, placeName);
                    } else {
                        alert("Invalid coordinates!");
                    }
                } else {
                    alert("Tourist spot not found!");
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                alert("An error occurred while searching for the tourist spot.");
            });
        });

        document.getElementById('voiceSearch').addEventListener('click', function() {
            var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
            recognition.lang = 'id-ID';
            recognition.start();

            recognition.onresult = function(event) {
                var result = event.results[0][0].transcript;
                document.getElementById('search').value = result;

                fetch('<?=base_url('home/cariwisata')?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({ 'wisata': result })
                })
                .then(response => response.json())
                .then(data => {
                    if (Array.isArray(data) && data.length > 0) {
                        var firstResult = data[0];
                        var lng = parseFloat(firstResult.longitude);
                        var lat = parseFloat(firstResult.latitude);
                        var placeName = firstResult.nama_objek;

                        if (!isNaN(lng) && !isNaN(lat)) {
                            addMarkerAndRoute(lng, lat, placeName);
                        } else {
                            alert("Koordinat tidak valid!");
                        }
                    } else {
                        alert("Tempat wisata tidak ditemukan!");
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    alert("Terjadi kesalahan saat mencari tempat wisata.");
                });
            };

            recognition.onerror = function(event) {
                console.error('Speech recognition error:', event.error);
            };
        });
    </script>
</body>
</html>
