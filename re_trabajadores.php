<!doctype html>

<?php 
extract($_POST);

if(!empty($usuario)&& !empty($clave)){
    require_once 'class/Login.php';
    
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
        <link rel="stylesheet" href="src/css/estilos_1.css">
</head>
<body>
    <div class="container">
	<div class=" col-md-offset-4 col-md-4">
            <form action="index.php" method="post" class="formInicio">    
                <div class="">
                    <h2>Registrar Trabajador</h2>
                </div> 
                <div class="form-group">
                    <div class="">
                        <label for="usuario" class="">Nombre</label>
                        <input type="text" placeholder="Nombre Del Trabajador" class="form-control" name="usuario"/>
                    </div>  
                    <div class="">
                        <label for="usuario" class="">Cargo</label>
                        <input type="text" placeholder="Cargo Ejercido" class="form-control" name="usuario"/>
                    </div>    
                    <div class="">
                        <label for="clave" class="">telefono</label>
                        <input type="password" class="form-control" placeholder="Telefono Del Trabajador" name="clave"/>
                    </div> 
                    <div class="">
                        <label for="clave" class="">direccion</label>
                        <input type="password" class="form-control" placeholder="Direccion Del Trabajador" name="clave"/>
                    </div> 
                </div>
                <div class="">
                    <input type="submit" class="form-control btn-primary" value="Ingresar">
                </div> 
                
            </form>
        </div>
    </div>    
	
</body>
<script src="src/bootstrap/js/bootstrap.min.js" ></script>
</html>