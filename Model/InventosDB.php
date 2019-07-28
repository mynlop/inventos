<?php
  abstract class InventosDB{
    private static $server = 'localhost';
    private static $db = 'proyectos';
    private static $user = 'root';
    private static $password = 'sql123';

    public static function connectDB(){
      try {
        $conexion = new PDO("mysql:host=" .self::$server ."; dbname=" .self::$db ."; charset=utf8", self::$user, self::$password);
        $conexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (Exception $e) {
        die("Error: " .$e->getMessage());
      }
      return $conexion;
    }
  }
?>
