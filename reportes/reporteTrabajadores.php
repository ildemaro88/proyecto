<?php 
require_once '../src/pdf/fpdf.php';
require_once '../class/Trabajador.php';
require_once '../class/Cargo.php';


$trabajadores = new Trabajador();
$trabajadores = $trabajadores->getAll();
$cargos = new Cargo();
$cargos = $cargos->getAll();


if(!empty($trabajadores)){


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
$pdf->Cell(25,6,'Cedula',1,0,'C',1);
 
$pdf->Cell(35,6,'Nombre',1,0,'C',1);
$pdf->Cell(35,6,'Apellido',1,0,'C',1);
 
$pdf->Cell(50,6,'Cargo',1,0,'C',1);
$pdf->Cell(35,6,'Telefono',1,0,'C',1);
 
$pdf->Ln(6);

$a=1;

$pdf->SetTextColor(0);
$pdf->SetFont('Arial','B',9);
foreach ($trabajadores as $trabajador) {

if ($a%2==0){
   $pdf->SetFillColor(230,232,255);
}else{
    $pdf->SetFillColor(255);
}
	

// $trabajadores['disponible']+$trabajadores['prestado']; 
 $pdf->Cell(25,6,utf8_decode($trabajador['ci']),1,0,'L',1);
 $pdf->Cell(35,6,utf8_decode($trabajador['nombre']),1,0,'L',1);
 $pdf->Cell(35,6,utf8_decode($trabajador['apellido']),1,0,'L',1);
 $pdf->Cell(50,6,utf8_decode($trabajador['descripcion']),1,0,'L',1);
 $pdf->Cell(35,6,$trabajador['telefono'],1,0,'L',1);
 $pdf->Ln(6);
 $pdf->SetFillColor(255);
$pdf->SetTextColor(0);
$a++;
 } 
//
$pdf->Output('Reportetrabajadores.pdf','D');
}else{


}
?>