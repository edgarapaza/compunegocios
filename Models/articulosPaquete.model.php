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

  public function Todos()
  {
      $sql = "SELECT p.idproducto, f.codigo, p.descripcion, p.precventa1, p.precventa2, p.precventa3, p.stocktotal FROM productos as p, familia as f WHERE p.idfamilia = f.IDfamilia AND p.stocktotal <> 0";

      if(!$data = $this->con->query($sql)){
        echo "Error todos". mysqli_error($this->con);
      }
       
      return $data;
      mysqli_close($this->con);
  }

  public function ListaArticulosNombres($nombre)
  {

      $sql = "SELECT p.idproducto, p.numserie, f.codigo, p.descripcion, p.precventa1, p.precventa2, p.precventa3, p.stocktotal FROM productos as p, familia as f WHERE p.idfamilia = f.IDfamilia AND p.descripcion LIKE '%". $nombre ."%' AND p.stocktotal <> 0";

        $data = $this->con->query($sql);
       
   
    return $data;
    mysqli_close($this->con);
  }

  public function ListaArticulosNombresforCompra($nombre)
  {

      $sql = "SELECT p.idproducto, p.numserie, f.codigo, p.descripcion, p.marca, p.modelo, p.PVP, p.stocktotal, p.codigo FROM productos as p,  familia as f WHERE p.idfamilia = f.IDfamilia AND p.descripcion LIKE '%". $nombre ."%'";

        $data = $this->con->query($sql);
       
   
    return $data;
    mysqli_close($this->con);
  }


  public function ListaArticulosSerie($serie)
    {

      
        $sql = "SELECT p.idproducto, f.codigo, p.descripcion, p.precventa1, p.precventa2, p.precventa3, p.stocktotal, p.numserie FROM productos as p, familia as f WHERE p.idfamilia = f.IDfamilia AND p.numserie = '". $serie ."' AND p.stocktotal <> 0";

          $data = $this->con->query($sql);
      
      

    return $data;
    mysqli_close($this->con);
  }



  public function ListaArticulosFamilias($idfamilia)
  {

    $data = null;

    if($idfamilia === 'all'){

      $sql = "SELECT p.idproducto, f.codigo, p.descripcion, p.precventa1, p.precventa2, p.precventa3, p.stocktotal, p.numserie FROM productos as p, familia as f WHERE p.idfamilia = f.IDfamilia AND p.stocktotal <> 0";

        $data = $this->con->query($sql);
        #return $data;
    }else{
      $sql = "SELECT p.idproducto, f.codigo, p.descripcion, p.precventa1, p.precventa2, p.precventa3, p.stocktotal, p.numserie FROM productos as p, familia as f WHERE p.idfamilia = f.IDfamilia AND p.idfamilia = $idfamilia AND p.stocktotal <> 0";

        $data = $this->con->query($sql);
        #return $data;
    }

    return $data;
    mysqli_close($this->con);

  }


  public function ListaMarcaProd($busca1, $busca2)
  {

    if($busca1 == "")
    {
      $sql = "SELECT p.idproducto, f.codigo,  p.descripcion, p.precventa1, p.precventa2, p.precventa3, p.stocktotal, p.numserie FROM productos as p, familia as f WHERE marca LIKE '%". $busca1 ."%' OR descripcion LIKE '%". $busca1 ."%'";

        $res1 = $this->con->query($sql);
        #return $res1;
    }

    if($busca2 != "")
    {
      $sql = "SELECT p.idproducto, f.familia, p.descripcion, p.precventa1, p.precventa2, p.precventa3, p.stocktotal, p.numserie FROM productos as p, familia as f WHERE numserie = '". $busca2 ."'";

        $res1 = $this->con->query($sql);
        #return $res1;
    }


    return $res1;
    mysqli_close($this->con);
  }
}

/*
$articulo = new ArticulosAlmacen();
$dat = $articulo->ListaArticulosNombres('hd');

while ($fila = $dat->fetch_array()) {
  echo $fila[0]."<br>";
  echo $fila[1]."<br>";
  echo $fila[2]."<br>";
  echo $fila[3]."<br>";
  echo $fila[4]."<br>";
  echo $fila[5]."<br>";
  echo $fila[6]."<br>";
}*/
?>
