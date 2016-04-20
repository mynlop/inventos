<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  </head>
  <body>
    <di class="container">
      <div class="row col-xs-12  text-center">
        <div class="panel panel-default">
          <div class="panel-body">
            <form action="../Controller/modInvento.php" method="post" enctype="multipart/form-data">
              <?php
                include '../Model/Invento.php';
                $invento = new Invento($_GET['id'], null, null, null, null, null);
                $fila = $invento-> getInventosbyId();
                foreach($fila as $row){
                ?>
                <div class="row">
                  <div class="form-group col-xs-12 col-sm-12 text-center">
                    <label for="nombre" class="control-label col-xs-12 col-sm-2">Nombre Invento</label>
                    <div class="col-xs-12 col-sm-10">
                      <input type="hidden" class="form-control" name="txtId" value="<?= $row['id'] ?>">
                      <input type="text" id="nombre" class="form-control" name="txtNombre" value="<?= $row['titulo'] ?>" required>
                    </div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-12 text-center">
                    <label for="autor" class="control-label col-xs-12 col-sm-2">Creador</label>
                    <div class="col-xs-12 col-sm-10 " >
                      <input type="text" id="autor" class="form-control" name="txtAutor" value="<?= $row['autor'] ?>" required>
                    </div>
            	    </div>
                  <div class="form-group col-xs-12 col-sm-12 text-center">
                    <label for="file" class="control-label col-xs-12 col-sm-2">Imagen del Invento</label>
                    <div class="col-xs-12 col-sm-10">
                      <input type="text" id="file" class="form-control" name="txtImagen" value="<?= $row['imagen'] ?>" required>
                      <input class="btn btn-default" type="button" id="cambiarImagen" onclick="cambiar();" value="Cambiar Imagen">
                    </div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-12 text-center">
                    <label for="datepicker" class="control-label col-xs-12 col-sm-2">Fecha de descubrimiento</label>
                    <div class="col-xs-12 col-sm-10">
                      <input type="text" id="datepicker" class="form-control" name="txtFecha" value="<?= $row['fecha']?>" required>
                    </div>
            	    </div>
                  <div class="form-group col-xs-12 col-sm-12 text-center">
                    <label for="desc" class="control-label col-xs-12 col-sm-2">Descripcion del Invento</label>
                    <div class="col-xs-12 col-sm-10">
                      <textarea id="desc" class="form-control" name="txtDescripcion"  required rows="3" cols="40"><?= $row['descripcion']?></textarea>
                    </div>
                </div>
              <?php
                }
              ?>
          </div>
        </div>
          <div class="panel-footer">
            <a href="../index.php" class="btn btn-danger" type="button">Cancelar</a>
            <button class="btn btn-primary" type="submit" >Guarda cambios</button>
          </div>
        </form>
        </div>
      </div>
  </di>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $( "#datepicker" ).datepicker();
  // $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
  function cambiar(){
    if( document.getElementById("cambiarImagen").value === "Cancelar"){
      document.getElementById("cambiarImagen").value = "Cambiar Imagen";
      document.getElementById("file").type = 'text';
    }else{
      document.getElementById("file").type = 'file';
      document.getElementById("cambiarImagen").value = "Cancelar";
    }
  }
  $("#datepicker").change(function(){
    $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
  });
  </script>
</html>
