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
        $w = array(15, 50, 70, 30, 10, 15);
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
        $sql="SELECT p.codigo, a.almacen, p.descripcion, p.modelo,p.stocktotal,p.idpersonal as personal FROM productos as p, almacen as a WHERE p.idalmacen = a.idalmacen ORDER BY p.idalmacen;";
        $res=$mysqli->query($sql);
            while ($row = $res->fetch_array()){
            //AQUÍ VAN LAS CANTIDADES DE COLUMNAS REQUERIDAS AGREGA ROW’S A MEDIDA QUE NECESITES
            $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
            $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
            $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
            $this->Cell($w[4],6,$row[4],'LR',0,'C',$fill);
            $this->Cell($w[5],6,$row[5],'LR',0,'L',$fill);
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

$header = array('Codigo','Almacen','Producto','Modelo','Stock','Cod.Per.');
// Carga de datos
//AQUÍ VA TU VARIABLE
//$data = $_POST[‘tu variable’];
$todayh = getdate();
    $d = $todayh['mday'];
    $m = $todayh['mon'];
    $y = $todayh['year'];
    $h = $todayh['hours'];
    $n = $todayh['minutes'];
    $s = $todayh['seconds'];
$fecha = $d."/".$m."/".$y;
$hora = $h.":".$n.":".$s;
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Text(55,15,'Reporte 2 - Reporte por Producto y Stock');
$pdf->SetFont('Arial','',10);
$pdf->Write(20,"Reporte extraido el");
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Text(10,25,"Fecha: ".$fecha . " Hora ". $hora,1,1);
//AQUÍ LLAMAMOS LA FUNCION:
$pdf->SetFont('Arial','',8);
$pdf->FancyTable($header,$data);
$pdf->Output();
?>