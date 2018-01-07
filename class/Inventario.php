<?php

require_once "Modelo.php";


/**
 * Description of Herramienta
 *
 * @author Arkam
 */
class Inventario extends Modelo{
    public $tabla = "inventario";
    public $tipoTransaccion;
    public $id;
    public $total;
    public $idRecibe;
    public $recurso;
    public $estatus;
    
     public function __construct($recurso = " ",$total = " ",$tipoTransaccion=" ",$idRecibe=" ", $id = " ", $estatus =" ") 
    { 
        $this->recurso          = $recurso;
        $this->total            = $total;
        $this->id               = $id;
        $this->tipoTransaccion  = $tipoTransaccion;
        $this->idRecibe         = $idRecibe;
        $this->estatus          = $estatus;
    } 

    public function getAll(){
        $this->query="SELECT i.total AS disponible,
                        SUM(p.cantidad) AS prestado,
                        (i.total + SUM(p.cantidad)) AS total,
                        r.nombre,
                        tr.descripcion AS tipo                      
                        FROM ".$this->tabla." i
                        INNER JOIN recurso r  ON r.id_recurso = i.id_recurso
                        LEFT JOIN prestamo p ON p.id_recurso = r.id_recurso AND p.estatus =4
                        INNER JOIN tipo_recurso tr ON tr.id_tipo_recurso = r.id_tipo_recurso
                        GROUP BY i.total, r.nombre, tr.descripcion 
                        ORDER BY prestado DESC";

        $this->get_results_from_query();  
    
        $inventario = $this->rows;
        return $inventario;


    }


      public function buscar($idRecurso='',$simple =" ") {  
        if($idRecurso !=' '){
            if($simple != ' '){
                $this->query= " SELECT * FROM ".$this->tabla." WHERE id_recurso = $idRecurso "; 
                $this->get_results_from_query();
            }else{
                $this->query= " SELECT IFNULL(i.total,0) as total,
                                       r.nombre as nombre
                                FROM recurso r
                                LEFT JOIN ".$this->tabla." i on r.id_recurso = i.id_recurso
                                WHERE r.id_recurso = $idRecurso "; 
                $this->get_results_from_query();
                $json = json_encode($this->rows);
       
                echo $json;
            }  
        }
        /*$recurso = json_encode($this->rows);
       
        echo $recurso;*/
        
    } 

    public function guardar() {  

        
             
            $this->buscar($this->recurso,"simple"); 
            $totalRecibido = $this->total;

            if(count($this->rows) != 0) { 
               if ($this->tipoTransaccion == 1){

                    $this->total = $this->rows[0]['total']+$this->total;
                }else{

                    $this->total = $this->rows[0]['total']-$this->total;
                }

            }
                $this->query = "INSERT INTO ".$this->tabla." (id_recurso,total)
                VALUES
                ('".$this->recurso."','".$this->total."')
                ON DUPLICATE KEY 
                      UPDATE
                      total='".$this->total."'
                ";                     
                $msg = $this->execute_single_query(); 
                $this->query = "INSERT INTO  transaccion_recurso (id_recurso,id_usuario,id_tipo_transaccion,cantidad)
                            VALUES 
                            ('".$this->recurso."',1,'".$this->tipoTransaccion."','".$totalRecibido."')";
                    $msg = $this->execute_single_query(); 
                if($this->idRecibe != " "){
                
                $this->query = "INSERT INTO  prestamo (id_trabajador,id_recurso,cantidad,estatus)
                            VALUES 
                            ('".$this->idRecibe."','".$this->recurso."','".$totalRecibido."','".$this->estatus."')";
                    $msg = $this->execute_single_query(); 
                }
                echo $msg;

        

               

    } 

    public function eliminar($idMaterial=' ') {
      $this->query= " DELETE FROM ".$this->tabla." WHERE id_material = '$idMaterial'"; 
      $msg = $this->execute_single_query();  

      echo $msg;
    } 

    function __destruct() {  
        unset($this);  

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

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of total.
     *
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Sets the value of total.
     *
     * @param mixed $total the total
     *
     * @return self
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Gets the value of tipoRecurso.
     *
     * @return mixed
     */
    public function getTipoRecurso()
    {
        return $this->tipoRecurso;
    }

    /**
     * Sets the value of tipoRecurso.
     *
     * @param mixed $tipoRecurso the tipo recurso
     *
     * @return self
     */
    public function setTipoRecurso($tipoRecurso)
    {
        $this->tipoRecurso = $tipoRecurso;

        return $this;
    }

    /**
     * Gets the value of recurso.
     *
     * @return mixed
     */
    public function getRecurso()
    {
        return $this->recurso;
    }

    /**
     * Sets the value of recurso.
     *
     * @param mixed $recurso the recurso
     *
     * @return self
     */
    public function setRecurso($recurso)
    {
        $this->recurso = $recurso;

        return $this;
    }
}
