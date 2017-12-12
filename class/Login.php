<?php
require_once "Modelo.php";


/**
 * Description of Login
 *
 * @author Arkam
 */
class Login extends Modelo {
    
    private $tabla = "usuario";
    
    public function __construct() 
    { 
        parent::__construct(); 
    } 


    public function validarLogin($usuario,$clave){                
        
       $this->query="SELECT * From usuario where usuario='".$usuario."' and clave = '".md5($clave)."' and usuario.estatus = 1";
       
       $this->get_results_from_query();
       $login = $this->rows;
         
    // ¡Uf, lo conseguimos!. Sabemos que nuestra conexión a MySQL y nuestra consulta
    // tuvieron éxito, pero ¿tenemos un resultado?
    if (count($login)=== 0) {
        // ¡Oh, no ha filas! Unas veces es lo previsto, pero otras
        // no. Nosotros decidimos. En este caso, ¿podría haber sido
        // actor_id demasiado grande? 
       // echo "Lo sentimos. No se pudo encontrar una coincidencia. Inténtelo de nuevo.";
         //header('location: index.php?error=1');
        $_SESSION["error"] = 1;
    }else{
    
    // Ahora, sabemos que existe solamente un único resultado en este ejemplo, por lo
    // que vamos a colocarlo en un array asociativo donde las claves del mismo son los
    // nombres de las columnas de la tabla
    //var_dump($login[0]); //exit();
    
    $_SESSION["usuario"] = $login[0]['usuario'];
    $_SESSION["idTrabajador"] = $login[0]['id_trabajador'];
    $_SESSION["idUsuario"] = $login[0]['id_usuario'];
    $_SESSION["rol"] = $login[0]['id_rol'];
    $_SESSION["correo"] = $login[0]['correo'];


    session_write_close();
    }
    header('location: apps/inicio.php');
           
    }

    public function logout(){
        if(isset($_SESSION['usuario'])){
        unset($_SESSION['usuario']);
    }

        session_destroy();
         header('location: apps/inicio.php');
    }

     public function buscar($user_email='') {  
        if($user_email !=''):  
            $this->query= " SELECT id, nombre, apellido, email, claveFROM usuariosWHERE email = '$user_email'"; 
            $this->get_results_from_query();  
        endif; 
        if(count($this->rows) == 1):  
            foreach ($this->rows[0] as $propiedad=>$valor):  
                $this->$propiedad = $valor;  
            endforeach; 
        endif; 
    } 

    public function guardar($sql="") {  
        $this->query= $sql; 
        $msg = $this->execute_single_query(); 
        echo $msg;


    } 

    public function editar($user_data=array()) {  
        foreach ($user_data as $campo=>$valor):  
            $$campo = $valor;
        endforeach;  
        $this->query= " UPDATE usuariosSET nombre='$nombre',apellido='$apellido',clave='$clave'WHERE email = '$email'"; 
        $this->execute_single_query();  
    } 

    public function eliminar($user_email='') {
      $this->query= " DELETE FROM usuariosWHERE email = '$user_email'"; 
      $this->execute_single_query();  
    } 

    function __destruct() {  
        unset($this);  

    }

    
        
}
