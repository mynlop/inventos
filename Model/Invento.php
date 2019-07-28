<?php
  require_once 'InventosDB.php';

  class Invento{
    private $id;
    private $titulo;
    private $autor;
    private $fecha;
    private $imagen;
    private $descripcion;

    function __construct($id, $titulo, $autor, $fecha, $imagen, $descripcion){
      $this-> id = $id;
      $this-> titulo = $titulo;
      $this-> autor = $autor;
      $this-> fecha = $fecha;
      $this-> imagen = $imagen;
      $this-> descripcion = $descripcion;
    }

    public function getId(){
      return $this-> id;
    }
    public function getTitulo(){
      return $this-> titulo;
    }
    public function getAutor(){
      return $this-> autor;
    }
    public function getFecha(){
      return $this-> fecha;
    }
    public function getImagen(){
      return $this-> imagen;
    }
    public function getDescripcion(){
      return $this-> descripcion;
    }

    public function insert(){
      $conexion = InventosDB::connectDB();
      $insertar = $conexion-> prepare("INSERT INTO inventos(titulo, autor, fecha, imagen, descripcion) VALUES
      (:titulo, :autor, :fecha, :imagen, :descripcion)");
      $insertar-> bindParam(':titulo', $this-> titulo, PDO::PARAM_STR);
      $insertar-> bindParam(':autor', $this-> autor, PDO::PARAM_STR);
      $insertar-> bindParam(':fecha', $this-> fecha, PDO::PARAM_STR);
      $insertar-> bindParam(':imagen', $this-> imagen, PDO::PARAM_STR);
      $insertar-> bindParam(':descripcion', $this-> descripcion, PDO::PARAM_STR);
      $insertar-> execute();
    }
    public function delete(){
      $conexion = InventosDB::connectDB();
      $borrado = $conexion-> prepare("DELETE FROM inventos WHERE id = :id");
      $borrado-> bindParam(':id',$this-> id, PDO::PARAM_INT);
      $borrado-> execute();
    }
    public function modificar(){
      $conexion = InventosDB::connectDB();
      $modificar = $conexion-> prepare("UPDATE inventos SET titulo= :titulo, autor = :autor, fecha= :fecha, imagen= :imagen, descripcion= :descripcion WHERE id= :id");
      $modificar-> bindParam(':titulo',$this-> titulo, PDO::PARAM_STR);
      $modificar-> bindParam(':autor',$this-> autor, PDO::PARAM_STR);
      $modificar-> bindParam(':fecha',$this-> fecha, PDO::PARAM_STR);
      $modificar-> bindParam(':imagen',$this-> imagen, PDO::PARAM_STR);
      $modificar-> bindParam(':descripcion',$this-> descripcion, PDO::PARAM_STR);
      $modificar-> bindParam(':id',$this-> id, PDO::PARAM_INT);
      $modificar-> execute();
    }
    public function getInventosbyId(){
      $conexion = InventosDB::connectDB();
      $obtener = $conexion-> query("SELECT * FROM inventos WHERE id=" .$this-> id);
      $rows = $obtener-> fetchAll();
      return $rows;
    }
    public function getInventos(){
      $conexion = InventosDB::connectDB();
      $total = $conexion-> query("SELECT COUNT(id) as rows FROM inventos")
						-> fetch(PDO::FETCH_OBJ);
			$porHoja = 3;
			$posts = $total-> rows;
			global $pages, $number, $prev, $next;
			$pages = ceil($posts/$porHoja);
			$get_pages = isset($_GET['page']) ? $_GET['page'] : 1;
			$data = array('opciones' => array('default' => 1, 'min_range' => 1, 'max_range' => $pages));
			$number = trim($get_pages);
			$number = filter_var($number, FILTER_VALIDATE_INT, $data);
			$range = $porHoja * ($number - 1);
			$prev = $number - 1;
			$next = $number + 1;
			$stmt = $conexion-> prepare("SELECT id, titulo, autor, fecha, imagen, descripcion FROM inventos LIMIT :limit, :perpage");
			$stmt-> bindParam(':perpage', $porHoja, PDO::PARAM_INT);
			$stmt-> bindParam(':limit', $range, PDO::PARAM_INT);
			$stmt-> execute();
			$result = $stmt-> fetchAll();
			return $result;
    }
  }
?>
