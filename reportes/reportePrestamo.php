<?php 
require_once '../src/pdf/fpdf.php';
require_once '../class/Prestamo.php';
require_once '../class/Cargo.php';


$prestamos = new Prestamo();
$prestamos = $prestamos->getAll();
$cargos = new Cargo();
$cargos = $cargos->getAll();


if(!empty($prestamos)){


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
$pdf->Cell(50,6,'Responsable',1,0,'C',1);
 
$pdf->Cell(35,6,'Telefono',1,0,'C',1);
$pdf->Cell(35,6,'Herramienta',1,0,'C',1);
 
$pdf->Cell(30,6,'Cantidad',1,0,'C',1);
$pdf->Cell(40,6,'Fecha Prestamo',1,0,'C',1);
 
$pdf->Ln(6);

$a=1;

$pdf->SetTextColor(0);
$pdf->SetFont('Arial','B',9);
foreach ($prestamos as $prestamo) {

if ($a%2==0){
   $pdf->SetFillColor(230,232,255);
}else{
    $pdf->SetFillColor(255);
}
	

// $prestamos['disponible']+$prestamos['prestado']; 
 $pdf->Cell(50,6,utf8_decode($prestamo['responsable']),1,0,'L',1);
 $pdf->Cell(35,6,utf8_decode($prestamo['telefono']),1,0,'L',1);
 $pdf->Cell(35,6,utf8_decode($prestamo['herramienta']),1,0,'L',1);
 $pdf->Cell(30,6,utf8_decode($prestamo['cantidad']),1,0,'C',1);
 $pdf->Cell(40,6,$prestamo['fecha'],1,0,'C',1);
 $pdf->Ln(6);
 $pdf->SetFillColor(255);
$pdf->SetTextColor(0);
$a++;
 } 
//
$pdf->Output('ReportePrestamos.pdf','D');
}else{


}
?>