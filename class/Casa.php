<?php

require_once "Modelo.php";


/**
 * Description of Herramienta
 *
 * @author Arkam
 */
class Casa extends Modelo{
    public $tabla = "casa";
    public $nombre;
    public $cantidad;
    
     public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function getAll(){
        $sql="SELECT * From casa";
       
       if (!$result = $this->_db->query($sql)) {
        // ¡Oh, no! La consulta falló. 
        echo "Lo sentimos, este sitio web está experimentando problemas.";

        // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
        // cómo obtener información del error
        echo "Error: La ejecución de la consulta falló debido a: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $this->_db->errno . "\n";
        echo "Error: " . $this->_db->error . "\n";
        exit;
    }
    $casas  = $result->fetch_all(MYSQLI_ASSOC);
    mysqli_close($this->_db);
    
    return $casas;
    

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
