<!doctype html>

<?php 
require_once 'class/Login.php';
extract($_POST);
if ((count($_SESSION)>0) and ($_SESSION['error']<1)) {
    header('location: apps/inicio.php');
   
}
if(!empty($usuario)&& !empty($clave)){
   
    
    $Login = new Login();
    $validar = $Login->validarLogin($usuario, $clave);
    //var_dump($validar);
   
    
}

?>
<html lang="en">
<head>
    <title>Sistema de Gesti&oacute;n e Inventario </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1, maximum-scale=1,minimum-scale=1">
        <link rel="stylesheet" href="src/bootstrap/css/bootstrap.min.css">
        <script src="src/jquery/jquery.js" type="text/javascript"></script>
         <script src="src/js/md5.js" type="text/javascript"></script>
         <script src="src/jquery/jquery.validate.min.js" type="text/javascript"></script>
        <script src="src/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="src/css/estilos.css">
</head>
<body>
    <div class="container">
	<div class="col-md-offset-4 col-md-4  col-xs-offset-4 col-xs-6">
            <form action="index.php" method="post" id="formIndex" class="formInicio">    
                <div class="">
                    <h2>Bienvenido</h2>
                </div> 
                <div class="form-group">
                    <div class="">
                        <label for="usuario" class="control-label">Usuario</label>
                        <input type="text" placeholder="Usuario" class="form-control" id="usuario" name="usuario"/>
                    </div>    
                    <div class="">
                        <label for="clave" class="control-label">Contraseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña" id="clave" name="clave"/>
                    </div> 
                </div>
                <?php if(!empty($_SESSION['error'])){?>
                <div >
                 <em id="msg" style="color: red;"> Usuario/Contraseña Incorrectos. Intente de nuevo.</em>
                </div>
                <?php }?>
                <div class="">
                    <input type="submit" class="form-control btn-primary" value="Ingresar">
                </div> 
                
            </form>
        </div>
    </div>    
	
</body>
<script src="src/js/index.js" type="text/javascript"></script>
</html>