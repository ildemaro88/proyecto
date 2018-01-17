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

<html>
    <head>
        <title>Sistema de Gesti&oacute;n e Inventario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.min.css">
        <link href="../src/dataTable/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="../src/dataTable/media/css/buttons.bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../src/css/estiloss.css" rel="stylesheet" type="text/css">
        <link href="../src/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
        <script src="../src/jquery/jquery.js" type="text/javascript"></script>
        <script src="../src/jquery/jquery.validate.min.js" type="text/javascript"></script>
         <script src="../src/js/md5.js" type="text/javascript"></script>
        <script src="../src/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../src/dataTable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../src/dataTable/media/js/dataTables.buttons.min.js" type="text/javascript"></script>
        <script src="../src/dataTable/media/js/buttons.bootstrap.min.js" type="text/javascript"></script>
        <script src="../src/dataTable/media/js/jszip.min.js" type="text/javascript"></script>
        <script src="../src/dataTable/media/js/pdfmake.min.js" type="text/javascript"></script>
        <script src="../src/dataTable/media/js/vfs_fonts.js" type="text/javascript"></script>
        <script src="../src/dataTable/media/js/buttons.html5.min.js" type="text/javascript"></script>
        <script src="../src/dataTable/media/js/buttons.print.min.js" type="text/javascript"></script>
        <script src="../src/dataTable/media/js/buttons.colVis.min.js" type="text/javascript"></script>
        <script src="../src/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
        <script src="../src/js/app.js" type="text/javascript"></script>
        <script src="../src/chart/Chart.min.js" type="text/javascript"></script>

        
        
    </head>
   <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
              <a class="" href="#"><img height="40px" src="../src/imagenes/iutoms.jpg"/></a>
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
                <li><a href="inventario_solicitudes.php">Solicitudes</a></li>
                <li><a href="inventario_entrada.php">Entrada</a></li>
                <li><a href="inventario_salida.php">Salida</a></li> 
                <li><a href="inventario.php">Resumen</a></li> 
              </ul>
            </li>           
            <li><a href="control_prestamo.php">Control de Prestamo</a></li>
            <li><a href="lista_trabajadores.php">Trabajadores</a></li> 
            <li><a href="lista_usuarios.php">Usuarios</a></li> 
            <li><a href="../bd/backup.php">Respaldar Data</a></li> 
            <li><a href="bitacora.php">Bitácora</a></li>
          </ul>
          <?php }else{ ?>
            <ul class="nav navbar-nav " >
            <li class=""><a href="inicio.php">Incio</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="">Inventario
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="inventario_solicitud.php">Solicitudes</a></li>
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
    <?php if(isset($_SESSION['backup']) && $_SESSION['backup'] == "true"){
      //echo PATH_BACKUP.DB_NAME. "_" . date("d-m-Y_H-i-s") . ".sql";?>
                <div >
              
                <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Excelente!</strong> Se ha realizado el respaldo exitosamente en : <?php echo PATH_BACKUP.DB_NAME. "_" . date("d-m-Y_H-i-s") . ".sql";?>.
</div>
                 
                </div>
                <?php
                $_SESSION['backup'] = "false";
                }?>