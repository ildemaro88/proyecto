<?php
$nombre=$_post['usuario'];
$clave=$_post['clave'];

//conectar a la base de datos
$conexion=myqli_connect("localhost","root","0268782","prueba");
$consulta="SELECT * FROM usuarios where usuario='$nombre' and clave='$clave'";
$resultado=myqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);
if($filas>0){
    header("bienvenido.html");    
}
else{
    echo "error en la autentificacion";
}
mysqli_free_result($resultado);
mysqli_close($conexion);