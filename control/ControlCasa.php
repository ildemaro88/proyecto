<?php
extract($_POST);
include_once '../class/Casa.php';
$sql=" ";
if(!empty($nombreHerramienta) and !empty($cantidadHerramienta)){
    
    $sql = "INSERT INTO herramienta (nombre,cantidad)
            VALUES

            ('".$nombreHerramienta."', '".$cantidadHerramienta."' )";
    
    $Herramienta = new Herramienta();
    $guardar = $Herramienta->guardar($sql);
    
    return $guardar;
   
}

if(!empty($numeroCasa) and !empty($direccioncasa)){
    
    $sql = "INSERT INTO casa (numero,direccion)
            VALUES

            ('".$numeroCasa."', '".$direccioncasa."' )";
    
    $casa = new Casa();
    $guardar = $casa->guardar($sql);
    
    return $guardar;
   
}

if(!empty($nombreMaterial) and !empty($CantidadMaterial)){
    
    $sql = "INSERT INTO material (nombre,cantidad_recibida)
            VALUES

            ('".$nombreMaterial."', '".$CantidadMaterial."' )";

            var_dump($sql);die();
    
    $material = new Material();
    $guardar = $material->guardar($sql);
    
    return $guardar;
   
}

if(!empty($nombreTrabajador) and !empty($cargoTrabajador)){

    $Trabajador = new Trabajador($nombreTrabajador,$cargoTrabajador,$telefonoTrabajador,$direccionTrabajador);
    return $Trabajador->guardar();
    
}

if(!empty($idTrabajador)){
    $Trabajador = new Trabajador();
    $data = $Trabajador->buscar($idTrabajador);
    
    echo json_encode($data);

}

//Actualizar trabajador:
if(!empty($trabajadorjson)){
     
    $trabajadorphp = json_decode($trabajadorjson,true);
    
    $TrabajadorActualizar = new Trabajador($trabajadorphp['nombre'],$trabajadorphp['cargo'],$trabajadorphp['telefono'],$trabajadorphp['direccion'],$trabajadorphp['id']);
    return $TrabajadorActualizar->guardar();

      

}

//Eliminar trabajador:
if(!empty($idTrabajadorE)){

    $TrabajadorEliminar = new Trabajador();
    return $TrabajadorEliminar->eliminar($idTrabajadorE);
}