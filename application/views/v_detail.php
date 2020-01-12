<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DETAIL</title>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
</head>
<style>
    #judul{
        font-family: 'Open Sans', sans-serif;
        font-size: 32px;
        font-weight: 300;
        line-height: 1.6;
    }
    
    #mapid{
        height: 550px;
    }
    img{
        object-fit: cover;
        height: -webkit-fill-available;
        width: -webkit-fill-available;
    }
    #top_content{
        height: 550px;
    }
</style>
<body>
    <Center><Strong><h1 id="judul"><?=$nama?></h1></Strong></Center>
    <div id="top_content"> 
        <div id="left_c" style="width:50%; float:left;">
            <div id="mapid"></div>
        </div>
        <div id="right_c" style="width:50%; float:right;">
            <?=$foto?>
        </div>
    </div>
    <h2>Alamat : <?=$alamat?></h2>
    <h2>Harga sewa lapangan : <?=$harga?>/Jam</h2>
    <h2>Jumlah lapangan : <?=$jlh_lapangan?></h2>
    <h2>No Hp : <?=$no_hp?></h2>

    <script type="text/javascript">
        // Leaflet
        //zoom into the polygon position
        var map = L.map('mapid').setView([<?=$g001?>,<?=$g000?>], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var latlngs = [
                        [
                            [parseFloat(<?=$g001?>), parseFloat(<?=$g000?>)],
                            [parseFloat(<?=$g011?>), parseFloat(<?=$g010?>)],
                            [parseFloat(<?=$g021?>), parseFloat(<?=$g020?>)],
                            [parseFloat(<?=$g031?>), parseFloat(<?=$g030?>)],
                            [parseFloat(<?=$g041?>), parseFloat(<?=$g040?>)]
                        ]
                    ]
        futsalPolygon = L.polygon(latlngs).addTo(map)
                       .bindPopup("<strong><center><?=$nama?></center></strong>")
                       .openPopup();
        futsalPolygon.id = result[i].Futsal_id;
    </script>
</body>
</html>