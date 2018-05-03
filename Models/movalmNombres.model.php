<?php 

require_once 'Conexion.php';

class ReemplazarNombres
{
  private $con;
  function __construct()
  {
    $link = new Conexion();
    $this->con = $link->Conectarse();
    return $this->con;
  }

  public function Almacen($idalmacen)
  {
      $sql = "SELECT almacen FROM almacen WHERE idalmacen = $idalmacen;";

      if(!$data = $this->con->query($sql)){
        echo "Error Cambio Almacen". mysqli_error($this->con);
      }
      
      $fila = $data->fetch_array();
      return $fila;

      mysqli_close($this->con);
  }

  public function Producto($idproducto)
  {
      $sql = "SELECT descripcion FROM productos WHERE idproducto = $idproducto;";

      if(!$data = $this->con->query($sql)){
        echo "Error Cambio producto". mysqli_error($this->con);
      }
      
      $fila = $data->fetch_array();
      return $fila;

      mysqli_close($this->con);
  }

  public function Persona($idpersonal)
  {
      $sql = "SELECT CONCAT(nombres,' ',paterno,' ', materno) as persona FROM Personal WHERE IDPersonal = $idpersonal;";

      if(!$data = $this->con->query($sql)){
        echo "Error Cambio Personal". mysqli_error($this->con);
      }
      
      $fila = $data->fetch_array();
      return $fila;

      mysqli_close($this->con);
  }

  public function AllRegistros()
  {
     $sql = "SELECT idproducto,idalma_anterior, idalma_nuevo,fechacambio,idpersonal  FROM cambioalmacen;";

      if(!$data = $this->con->query($sql)){
        echo "Error Listado". mysqli_error($this->con);
      }
      
      return $data;

      mysqli_close($this->con); 
  }

}
