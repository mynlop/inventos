<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventos</title>
    <style media="screen">
      body{background-color: #ececec !important; }
      nav{background-color: #006680 !important; color: #eee !important;}
      #menu ul li a{color:#eee !important; cursor: pointer;}
      #menu ul li:hover {background-color: #000 !important; opacity: 0.2; color: #eee;}
      body{padding-right: 0px;}
    </style>
  </head>
  <body>
<?php
  include_once 'Model/Invento.php';
  include 'View/home.php';
 //  $data['inventos'] = Invento::getInventos();
//lista de inventos;
  include 'View/allInventos.php';
?>
  </body>
</html>
