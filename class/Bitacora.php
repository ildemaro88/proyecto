<?php 
require_once "Modelo.php";


/**
 * Description of Bitacora
 *
 * @author Arkam
 */
class Bitacora extends Modelo{
    public $tabla = "bitacora";
    public $id;
    public $idTrabajador;
    public $idRecurso;
    public $cantidad;
   
    
    public function __construct($idTrabajador=" ", $idRecurso=" ", $cantidad=" ", $fechaSalida=" ",$estatus=" ",$id=" ", $fechaEntrada=" "){
    	$this->idTrabajador = $idTrabajador;
    	$this->idRecurso	= $idRecurso;
    	$this->cantidad		= $cantidad;
    	$this->fechaEntrada	= $fechaEntrada;
    	$this->fechaSalida	= $fechaSalida;
    	$this->id     		= $id; 
        $this->estatus      = $estatus;
        
    } 


    public function getAll(){
        $this->query="SELECT CONCAT_WS(' ',t.nombre,t.apellido) AS trabajador,
               t.telefono,
               u.usuario as nombre_usuario,
               b.accion,
               b.created_at as fecha
               

              FROM bitacora b
              INNER JOIN usuario u on b.id_usuario = u.id_usuario
              INNER JOIN trabajador t on u.id_trabajador = t.id_trabajador
              ORDER BY b.created_at DESC
                            ";      

        $this->get_results_from_query();  
	    $bitacoras = $this->rows;
	    return $bitacoras;   
       
    }   

    public function getSolicitudesAprobadas(){
        $this->query="SELECT CONCAT_WS(' ',t.nombre,t.apellido) AS responsable,
               t.telefono,
               t.ci,
               r.nombre AS recurso,              
               p.cantidad,
               r.id_tipo_recurso AS tipo,
               p.estatus,
               p.fecha_salida AS fecha,
                             p.fecha_entrada AS fechae,
               e.descripcion AS estatus,
               p.id_prestamo

              FROM ".$this->tabla." p
              INNER JOIN trabajador t on t.id_trabajador = p.id_trabajador
              INNER JOIN recurso r on r.id_recurso = p.id_recurso
              INNER JOIN estatus e ON e.id_estatus = p.estatus
              WHERE p.estatus = 8
                            ";      

        $this->get_results_from_query();  
      $prestamos = $this->rows;
      return $prestamos;   
       
    } 

    public function getSolicitudesPendientes(){
        $this->query="SELECT CONCAT_WS(' ',t.nombre,t.apellido) AS responsable,
               t.telefono,
               t.ci,
               r.nombre AS recurso,              
               p.cantidad,
               r.id_tipo_recurso AS tipo,
               p.estatus,
               p.fecha_salida AS fecha,
                             p.fecha_entrada AS fechae,
               e.descripcion AS estatus,
               p.id_prestamo

              FROM ".$this->tabla." p
              INNER JOIN trabajador t on t.id_trabajador = p.id_trabajador
              INNER JOIN recurso r on r.id_recurso = p.id_recurso
              INNER JOIN estatus e ON e.id_estatus = p.estatus
              WHERE p.estatus = 7
                            ";      

        $this->get_results_from_query();  
      $prestamos = $this->rows;
      return $prestamos;   
       
    } 


    public function buscar($idPrestamo='') {  
        $this->query="SELECT CONCAT_WS(' ',t.nombre,t.apellido) AS responsable,
							 t.telefono,
							 r.nombre AS herramienta,
							 p.id_recurso,
               p.estatus,
							 p.cantidad,
							 p.fecha_salida AS fecha,
                             p.estatus id_estatus,
							 e.descripcion AS estatus,
							 p.id_prestamo

							FROM ".$this->tabla." p
							INNER JOIN trabajador t on t.id_trabajador = p.id_trabajador
							INNER JOIN recurso r on r.id_recurso = p.id_recurso
							INNER JOIN estatus e ON e.id_estatus = p.estatus 
							WHERE p.estatus != 7 and p.estatus !=8 AND p.id_prestamo=".$idPrestamo."";      

        $this->get_results_from_query();  
	    $prestamo = $this->rows;
	    $prestamo[0]['fecha'] = date("d/m/Y",strtotime($prestamo[0]['fecha']));
	    return $prestamo;   
        
    } 

