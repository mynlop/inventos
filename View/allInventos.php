<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home: Inventos</title>
  <style>
  .panel{background-color: #f2f2f2; box-shadow: 0px 1px 15px #000;}
  </style>
  <script src="sweetalert.min.js"></script>
  <link rel="stylesheet" href="sweetalert.css" media="screen">
  <script type="text/javascript">
    function eliminar(url){
      swal({
        title: "¿Esta seguro de eliminar el invento?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "No, cancelar",
        closeOnConfirm: false,
        closeOnCancel: true
      },
    function(isConfirm){
      if(isConfirm){
        window.location = url;
      }else{}
    });
    }
  </script>
</head>

<body>
  <div class="container">
    <div class="">
      <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
        <?php
        include_once 'Model/Invento.php';
        $invento = new Invento(null,null,null,null,null,null);
				$inventos = $invento-> getInventos();
        if($inventos && count($inventos) > 0){
          // echo "<h3>Pagina actual: ($number)</h3>";
          echo "<ul class='pagination'>";
					if($number <= 1 ){
            echo "<li class='disabled'><span>Anterior</span></li>";
            for ($i=1; $i <= $pages ; $i++) {
              if(isset($_GET['page'])){
                if($_GET['page'] == $i)
                  echo "<li class='active'><a href=\"?page=$i\">$i</a></li>";
                  else
                  echo "<li><a href=\"?page=$i\">$i</a></li>";
                }else{
                  $_GET['page'] = 1;
                  echo "<li class='active'><a href=\"?page=1\">1</a></li>";
                }
            }
            echo "<li ><a  href=\"?page=$next\">Siguiente </a></li>";
          }elseif($number > $pages || $number < $pages){
            echo "<li><a href=\"?page=$prev\"><span>Anterior</span></a></li>";
            for ($i=1; $i <= $pages ; $i++) {
              if($_GET['page'] == $i)
                echo "<li class='active'><a href=\"?page=$i\">$i</a></li>";
              else
                echo "<li><a href=\"?page=$i\">$i</a></li>";
            }
            echo "<li><a href=\"?page=$next\">Siguiente </a></li>";
          }else{
            echo "<li><a href=\"?page=$prev\"><span>Anterior</span></a></li>";
            for ($i=1; $i <= $pages ; $i++) {
              if($_GET['page'] == $i)
                echo "<li class='active'><a href=\"?page=$i\">$i</a></li>";
              else
                echo "<li><a href=\"?page=$i\">$i</a></li>";
            }
            echo "<li class='disabled'><a >Siguiente</a></li>";
          }
          echo "</ul>";
        }else{echo "<p>No se encontraron resultados</p>";	}
        ?>
        <?php
        foreach($inventos as $key => $invento){
          ?>
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row col-xs-12 col-sm-6 ">
              <img src="View/images/<?= $invento['imagen'] ?>" alt="" width="100%">
            </div>
            <div class="col-xs-12 col-sm-6">
              <p class="text-center" style="font-size: 3em;"><?= $invento['titulo'] ?></p>
              <p><?= $invento['autor'] ?></p>
              <p><?= $invento['fecha'] ?></p>
            </div>
            <div class="row col-xs-12">
              <?= $invento['descripcion']  ?>
            </div>
          </div>
          <div class="panel-footer">
            <div class=" text-center">
              <a href="javascript:void(0);" onclick="eliminar('Controller/borrarInvento.php?id=<?= $invento['id'] ?> ');" type="button" class="btn btn-danger">Eliminar</a>
              <a href="View/modificar.php?id=<?= $invento['id'] ?>" type="button" class="btn btn-primary">Editar</a>
            </div>
          </div>
        </div>
        <?php }?>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

</body>
</html>
