<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>FUTSAL COURT FINDER</title>
        <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="<?=base_url()?>assets/css/offcanvas.min.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">
        <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/leaflet-search@2.3.7/dist/leaflet-search.src.css" />
        <script src="https://unpkg.com/leaflet-search@2.3.7/dist/leaflet-search.src.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <style>
            html {
                box-sizing: border-box;
            }
            
            body {
                @include offcanvas-push-left;
                font-family: 'Open Sans', sans-serif;
                font-size: 16px;
                font-weight: 300;
                line-height: 1.6;
                overflow: hidden;
                min-height: 100vh;
            }
            
            .container {
                max-width: 100%;
                margin: auto;
                padding: 20px;
                min-height: 100vh;
            }
            
            #mapid {
                height: 650px;
            }
            
            #footer {
                margin height: 150px;
                background: black;
            }
        </style>
    </head>

    <body>
        <main id="page-wrap">
            <div class="container">
                <center>
                    <h1>FUTSAL COURT FINDER</h1></center>
                <!-- Content -->
                <div id="mapid"></div>
                <div id="footer"></div>
                <!-- End Content -->

            </div>
        </main>
        <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script> -->
        <!-- <script src="<?=base_url()?>assets/js/offcanvas.js"></script> -->
        <script type="text/javascript">
            // Leaflet
            //Add the streetmaps base layers
            var streets = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                id: 'MapID',
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>'
            });

            var map = L.map('mapid').setView([0.5090506, 101.4449926], 13.5);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            //Create group layer for the polygon
            var futsalFeatureGroup = L.layerGroup().addTo(map).on("click", groupClick);
            var futsalPolygon;
            var futsal_id;
            // var controlSearch = new L.control.search({layer: futsalFeatureGroup, initial: false, position:'topright'});
            // map.addControl( controlSearch );
            // $('#textsearch').on('keyup', function(e) {
            //     controlSearch.searchText( e.target.value );
            // })

            //Function to get the polygon id from the event click
            function groupClick(event) {
                futsal_id = "Futsal " + event.layer.id;
            }

            var baseLayers = {
                "Streets": streets
            };

            var overlays = {
                "Futsal": futsalFeatureGroup
            };

            L.control.layers(baseLayers, overlays).addTo(map);

            var controlSearch = new L.Control.Search({layer: futsalFeatureGroup, initial: false, position:'topleft'});

	        map.addControl( controlSearch );

            // Using ajax to get the data from the db
            $.getJSON("<?=base_url()?>index.php/Home/futsal_json", function(result) {
                $.each(result, function(i, field) {
                    // alert(result[i].Nama);
                    var latlngs = [
                        [
                            [parseFloat(result[i].g001), parseFloat(result[i].g000)],
                            [parseFloat(result[i].g011), parseFloat(result[i].g010)],
                            [parseFloat(result[i].g021), parseFloat(result[i].g020)],
                            [parseFloat(result[i].g031), parseFloat(result[i].g030)],
                            [parseFloat(result[i].g041), parseFloat(result[i].g040)]
                        ]
                    ]
                    futsalPolygon = L.polygon(latlngs).addTo(futsalFeatureGroup)
                        .bindPopup("<center><strong>Futsal Court Info</strong></center><hr>" + result[i].Foto + "<center><strong>" + result[i].Nama + "</strong></center><i class='fa fa-map-marker'></i>" + result[i].alamat + "<br><a href='<?=base_url()?>index.php/Home/detail/" + result[i].Futsal_id + "'>Detail</a>");
                    futsalPolygon.id = result[i].Futsal_id;
                });
            });
        </script>
    </body>

    </html>