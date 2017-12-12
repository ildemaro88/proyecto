<?php
extract($_POST);
include_once '../class/Recurso.php';

$sql=" ";


if(!empty($nombreRecurso) and !empty($estatusRecurso)){

    $Recurso = new Recurso($nombreRecurso,$estatusRecurso,$tipoRecurso);
    return $Recurso->guardar();
    
}

if(!empty($idRecurso)){
    $Recurso = new Recurso();
    return $Recurso->buscar($idRecurso);
    
}

//Actualizar recurso:
if(!empty($recursojson)){
    
    $recursophp = json_decode($recursojson,true);
    $RecursoActualizar = new Recurso($recursophp['nombre'],$recursophp['estatus'],$recursophp['tipo'],$recursophp['id']);
    return $RecursoActualizar->guardar();

      

}

//Eliminar recurso:
if(!empty($idRecursoE)){

    $RecursoEliminar = new Recurso();
    return $RecursoEliminar->eliminar($idRecursoE);
}