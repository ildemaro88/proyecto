<?php
extract($_POST);
include_once '../class/Material.php';

$sql=" ";


if(!empty($nombreMaterial) and !empty($estatusMaterial)){
    $Material = new Material($nombreMaterial,$estatusMaterial);
    
    return $Material->guardar();
    
}

if(!empty($idMaterial)){
    $Material = new Material();
    return $Material->buscar($idMaterial);
    
}

//Actualizar material:
if(!empty($materialjson)){
    
    $materialphp = json_decode($materialjson,true);
    
    $MaterialActualizar = new Material($materialphp['nombre'],$materialphp['estatus'],$materialphp['id']);
    return $MaterialActualizar->guardar();

      

}

//Eliminar material:
if(!empty($idMaterialE)){

    $MaterialEliminar = new Material();
    return $MaterialEliminar->eliminar($idMaterialE);
}