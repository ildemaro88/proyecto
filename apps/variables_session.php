<?php 

  $trabajador = new Trabajador();
  //var_dump($_SESSION);

  $idTrabajadorLogueado = $_SESSION['idTrabajador'];
  $trabajador = $trabajador->buscar($idTrabajadorLogueado);
  $_SESSION['nombre'] = $trabajador[0]['nombre'].' '.$trabajador[0]['apellido'];

  $nombreLogueado =  $_SESSION['nombre'];
  $usuarioLogueado = $_SESSION['usuario'];
  $idUsuarioLogueado = $_SESSION['idUsuario'];
  $rolUsuarioLogueado = $_SESSION['rol'];
  $correoUsuarioLogueado = $_SESSION['correo'];