<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invento Eliminado</title>
    <script src="../sweetalert.min.js"></script>
    <link rel="stylesheet" href="../sweetalert.css" media="screen">
  </head>
  <body>
    <?php
    require_once '../Model/Invento.php';

    $invento = new Invento($_GET['id'],null,null,null,null,null);
    $invento-> delete();
    echo "<script> swal({title: 'Bien!!', text: 'Se ha borrado correctamente', confirmButtonText: 'Continuar'},
          function(){window.location = '../index.php';});</script>";
    

    ?>
  </body>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
</html>
