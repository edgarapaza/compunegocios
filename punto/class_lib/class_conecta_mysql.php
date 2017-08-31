<?php
///CLASE PARA CONECTAR CON MYSQL.....////
error_reporting(0);
class ConexionMySQL{

  private $conexion;
  private $total_consultas;

  public function ConexionMySQL(){
    $this->conexion = new mysqli("localhost","root", "admin", "db_venta");
      $this->conexion->set_charset("utf8");
      echo $this->conexion->host_info. " Dentro de la clase";
      return $this->conexion;
  }

  public function consulta($consulta){
    error_reporting(0);
    $this->total_consultas++;
    $resultado = mysql_query($consulta,$this->conexion);
    if(!$resultado){
      echo 'Error en MySQL: ' . mysql_error();
      //echo "0";
      exit;
    }
    return $resultado;
  }

  public function buscar_array($consulta){
    error_reporting(0);
   return mysql_fetch_array($consulta);
  }

  public function numero_de_registros($consulta){
    error_reporting(0);
   return mysql_num_rows($consulta);
  }

  public function getTotalConsultas(){
   return $this->total_consultas;
  }

  public function DesconectaServer(){
    error_reporting(0);
    mysql_close($this->conexion);
  }

  }
?>