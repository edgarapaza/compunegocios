<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Tabla coloreada
    function FancyTable($header, $data)
    {

        $fecha2 = date('Y-m-d');
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(0,58,126);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Cabecera

        $w = array(15, 100, 15,15,15,30);
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
        require_once "../Models/Conexion.php";
        $conexion = new Conexion();
        $mysqli = $conexion->Conectarse();

        $sql = "SELECT v.idventas, p.descripcion, v.precio, v.cantidad, v.total, concat(per.paterno,' ',per.materno) as trabajador
        FROM ventas as v, productos as p, Personal as per
        WHERE v.idproducto = p.idproducto AND v.IDPersonal = per.IDPersonal AND v.fecRegisto LIKE '$fecha2%'";

        $sqltotal = "SELECT ROUND(SUM(total),2) as Total FROM ventas WHERE fecRegisto LIKE '$fecha2%'";
        $res_total = $mysqli->query($sqltotal);
        $total = $res_total->fetch_array();

        $res=$mysqli->query($sql);
            while ($row = $res->fetch_array()){
            //AQUÍ VAN LAS CANTIDADES DE COLUMNAS REQUERIDAS AGREGA ROW’S A MEDIDA QUE NECESITES
            $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
            $this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
            $this->Cell($w[3],6,$row[3],'LR',0,'C',$fill);
            $this->Cell($w[4],6,$row[4],'LR',0,'C',$fill);
            $this->Cell($w[5],6,$row[5],'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
            }

            $this->Cell(array_sum($w),0,'','T');

            $this->Ln();
            $this->Cell(190,10,'Total en Ventas para Hoy '. $fecha2 .' es de: S/. '. $total[0] . '**********',1,1,'R');
            // Línea de cierre
    }
    

}

$pdf = new PDF();
// Títulos de las columnas
//AQUÍ VAN TUS COLUMNAS QUE NECESITAS;

$header = array('Codigo','Descripcion','Precio','Cantidad','Total','Trabajador');
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
$pdf->Cell(190,10,'Reporte 3 - Reporte por Fechas de hoy y Total Ventas',1,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,5,"Fecha: ".$fecha . " Hora ". $hora,1,1);
//AQUÍ LLAMAMOS LA FUNCION:
$pdf->SetFont('Arial','',8);
$pdf->FancyTable($header,$data);
$pdf->Output();
?>