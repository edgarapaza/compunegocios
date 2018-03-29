<?php
require_once 'Conexion.php';

class ArticulosAlmacen
{
  private $con;
  function __construct()
  {
    $link = new Conexion();
    $this->con = $link->Conectarse();
    return $this->con;
  }

  public function ListaArticulos($id)
  {
    
    $data = null;

    if($id === '1000'){

      $sql = "SELECT p.idproducto, f.codigo, p.descripcion, p.precventa1, p.precventa2, p.precventa3, p.stocktotal FROM productos as p, familia as f WHERE p.idfamilia = f.IDfamilia AND p.stocktotal <> 0";
          
        $data = $this->con->query($sql);
        #return $data;
    }else{
      $sql = "SELECT p.idproducto, f.codigo, p.descripcion, p.precventa1, p.precventa2, p.precventa3, p.stocktotal FROM productos as p, familia as f WHERE p.idfamilia = f.IDfamilia AND p.idfamilia = $id AND p.stocktotal <> 0";
          
        $data = $this->con->query($sql);
        #return $data;
    }
    
    return $data;
      
  }


  public function ListaMarcaProd($busca1, $busca2)
  {

    if($busca1 == "")
    {
      $sql = "SELECT p.idproducto, f.codigo,  p.descripcion, p.precventa1, p.precventa2, p.precventa3, p.stocktotal FROM productos as p, familia as f WHERE marca LIKE '%". $busca1 ."%' OR descripcion LIKE '%". $busca1 ."%'";
          
        $res1 = $this->con->query($sql);
        #return $res1;
    }
    
    if($busca2 != "")
    {
      $sql = "SELECT p.idproducto, f.familia, p.descripcion, p.precventa1, p.precventa2, p.precventa3, p.stocktotal FROM productos as p, familia as f WHERE numserie = '". $busca2 ."'";
          
        $res1 = $this->con->query($sql);
        #return $res1;
    }
    
    
    return $res1;
      
  }
}

?>