<?php
extract($_POST);
include_once '../class/Inventario.php';

$sql=" ";
$recibef;


if(!empty($recurso) and !empty($totalRecurso)){

    if(!empty($max) and $max < $totalRecurso){
         echo "0";
    }else{
    
    $estatus = (empty($estatus))?"4":$estatus;
	$recibe  = (empty($recibe))?" ":$recibe;
    
    $RecursoEntrante = new Inventario($recurso,$totalRecurso,$tipoTransaccion,$recibe," ",$estatus);
    
    return $RecursoEntrante->guardar();
    }
    
}

if(!empty($idRecurso)){
    $Recurso = new Inventario();
    return $Recurso->buscar($idRecurso);

    
}

//Actualizar herramienta:
if(!empty($herramientajson)){
    
    $herramientaphp = json_decode($herramientajson,true);
    
    $HerramientaActualizar = new Herramienta($herramientaphp['nombre'],$herramientaphp['estatus'],$herramientaphp['id']);
    return $HerramientaActualizar->guardar();

      

}

//Eliminar herramienta:
if(!empty($idHerramientaE)){

    $HerramientaEliminar = new Herramienta();
    return $HerramientaEliminar->eliminar($idHerramientaE);
}