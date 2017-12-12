<?php

require_once "Modelo.php";


/**
 * Description of Herramienta
 *
 * @author Arkam
 */
class Rol extends Modelo{
    public $tabla = "rol";
    public $id;
    public $descripcion;
    
     public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function getAll(){
        $this->query="SELECT * From rol";

        $this->get_results_from_query();  
    
        $rols = $this->rows;

    return $rols;
 
    

    }
    
    
   /*  public function guardar($sql = ""){
        
    if ($this->_db->query($sql) === TRUE) {
        $msg = "New record created successfully";
    } else {
        $msg = "Error: " . $sql . "<br>" . $this->_db->error;
    }

    mysqli_close($this->_db);
    
    echo $msg;
        
    }*/

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
