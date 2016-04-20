<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo Invento</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

</head>
<body>
  <div class="modal fade" id="nuevo" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >Nuevo Invento</h4>
      </div>
      <div class="modal-body">
        <form action="Controller/grabaInvento.php" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="row ">
          <div class="form-group col-xs-12 col-sm-12 text-center">
            <label for="nombre" class="control-label col-xs-12 col-sm-2">Nombre Invento</label>
            <div class="col-xs-12 col-sm-10">
              <input type="text" id="nombre" class="form-control" name="txtNombre" placeholder="Nombre de Invento" required>
            </div>
    	    </div>
          <div class="form-group col-xs-12 col-sm-12 text-center">
            <label for="autor" class="control-label col-xs-12 col-sm-2">Nombre del Creador</label>
            <div class="col-xs-12 col-sm-10">
              <input type="text" id="autor" class="form-control" name="txtAutor" placeholder="Creador del invento" required>
            </div>
    	    </div>
          <div class="form-group col-xs-12 col-sm-12 text-center">
            <label for="file" class="control-label col-xs-12 col-sm-2">Imagen del Invento</label>
            <div class="col-xs-12 col-sm-10">
              <input type="file" id="file" class="form-control" name="txtImagen" placeholder="Imagen de invento" required>
            </div>
          </div>
          <div class="form-group col-xs-12 col-sm-12 text-center">
            <label for="datepicker" class="control-label col-xs-12 col-sm-2">Fecha de descubrimiento</label>
            <div class="col-xs-12 col-sm-10">
              <input type="text" id="datepicker" class="form-control" name="txtFecha" placeholder="Fecha del invento" required>
            </div>
    	    </div>
          <div class="form-group col-xs-12 col-sm-12 text-center">
            <label for="desc" class="control-label col-xs-12 col-sm-2">Descripcion del Invento</label>
            <div class="col-xs-12 col-sm-10">
              <textarea id="desc" class="form-control" name="txtDescripcion" placeholder="Descripcion" required rows="3" cols="40"></textarea>
            </div>
    	    </div>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Insertar</button>
    </form>
  </div>
    </div>
  </div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $( "#datepicker" ).datepicker();
  $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
  </script>
</body>
</html>
