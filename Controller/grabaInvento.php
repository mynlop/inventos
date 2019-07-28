<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invento guardado</title>
    <script src="../sweetalert.min.js"></script>
    <link rel="stylesheet" href="../sweetalert.css">
  </head>
  <body>
    <?php
    include_once '../Model/Invento.php';
    $ext = pathinfo($_FILES["txtImagen"]["name"], PATHINFO_EXTENSION);
    $validas = array('jpg','png','gif','jpeg');
    if ($_POST['txtNombre'] === " " || $_POST["txtAutor"] === " " || $_POST["txtFecha"] === " " || empty($_FILES["txtImagen"]["name"]) || $_POST["txtDescripcion"] == " "){
      echo "<script> swal({title: 'Error!!', text: 'Debe rellenar todos los campos y seleccionar una imagen.', confirmButtonText: 'Continuar'}, function(){window.location = '../index.php';});</script>";
    }elseif(!in_array($ext,$validas) || $_FILES['txtImagen']['size'] > 1048576 ){
      echo "<script> swal({title: 'Error!!', text: 'El archivo seleccionado no es valido, verifique que sea [gif, png o jpg] y que sea menor a 1Mb', confirmButtonText: 'Continuar'},function(){window.location = '../index.php';});</script>";
    }else{
    move_uploaded_file($_FILES["txtImagen"]["tmp_name"], "../View/images/" .$_FILES["txtImagen"]["name"]);

    $insertar = new Invento("",$_POST["txtNombre"], $_POST["txtAutor"], $_POST["txtFecha"], $_FILES["txtImagen"]["name"],$_POST["txtDescripcion"]);
    $insertar-> insert();
    echo "<script> swal({title: 'Bien!!', text: 'Se ha guardado correctamente', confirmButtonText: 'Continuar'},
          function(){window.location = '../index.php';});</script>";
  }
    ?>
  </body>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
</html>
