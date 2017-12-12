<?php 
require_once '../src/pdf/fpdf.php';

require_once '../class/Inventario.php';

$material = new Inventario();
$materiales = $material->getAll();

if(!empty($materiales)){


class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    //Logo
    $this->Image("poder_1.jpg" , 10 ,8, " " ,  " " , "jpg" ,"");
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(60);
    //Título
    $this->Cell(60,10,'Reporte Materiales',0,0,'C');
    //Salto de línea
    $this->Ln(30);
      
   }
   
   //Pie de página
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }

   
   
   
}

$pdf=new PDF();

//Títu
//Agregamos la primera pagina al documento pdf
$pdf->AddPage();
$pdf->AliasNbPages();
//Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(197,30,48);
$pdf->SetTextColor(255);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,6,'Nombre',1,0,'C',1);
 
$pdf->Cell(50,6,'Tipo Recurso',1,0,'C',1);
$pdf->Cell(30,6,'Prestado',1,0,'C',1);
 
$pdf->Cell(30,6,'Disponible',1,0,'C',1);
$pdf->Cell(30,6,'Total',1,0,'C',1);
 
$pdf->Ln(6);

$a=1;

$pdf->SetTextColor(0);
$pdf->SetFont('Arial','B',9);
foreach ($materiales as $material) {

if ($a%2==0){
   $pdf->SetFillColor(230,232,255);
}else{
    $pdf->SetFillColor(255);
}
	


$material['prestado']=($material['prestado']>0)?$material['prestado']:0;
$disponible=($material['disponible']>0)?$material['disponible']:0;
$total=$material['prestado']+$disponible;
// $material['disponible']+$material['prestado']; 
 $pdf->Cell(50,6,$material['nombre'],1,0,'L',1);
 $pdf->Cell(50,6,$material['tipo'],1,0,'L',1);
 $pdf->Cell(30,6,$material['prestado'],1,0,'L',1);
 $pdf->Cell(30,6,$disponible+1,1,0,'L',1);
 $pdf->Cell(30,6,$total,1,0,'L',1);
 $pdf->Ln(6);
 $pdf->SetFillColor(255);
$pdf->SetTextColor(0);
$a++;
 } 

$pdf->Output('ReporteInventario.pdf','D');
}else{


}
?>