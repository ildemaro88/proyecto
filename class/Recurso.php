<?php

require_once "Modelo.php";


/**
 * Description of Recurso
 *
 * @author Arkam
 */
class Recurso extends Modelo{
    public $tabla = "recurso";
    public $id;
    public $nombre;
    public $idTipo;
    
     public function __construct($nombre = " ",  $estatus = " ",$idTipo=" ", $id = " ") 
    { 
        $this->id       = $id;
        $this->nombre   = $nombre;
        $this->estatus  = $estatus;
        $this->idTipo   = $idTipo;
        
    } 

    public function getAll($idTipo=" "){
        if($idTipo != " "){

            $this->query="SELECT * From ".$this->tabla." WHERE id_tipo_recurso = $idTipo and estatus != 6 ";
            $this->get_results_from_query();  
        
            $herramientas = $this->rows;
            return $herramientas;

        }else{
            $this->query="SELECT * From ".$this->tabla." and estatus != 6 ";
            $this->get_results_from_query();  
        
            $herramientas = $this->rows;
            return $herramientas;

        }
    }



    /**
     * Gets the value of nombre.
     *
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Sets the value of nombre.
     *
     * @param mixed $nombre the nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Gets the value of estatus.
     *
     * @return mixed
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Sets the value of estatus.
     *
     * @param mixed $estatus the estatus
     *
     * @return self
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



    public function buscar($idRecurso='') {  
        if($idRecurso !=''):  
            $this->query= " SELECT * FROM ".$this->tabla." WHERE id_recurso = $idRecurso "; 
            $this->get_results_from_query();  
        endif; 
        $recurso = json_encode($this->rows);
       
        echo $recurso;
        
    } 

    public function guardar() {  
        if($this->id !=" "){//Modificar
             $this->query = "UPDATE  ".$this->tabla." SET nombre='".$this->nombre."',estatus='".$this->estatus."' WHERE id_recurso = '".$this->id."'";
             //var_dump($this->query);
        $msg = $this->execute_single_query(); 
        echo $msg;

           
        }else{
            $this->query= " SELECT * FROM ".$this->tabla." WHERE nombre = '".$this->nombre."' and estatus != 6 "; 
            $this->get_results_from_query(); 

            if(count($this->rows)==0) { 
                $this->query = "INSERT INTO ".$this->tabla." (id_tipo_recurso,nombre,estatus)
                VALUES
                ('".$this->idTipo."','".$this->nombre."','".$this->estatus."')
                ";     
                     //var_dump($this->query);
                $msg = $this->execute_single_query(); 
                echo $msg;
                 
            }else{ 
                echo "0";
            } 
           

        }

               

    } 

    public function eliminar($idRecurso=' ') {
        /*$this->query="SELECT * FROM prestamo where id_recurso='$idRecurso' and cantidad >= 1";
        $this->get_results_from_query(); 

            if(count($this->rows)==0) { */
      $this->query= " UPDATE  ".$this->tabla." set estatus = 6 WHERE id_recurso = '$idRecurso'"; 
            
     // var_dump($this->query);
      $msg = $this->execute_single_query();  
       /*     }else{
                echo "0";
            }*/
      echo $msg;
    } 

    function __destruct() {  
        unset($this);  

    }


}