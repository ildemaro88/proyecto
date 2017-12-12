<?php
require_once '../class/Login.php';

require_once '../class/Trabajador.php';

if(empty($_SESSION['usuario'])){
  header('location: ../index.php');
}else{
  require_once 'variables_session.php';
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
 <?php if(!empty($_GET['backup'])){
      //echo PATH_BACKUP.DB_NAME. "_" . date("d-m-Y_H-i-s") . ".sql";?>
                <div >
                 <em id="msg" style="color: green ; background-color: #FFFFFF"> <b>Se ha realizado el respaldo exitosamente en : <?php echo PATH_BACKUP.DB_NAME. "_" . date("d-m-Y_H-i-s") . ".sql";?> </b></em>
                </div>
                <?php
                unset($_GET['backup']);}?>
<html>
    <head>
        <title>Sistema de Gesti&oacute;n e Inventario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.min.css">
        <link href="../src/dataTable/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="../src/css/estiloss.css" rel="stylesheet" type="text/css">
        <script src="../src/jquery/jquery.js" type="text/javascript"></script>
        <script src="../src/jquery/jquery.validate.min.js" type="text/javascript"></script>
         <script src="../src/js/md5.js" type="text/javascript"></script>
        <script src="../src/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../src/dataTable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
        
    </head>
   <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
              <a class="" href="#"><img height="40px" src="../src/imagenes/iutoms"/></a>
          </div>
          <?php if($rolUsuarioLogueado ==1){?>
            <ul class="nav navbar-nav " >
            <li class=""><a href="inicio.php">Incio</a></li>
            <li><a href="lista_materiales.php">Materiales</a></li>
            <li><a href="lista_herramientas.php">Herramientas</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="">Inventario
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="inventario_entrada.php">Entrada</a></li>
                <li><a href="inventario_salida.php">Salida</a></li> 
                <li><a href="inventario.php">Resumen</a></li> 
              </ul>
            </li>           
            <li><a href="control_prestamo.php">Control de Prestamo</a></li>
            <li><a href="lista_trabajadores.php">Trabajadores</a></li> 
            <li><a href="lista_usuarios.php">Usuarios</a></li> 
            <li><a href="../bd/backup.php">Respaldar Data</a></li> 
          </ul>
          <?php }else{ ?>
            <ul class="nav navbar-nav " >
            <li class=""><a href="inicio.php">Incio</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="">Inventario
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="inventario_entrada.php">Entrada</a></li>
                <li><a href="inventario_salida.php">Salida</a></li> 
                <li><a href="inventario.php">Resumen</a></li> 
              </ul>
            </li>
            <li><a href="control_prestamo.php">Control de Prestamo</a></li>        
          </ul>
          <?php  } ?>

            <ul class="nav navbar-nav navbar-right">
      <li><a href="actualizar_usuario.php"><span class="glyphicon glyphicon-user"></span> <?php echo $nombreLogueado;?></a></li>
      <li><a href="logout.php" id="btnSalir" ><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    </ul>
        </div>
    </nav>
   