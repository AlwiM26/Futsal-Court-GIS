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
        #judul {
            font-family: 'Open Sans', sans-serif;
            font-size: 32px;
            font-weight: 300;
            line-height: 1.6;
        }
        
        #mapid {
            height: 550px;
        }
        
        img {
            object-fit: cover;
            height: -webkit-fill-available;
            width: 100%;
        }
        
        #top_content {
            height: 550px;
            margin-top: 20px;
        }
        
        #back_button {
            height: 70px;
            width: 70px;
            position: absolute;
        }
        td{
            font-size: 30px;
        }
        table{
            margin: 18px 0 0 18px;
        }
    </style>

    <body>
        <a href="<?=base_url()?>index.php/Detail/back_home"><img src="<?=base_url()?>assets/images/back.png" id="back_button"></a>
        <Center>
            <Strong><h1 id="judul"><?=$nama?></h1></Strong>
        </Center>
        <div id="top_content">
            <div id="left_c" style="width:50%; float:left;">
                <div id="mapid"></div>
            </div>
            <div id="right_c" style="width:50%; float:right;">
                <?=$foto?>
            </div>
        </div>
        <table>
            <tr>
                <td>Address</td>
                <td> : </td>
                <td> <?=$alamat?> </td>
            </tr>
            <tr>
                <td>Price</td>
                <td> : </td>
                <td> <?=$harga?> / hour </td>
            </tr>
            <tr>
                <td>Field</td>
                <td> : </td>
                <td> <?=$jlh_lapangan?> </td>
            </tr>
            <tr>
                <td>Address</td>
                <td> : </td>
                <td> <?=$no_hp?> </td>
            </tr>
        </table>
        
        <script type="text/javascript">
            // Leaflet
            //zoom into the polygon position
            var map = L.map('mapid').setView([<?=$g001?>, <?=$g000?>], 17);

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