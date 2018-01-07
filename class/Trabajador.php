<?php

require_once "Modelo.php";


/**
 * Description of Herramienta
 *
 * @author Arkam
 */
class Trabajador extends Modelo{
    public $tabla = "trabajador";
    public $id;
    public $ci;
    public $nombre;
    public $apellido;
    public $cargo;
    public $telefono;
    public $direccion;

    public function __construct($nombre=" ",$apellido= " ", $ci=" ",$cargo=" ",$telefono=" ",$direccion=" ",$id=" ") 
    { 
      $this->nombre    = $nombre;
      $this->apellido  = $apellido;
      $this->ci        = $ci;
      $this->cargo     = $cargo;
      $this->telefono  = $telefono;
      $this->direccion = $direccion;  
      $this->id        = $id;

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
     * Gets the value of cargo.
     *
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Sets the value of cargo.
     *
     * @param mixed $cargo the cargo
     *
     * @return self
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Gets the value of telefono.
     *
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Sets the value of telefono.
     *
     * @param mixed $telefono the telefono
     *
     * @return self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Gets the value of direccion.
     *
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Sets the value of direccion.
     *
     * @param mixed $direccion the direccion
     *
     * @return self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getAll($plus =" "){
        if($plus != " "){
        $this->query="SELECT * From ".$this->tabla." 
                        WHERE id_trabajador not in (Select id_trabajador from usuario) #and estatus != 6";         
        }else{
        $this->query="SELECT ".$this->tabla.".*, e.descripcion as status, cargo.descripcion as cargo From ".$this->tabla." 
                        INNER JOIN estatus e on e.id_estatus = ".$this->tabla.".estatus
                        INNER JOIN cargo on cargo.id_cargo = ".$this->tabla.".id_cargo #WHERE estatus != 6";
        
        }

    $this->get_results_from_query();  
    $trabajadores = $this->rows;
    return $trabajadores;
    

    }
     

    public function buscar($idTrabajador='') {  
        if($idTrabajador !=''):  
            $this->query= " SELECT * FROM ".$this->tabla." WHERE id_trabajador = ".$idTrabajador.""; 
            $this->get_results_from_query();  
        endif; 
        $trabajador = $this->rows;
    
        return $trabajador;
        
    } 

    public function guardar() {  
        if($this->id !=" "){//Modificar
             $this->query = "UPDATE  ".$this->tabla." SET nombre='".$this->nombre."',apellido='".$this->apellido."',ci='".$this->ci."',id_cargo='".$this->cargo."',telefono = '".$this->telefono."',direccion ='".$this->direccion."' WHERE id_trabajador = '".$this->id."'";
             
        $msg = $this->execute_single_query(); 
        echo $msg;

        }else{

           $this->query= " SELECT * FROM ".$this->tabla." WHERE ci = '".$this->ci."' "; 
            $this->get_results_from_query(); 

            if(count($this->rows)==0) { 
                $this->query = "INSERT INTO ".$this->tabla." (nombre,apellido,ci,id_cargo,telefono,direccion)
                    VALUES
                ('".$this->nombre."','".$this->apellido."',$this->ci,   '".$this->cargo."', '".$this->telefono."', '".$this->direccion."' )";
                
                $msg = $this->execute_single_query(); 
                echo $msg;
                 
            }else{ 
                echo "0";
            } 

        


        }
        
        

    } 

    public function eliminar($idTrabajador='') {
      $this->query= " UPDATE  ".$this->tabla." set estatus = 6 WHERE id_trabajador = ".$idTrabajador.""; 
      $msg = $this->execute_single_query();  

      echo $msg;
    } 

    function __destruct() {  
        unset($this);  

    }

   
}
