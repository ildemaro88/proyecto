<?php
extract($_POST);

include_once '../class/Prestamo.php';

$sql=" ";



if(!empty($nombrePrestamo) and !empty($cargoPrestamo)){

    $Prestamo = new Prestamo($nombrePrestamo,$apellidoPrestamo,$ciPrestamo,$cargoPrestamo,$telefonoPrestamo,$direccionPrestamo);
    return $Prestamo->guardar();
    
}

if(!empty($idPrestamo)){
    $Prestamo = new Prestamo();
  	$prestamo = json_encode($Prestamo->buscar($idPrestamo));

  	echo $prestamo;



}

//Actualizar prestamo:
if(!empty($prestamojson)){
     
    $prestamophp = json_decode($prestamojson,true);

    $hoy = date("Y-m-d H:i:s");
    if($prestamophp['estatus'] == 4){
        $fecha_prestamo = $hoy;
         $fecha_recibido = "null";
         $PrestamoActualizar = new Prestamo(" ",$prestamophp['idHerramienta'],$prestamophp['cantidad'],$fecha_prestamo,$prestamophp['estatus'],$prestamophp['id'],$fecha_recibido);
       

    }else{
         $PrestamoActualizar = new Prestamo(" ",$prestamophp['idHerramienta'],$prestamophp['cantidad']," ",$prestamophp['estatus'],$prestamophp['id'],$hoy);
    }
    
    //var_dump($prestamophp);
   
    return $PrestamoActualizar->guardar();

      

}

//Eliminar prestamo:
if(!empty($idPrestamoE)){

    $PrestamoEliminar = new Prestamo();
    return $PrestamoEliminar->eliminar($idPrestamoE);
}

//Entregar prestamo:
if(!empty($idPrestamoA)){

    $PrestamoSalida = new Prestamo();
    return $PrestamoSalida->entregar($idPrestamoA,$tipo);
}

//Aprobar solicitud:
if(!empty($idPrestamoAS)){

    $PrestamoSalida = new Prestamo();
    return $PrestamoSalida->aprobar($idPrestamoAS,$tipo);
}

//Aprobar solicitud:
if(!empty($idPrestamoR)){

    $PrestamoSalida = new Prestamo();
    return $PrestamoSalida->rechazar($idPrestamoR,$tipo);
}