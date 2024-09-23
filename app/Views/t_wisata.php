<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Lokasi Wisata</title>
    <style>
        .containerbutton {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60px;
        }
        #mapid {
            height: 400px;
            width: 100%;
            margin-top: 20px;
        }
        .input-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        .input-group input {
            width: 48%;
        }
        .marker {
            background-image: url(<?=base_url('images/location.png')?>);
            background-size: cover;
            width: 32px;
            height: 32px;
        }
    </style>
</head>
<body>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form class="mt-4" method="POST" action="<?=base_url('home/aksi_twisata')?>">
                            <div class="form-group">
                                <h5 class="card-title text text-danger">Nama Tempat</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nama_wisata" placeholder="Nama Tempat Wisata">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="card-title text text-danger">Koordinat (Latitude dan Longitude)</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude">
                                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude">
                                </div>
                            </div>

                            <div id="mapid"></div>

                            <div class="containerbutton">
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/ol@6.14.1/dist/ol.js"></script>
<script>
    // Koordinat Batam
    var batamCenter = ol.proj.fromLonLat([104.027, 1.048]);

    // Inisialisasi peta dengan tampilan default di tengah Batam
    var map = new ol.Map({
        target: 'mapid',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
        ],
        view: new ol.View({
            center: batamCenter, // Lokasi default: Batam
            zoom: 13
        })
    });

    var markerOverlay;

    // Fungsi untuk menambahkan marker pada peta
    function addMarker(lon, lat) {
        // Jika marker sudah ada, hapus dulu
        if (markerOverlay) {
            map.removeOverlay(markerOverlay);
        }

        // Buat marker baru dengan gambar
        var markerElement = document.createElement('div');
        markerElement.className = 'marker';

        markerOverlay = new ol.Overlay({
            position: ol.proj.fromLonLat([lon, lat]),
            positioning: 'center-center',
            element: markerElement,
            stopEvent: false
        });

        map.addOverlay(markerOverlay);
    }

    // Saat peta diklik, ambil koordinat dan tampilkan di form serta tambahkan marker
    map.on('click', function(evt) {
        var coord = ol.proj.toLonLat(evt.coordinate);
        var lon = coord[0].toFixed(6);
        var lat = coord[1].toFixed(6);

        // Masukkan koordinat ke dalam form input
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lon;

        // Tambahkan marker di lokasi yang diklik
        addMarker(lon, lat);
    });

    // Fungsi untuk memindahkan peta ke koordinat berdasarkan input form
    function goToLocation() {
        var lat = parseFloat(document.getElementById('latitude').value);
        var lon = parseFloat(document.getElementById('longitude').value);

        if (!isNaN(lat) && !isNaN(lon)) {
            var location = ol.proj.fromLonLat([lon, lat]);
            map.getView().setCenter(location);
            map.getView().setZoom(15);

            // Tambahkan marker di lokasi yang dipilih
            addMarker(lon, lat);
        } else {
            alert("Masukkan koordinat yang valid.");
        }
    }

    // Saat form latitude atau longitude berubah, pindahkan peta ke lokasi tersebut
    document.getElementById('latitude').addEventListener('change', goToLocation);
    document.getElementById('longitude').addEventListener('change', goToLocation);
</script>

</body>
</html>
