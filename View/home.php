<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  </head>
  <body>
    <header>
      <div class="container">
      <nav class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
              <span class="sr-only">Menu de navegacion</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav navbar-right text-center">
              <li><a href="index.php">Home</a></li>
              <li class="nuevoInvento"><a data-toggle='modal' data-target="#nuevo" >Nuevo Invento</a></li>
            </ul>
          </div>
      </nav>
    </div>
    </header>
    <?php include 'formularioNuevo.php';?>
  </body>
</html>
