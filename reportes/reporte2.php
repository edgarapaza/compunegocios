<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Tabla coloreada
    function FancyTable($header, $data)
    {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(0,58,126);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        //Tamaño de las columnas
        $w = array(20, 55, 45, 40,30);
        for($i=0;$i<count($header);$i++){
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        }
        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(224,200,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = false;
        //AQUÍ LO VAMOS A CAMBIAR: HACEMOS CONEXIÓN, CONSULTA Y ARRAY
        include ("../Models/Conexion.php");
        $conexion = new Conexion();
        $mysqli = $conexion->Conectarse();
        $sql="SELECT p.codigo, f.familia, p.producto, p.descripcion, p.cantidad FROM productos as p, familia as f WHERE f.IDfamilia = p.IDFamilia";
        $res=$mysqli->query($sql);
            while ($row = $res->fetch_array()){
            //AQUÍ VAN LAS CANTIDADES DE COLUMNAS REQUERIDAS AGREGA ROW’S A MEDIDA QUE NECESITES
            $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
            $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
            $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
            $this->Cell($w[4],6,$row[4],'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
            }
            // Línea de cierre
            $this->Cell(array_sum($w),0,'','T');
    }
}

$pdf = new PDF();
// Títulos de las columnas
//AQUÍ VAN TUS COLUMNAS QUE NECESITAS;

$header = array('Codigo','Familia','Producto','Descripcion','Stock');
// Carga de datos
//AQUÍ VA TU VARIABLE
//$data = $_POST[‘tu variable’];
$fecha = date('d-m-Y H:m:s');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190,10,'Reporte 2 - Reporte por Producto y Stock',1,1,'C');
$pdf->Cell(50,5,$fecha,1,1);
//AQUÍ LLAMAMOS LA FUNCION:
$pdf->SetFont('Arial','B',9);
$pdf->FancyTable($header,$data);
$pdf->Output();
?>