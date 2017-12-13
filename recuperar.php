<?php 
require_once 'class/Login.php';
extract($_POST);
unset($_SESSION['recuperar']);
if(!empty($correo)){
   
    
    $Login = new Login();
    $validar = $Login->recuperar($correo);
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
            <form  method="post" id="formRecuperar" class="formInicio">                
            	<div class="pull-left">
            	<a class="btn btn-primary btn btn-xs" href="http://localhost/recom" role="button" aria-label="Delete item 1">< volver</a>
                   
                </div> <br>
                <div class="">
                    <h2>Recuperar Contraseña</h2>
                </div> 
                <div class="form-group">
                    <div class="">
                        <label for="correo" class="control-label">Introduzca el correo electr&oacute;nico asociado a la cuenta</label>
                        <input type="text" placeholder="Correo" class="form-control" id="correo" name="correo"/>
                    </div>    
                </div>
                <?php if(!empty($_SESSION['recuperar']) && $_SESSION['recuperar'] == 2){  ?>
                <div >
                 <em id="msg" style="color: red;"> El correo no está asociado a ninguna cuenta. Intente de nuevo.</em>
                </div>
                <?php }if(!empty($_SESSION['recuperar']) && $_SESSION['recuperar'] == 1){  ?>
				<div >
                 <p id="msg" style="color: green;">Se ha enviado un correo a su cuenta asociada. <a href="http://localhost/recom">Iniciar Sesión</a></p>
                </div>
                <?php } ?>
                    <div class="form-group">
                    <input type="submit" class="form-control btn-success" value="Recuperar">
                </div> 
                
            </form>
        </div>
    </div>    
	
</body>
<script src="src/js/index.js" type="text/javascript"></script>
</html>