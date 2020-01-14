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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">
        <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
        <link rel="stylesheet" href="<?=base_url()?>assets/css/leaflet-search.css" />
        <script src="<?=base_url()?>assets/js/leaflet-search.js"></script>
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
                <a href="<?=base_url()?>index.php/Login"> Login</a>
            </div>
        </main>
        <!-- <script src="<?=base_url()?>assets/js/offcanvas.js"></script> -->
        <script type="text/javascript">
            // Leaflet
            //Add the streetmaps base layers
            var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

            var satellite = L.tileLayer(mbUrl, {
                    id: 'mapbox/satellite-v9',
                    attribution: mbAttr
                }),
                streets = L.tileLayer(mbUrl, {
                    id: 'mapbox/streets-v11', 
                    attribution: mbAttr
                });

            //Create base maps for using satellite and streets tile layers for the base layers
            var map = L.map('mapid', {
                center: [0.5090506, 101.4449926],
                zoom: 15,
                layers: [streets, satellite]
            });

            //Create group layer for the polygon
            var futsalFeatureGroup = L.layerGroup().addTo(map).on("click", groupClick);
            var futsalPolygon;
            var futsal_id;

            var futsalIcon = L.icon({
                iconUrl: '<?=base_url()?>assets/images/futsalIcon.png',

                iconSize:     [38, 95], // size of the icon
                shadowSize:   [50, 64], // size of the shadow
                iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                shadowAnchor: [4, 62],  // the same for the shadow
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

            //Add dictionary to store all the location and futsal court name
            var futsal_data = [];
            var geojsonFeature = [];

            //Function to get the polygon id from the event click
            function groupClick(event) {
                futsal_id = "Futsal " + event.layer.id;
            }

            var markerLayer = new L.LayerGroup();
            map.addLayer(markerLayer);

            var controlSearch = new L.Control.Search({
                position:'topleft',		
                layer: markerLayer,
                initial: false,
                zoom: 20,
                marker: false
            });
                   
            // Using ajax to get the data from the db
            $.getJSON("<?=base_url()?>index.php/Home/futsal_json", function(result) {
                $.each(result, function(i, field) {
                    futsal_data.push({
                        "loc" : [result[i].g001, result[i].g000],
                        "title" : result[i].Nama
                    });
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
                for (i in futsal_data){
                    var title = futsal_data[i].title,	//value searched
                        loc = futsal_data[i].loc,		//position found
                        marker = new L.Marker(new L.latLng(loc), {title: title} ).addTo(futsalFeatureGroup);//se property searched                    
                    markerLayer.addLayer(marker);                      
                }

                map.addControl( controlSearch );
            });

            var baseLayers = {
                "Satellite": satellite,
                "Streets": streets
            };

            var overlays = {
                "Futsal": futsalFeatureGroup
            };

            L.control.layers(baseLayers, overlays).addTo(map);            

        </script>
    </body>
</html> 