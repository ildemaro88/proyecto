<?php
Session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Modelo
 *
 * @author Arkam
 */
require_once "/../config/config.php";

// Incluimos la clase swift
require '/../swiftmailer/lib/swift_required.php';

abstract class Modelo {
    
    protected $_db; 
    protected $rows;
    protected $lastID;

    public function __construct() 
    { 
       
    } 


    # métodos abstractos para ABM de clases que hereden
    abstract protected function    buscar(); 
    abstract protected function    guardar(); 
    abstract protected function    eliminar(); 


    # Conectar a la base de datos
 private function open_connection() {  
   
	$conn_string = "host=".DB_HOST." port=".PORT." dbname=".DB_NAME." user=".DB_USER." password=".DB_PASS." options='--client_encoding=UTF8'";

	
	$this->_db = pg_connect($conn_string)or die('No se ha podido conectar: ' . pg_last_error());
	

 } 
# Desconectar la base de datos
 private function close_connection() {  
    pg_close($this->_db);  
} 
# Ejecutar un query simple del tipo INSERT, DELETE, UPDATE 
protected function execute_single_query() { 
    $this->open_connection();  
	$result = pg_query($this->_db,$this->query);
	
    if ($result == TRUE) {
        $msg = "Operación exitosa";
		$row = pg_fetch_row($result); 
        $this->lastID= $row['0'];

    } else {
        $msg = "Error: " .$this->query . "<br>" . pg_last_error();
    }
     
    $this->close_connection();  

    return $msg;
} 
# Traer resultados de una consulta en un Array 
protected function get_results_from_query() {  
    $this->open_connection();  
      
    if (!$result = pg_query($this->_db,$this->query)) {
        // ¡Oh, no! La consulta falló. 
        echo "Lo sentimos, este sitio web está experimentando problemas.";

        // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
        // cómo obtener información del error
        echo "Error: La ejecución de la consulta falló debido a: \n";
        echo "Query: " . $this->query . "\n";
        echo "Errno: " . $this->_db->errno . "\n";
        echo "Error: " . $this->_db->error . "\n";
        exit;
    }

    $this->rows= pg_fetch_all($result);
    pg_free_result($result);  
    $this->close_connection();

}
}
