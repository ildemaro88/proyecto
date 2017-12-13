<?php
extract($_POST);

include_once '../class/Usuario.php';

$sql=" ";



if(!empty($nombreUsuario) and !empty($clave)){

    $Usuario = new Usuario($nombreUsuario,$clave,$idTrabajador,$rol,$correo,$estatus);
    return $Usuario->guardar();
    
}

if(!empty($idUsuario)){
    $Usuario = new Usuario();
    
    echo json_encode($Usuario->buscar($idUsuario));

}

//Actualizar usuario:
if(!empty($usuariojson)){
     
    $usuariophp = json_decode($usuariojson,true);
    
    $UsuarioActualizar = new Usuario($usuariophp['nombre']," ",$usuariophp['idTrabajador'],$usuariophp['rol'],$usuariophp['correo'],$usuariophp['estatus'],$usuariophp['id'],$usuariophp['actualiza']);
    
        return $UsuarioActualizar->actualizarUsuario();  

   
    

}

if(!empty($usuarioClavejson)){

    //var_dump($usuarioClavejson); exit();
     
    $usuariophp = json_decode($usuarioClavejson,true);
    
    $UsuarioActualizar = new Usuario($usuariophp['nombre'],$usuariophp['clave'],$usuariophp['idTrabajador'],$usuariophp['rol'],$usuariophp['correo'],$usuariophp['estatus'],$usuariophp['id']);
    return $UsuarioActualizar->guardar();  

}

//Eliminar usuario:
if(!empty($idUsuarioE)){

    $UsuarioEliminar = new Usuario();
    return $UsuarioEliminar->eliminar($idUsuarioE);
}