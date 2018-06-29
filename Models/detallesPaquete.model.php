<?php 

require_once 'Conexion.php';

class DetallesPaqueteClass
{
  private $con;
  function __construct()
  {
    $link = new Conexion();
    $this->con = $link->Conectarse();
    return $this->con;
  }

  public function DetallesPaquete($idpaqueteSuma)
  {
      $sql = "SELECT q.idpaquete, q.fecReg, q.idproducto, q.producto, q.modelo, q.cantidad, q.precio, q.subtotal, q.fecCierre,p.numserie FROM paquete as q, productos as p WHERE q.idproducto = p.idproducto AND idps = $idpaqueteSuma";

      if(!$data = $this->con->query($sql)){
        echo "Error todos". mysqli_error($this->con);
      }
       
      return $data;
      mysqli_close($this->con);
  }
}

 ?>