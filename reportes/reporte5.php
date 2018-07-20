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
        // Cabecera

        $w = array(15, 15, 30, 60, 22,48);
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

        $sqltotal = "SELECT ROUND(SUM(total),2) FROM paqsuma_temp WHERE total <> 0;";
        $res_total = $mysqli->query($sqltotal);
        $total = $res_total->fetch_array();


        $sql="SELECT idps_temp as id, total, fecha, razonsocial, ruc, direccion FROM paqsuma_temp WHERE total <> 0 ORDER BY idps_temp DESC;";
        $res=$mysqli->query($sql);
            while ($row = $res->fetch_array()){
            //AQUÍ VAN LAS CANTIDADES DE COLUMNAS REQUERIDAS AGREGA ROW’S A MEDIDA QUE NECESITES
            $this->Cell($w[0],6,$row[0],'LR',0,'C',$fill);
            $this->Cell($w[1],6,$row[1],'LR',0,'C',$fill);
            $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
            $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
            $this->Cell($w[4],6,$row[4],'LR',0,'L',$fill);
            $this->Cell($w[5],6,$row[5],'LR',0,'L',$fill);
            
            $this->Ln();
            $fill = !$fill;
            }
            // Línea de cierre
            $this->Cell(array_sum($w),0,'','T');
            $this->Ln();
            $this->Cell(190,10,'Totalde ventas de todos los paquetes: es de: S/. '. $total[0] . '  *********',1,1,'R');
    }
}

$pdf = new PDF();
// Títulos de las columnas
//AQUÍ VAN TUS COLUMNAS QUE NECESITAS;
$header = array('Cod.Paq','Total','Fecha','Razon Social','RUC','Direccion');

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
$pdf->SetTitle("Reporte General", true);
$pdf->SetAuthor("Edgar Apaza",true);
$pdf->SetFont('Arial','B',14);
$pdf->Text(55,15,'Reporte 5 - Reportes de Ventas por Factura');

$pdf->SetFont('Arial','',10);
$pdf->Write(20,"Reporte extraido el");
$pdf->Ln();
$pdf->Text(10,25,"Fecha: ".$fecha . " Hora ". $hora,1,1);

//AQUÍ LLAMAMOS LA FUNCION:
$pdf->SetFont('Arial','',8);
$pdf->FancyTable($header, $dato);
$pdf->Output();
?>