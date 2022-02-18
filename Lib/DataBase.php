<?php
namespace Lib;
require_once 'Lib/DB-config.php';
use PDO;
use PDOException;

class Database {
  
  protected PDO $conexion;
  private mixed $resultado; //mixed novedad en PHP cualquier valor
  
  function __construct(
    private string $servidor = SERVIDOR,
    private string $usuario = USUARIO,
    private string $pass = PASS,
    private string $base_datos= BASE_DATOS
  ) {
    $this->conexion = $this->conectar();
  }
  
  private function conectar(): PDO {
    try {
        $opciones = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::MYSQL_ATTR_FOUND_ROWS => true
            );
        $conexion = new PDO("mysql:host={$this->servidor};dbname={$this->base_datos}", $this->usuario, $this->pass, $opciones);
        return $conexion;
    } catch(PDOException $e){
      echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
      exit;
    }
  }
}