    public function guardar() {  
        if($this->id !=" "){//Modificar
        //$this->fechaEntrada = ($this->fechaEntrada == " ")?null: $this->fechaEntrada;   
       
        
        if($this->estatus == 4){
             $this->query = "UPDATE  ".$this->tabla." SET estatus=".$this->estatus.", fecha_salida = fecha_salida, fecha_entrada=".$this->fechaEntrada." WHERE id_prestamo = '".$this->id."'";
             $msg = $this->execute_single_query(); 

              if($msg == "Operación exitosa"){
                         $this->query = "INSERT INTO bitacora (id_usuario,accion)
                    VALUES
                    (".$_SESSION['idUsuario'].",'Actualiza  el estatus del Prestamo id: ".$this->id."')
                    ";     
                    
                    $this->execute_single_query(); 
                    }
             //var_dump($this->query);
            $this->query = "UPDATE  inventario SET total=total-".$this->cantidad." WHERE id_recurso = '".$this->idRecurso."'";
            $this->execute_single_query();
        }else{
             $this->query = "UPDATE  ".$this->tabla." SET estatus=".$this->estatus.",  fecha_entrada='".$this->fechaEntrada."' WHERE id_prestamo = '".$this->id."'";
             $msg = $this->execute_single_query(); 
             if($msg == "Operación exitosa"){
                         $this->query = "INSERT INTO bitacora (id_usuario,accion)
                    VALUES
                    (".$_SESSION['idUsuario'].",'Actualiza  el estatus del Prestamo id: ".$this->id."')
                    ";     
                    
                    $this->execute_single_query(); 
                    }
             //var_dump($this->query);

             $this->query = "UPDATE  inventario SET total=total+".$this->cantidad." WHERE id_recurso = '".$this->idRecurso."'";
        }     
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
                if($msg == "Operación exitosa"){
                         $this->query = "INSERT INTO bitacora (id_usuario,accion)
                    VALUES
                    (".$_SESSION['idUsuario'].",'Guarda el Prestamo id: ".$this->lastID."')
                    ";     
                    
                    $this->execute_single_query(); 
                    }
                echo $msg;
                 
            }else{ 
                echo "0";
            } 

        }
 

    } 

    public function editar($user_data=array()) {  
        foreach ($user_data as $campo=>$valor):  
            $$campo = $valor;
        endforeach;  
        $this->query= " UPDATE usuarios SET nombre='$nombre',apellido='$apellido',clave='$clave'WHERE email = '$email'"; 
        $this->execute_single_query();  
    } 

    public function eliminar($idPrestamo='') {
         $this->query= " SELECT * FROM ".$this->tabla." WHERE id_prestamo =  '".$idPrestamo."' "; 
         $this->execute_single_query(); 
         $cantidad = $this->rows[0]['cantidad'];
     $this->query= " UPDATE  ".$this->tabla." set estatus=6 WHERE id_prestamo = ".$idPrestamo.""; 

      $msg = $this->execute_single_query();  
      if($msg == "Operación exitosa"){
                         $this->query = "INSERT INTO bitacora (id_usuario,accion)
                    VALUES
                    (".$_SESSION['idUsuario'].",'Elimina el Prestamo id: ".$idPrestamo."')
                    ";     
                    
                    $this->execute_single_query(); 
                    }
      $this->query = "UPDATE  inventario SET total=total+".$this->cantidad." WHERE id_recurso = '".$this->idRecurso."'";
      $msg = $this->execute_single_query(); 
      echo $msg;
    }        

    public function entregar($idPrestamo='',$tipo) {
         $this->query= " SELECT * FROM ".$this->tabla." WHERE id_prestamo =  '".$idPrestamo."' "; 
         $this->execute_single_query(); 
         $cantidad = $this->rows[0]['cantidad'];
         $estatus= ($tipo == '1')?'4':'5';
         
     $this->query= " UPDATE  ".$this->tabla." set estatus=".$estatus.", fecha_salida= NOW() WHERE id_prestamo = ".$idPrestamo.""; 

      $msg = $this->execute_single_query();  
      if($msg == "Operación exitosa"){
                         $this->query = "INSERT INTO bitacora (id_usuario,accion)
                    VALUES
                    (".$_SESSION['idUsuario'].",'Entrega el Prestamo id: ".$idPrestamo."')
                    ";     
                    
                    $this->execute_single_query(); 
                    }
      $this->query = "UPDATE  inventario SET total=total-".$this->cantidad." WHERE id_recurso = '".$this->idRecurso."'";
      $msg = $this->execute_single_query(); 
      echo $msg;
    }     


    public function aprobar($idPrestamo='',$tipo) {
         
     $estatus= '8';
         
     $this->query= " UPDATE  ".$this->tabla." set estatus=".$estatus.", fecha_salida= NOW() WHERE id_prestamo = ".$idPrestamo.""; 

      $msg = $this->execute_single_query();  
      if($msg == "Operación exitosa"){
                         $this->query = "INSERT INTO bitacora (id_usuario,accion)
                    VALUES
                    (".$_SESSION['idUsuario'].",'Aprueba el Prestamo id: ".$idPrestamo."')
                    ";     
                    
                    $this->execute_single_query(); 
                    }
      echo $msg;
    }      

    public function rechazar($idPrestamo='',$tipo) {
         
     $estatus= '9';
         
     $this->query= " UPDATE  ".$this->tabla." set estatus=".$estatus.", fecha_salida= NOW() WHERE id_prestamo = ".$idPrestamo.""; 

      $msg = $this->execute_single_query();  

      if($msg == "Operación exitosa"){
                         $this->query = "INSERT INTO bitacora (id_usuario,accion)
                    VALUES
                    (".$_SESSION['idUsuario'].",'Rechaza el Prestamo id: ".$idPrestamo."')
                    ";     
                    
                    $this->execute_single_query(); 
                    }
      echo $msg;
    }              
}
?>