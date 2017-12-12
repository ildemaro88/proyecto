<?php
extract($_POST);

include_once '../class/Trabajador.php';

$sql=" ";



if(!empty($nombreTrabajador) and !empty($cargoTrabajador)){

    $Trabajador = new Trabajador($nombreTrabajador,$apellidoTrabajador,$ciTrabajador,$cargoTrabajador,$telefonoTrabajador,$direccionTrabajador);
    return $Trabajador->guardar();
    
}

if(!empty($idTrabajador)){
    $Trabajador = new Trabajador();
  	$trabajador = json_encode($Trabajador->buscar($idTrabajador));

  	echo $trabajador;



}

//Actualizar trabajador:
if(!empty($trabajadorjson)){
     
    $trabajadorphp = json_decode($trabajadorjson,true);
    
    $TrabajadorActualizar = new Trabajador($trabajadorphp['nombre'],$trabajadorphp['apellido'],$trabajadorphp['ci'],$trabajadorphp['cargo'],$trabajadorphp['telefono'],$trabajadorphp['direccion'],$trabajadorphp['id']);
    return $TrabajadorActualizar->guardar();

      

}

//Eliminar trabajador:
if(!empty($idTrabajadorE)){

    $TrabajadorEliminar = new Trabajador();
    return $TrabajadorEliminar->eliminar($idTrabajadorE);
}