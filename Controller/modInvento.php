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
    if(isset($_FILES["txtImagen"])){
      $imagen =  $_FILES["txtImagen"];
      $imagenN = $_FILES["txtImagen"]["name"];
      $ext = pathinfo($_FILES["txtImagen"]["name"], PATHINFO_EXTENSION);
      $validas = array('jpg','png','gif','jpeg');

      if ($_POST['txtNombre'] === " " || $_POST["txtAutor"] === " " || $_POST["txtFecha"] === " " || empty($imagenN) || $_POST["txtDescripcion"] == " "){
        echo "<script> swal({title: 'Error!!', text: 'Debe rellenar todos los campos y seleccionar una imagen.', confirmButtonText: 'Continuar'}, function(){window.location = '../index.php';});</script>";
      }elseif(!in_array($ext,$validas) || $imagen['size'] > 1048576 ){
        echo "<script> swal({title: 'Error!!', text: 'El archivo seleccionado no es valido, verifique que sea [gif, png o jpg] y que sea menor a 1Mb', confirmButtonText: 'Continuar'},function(){window.location = '../index.php';});</script>";
      }else{
        move_uploaded_file($_FILES["txtImagen"]["tmp_name"], "../View/images/" .$_FILES["txtImagen"]["name"]);
        $invento = new Invento($_POST['txtId'],$_POST['txtNombre'],$_POST['txtAutor'],$_POST['txtFecha'],$imagen['name'],$_POST['txtDescripcion']);
        $invento-> modificar();
        echo "<script> swal({title: 'Bien!!', text: 'Se han realizado los cambios correctamente', confirmButtonText: 'Continuar'},
        function(){window.location = '../index.php';});</script>";
      }
    }else{
      if ($_POST['txtNombre'] === " " || $_POST["txtAutor"] === " " || $_POST["txtFecha"] === " " || $_POST["txtImagen"] === " " || $_POST["txtDescripcion"] == " "){
        echo "<script> swal({title: 'Error!!', text: 'Debe rellenar todos los campos vacios.', confirmButtonText: 'Continuar'}, function(){window.location = '../index.php';});</script>";
      }else{
        $invento = new Invento($_POST['txtId'],$_POST['txtNombre'],$_POST['txtAutor'],$_POST['txtFecha'],$_POST["txtImagen"],$_POST['txtDescripcion']);
        $invento-> modificar();
        echo "<script> swal({title: 'Bien!!', text: 'Se han realizado los cambios correctamente', confirmButtonText: 'Continuar'},
        function(){window.location = '../index.php';});</script>";
      }
    }
    ?>
  </body>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
</html>
