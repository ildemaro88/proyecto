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
    $this->_db= new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
     //$this->_db = pg_connect(DB_HOST, 5432,DB_NAME,DB_USER,DB_PASS) or die ("Error de conexion. ". pg_last_error());

     if ( $this->_db->connect_errno ) 
        { 
            echo "Fallo al conectar a MySQL: ". $this->_db->connect_error; 
            return;     
        }

        $this->_db->set_charset(DB_CHARSET);  

 } 
# Desconectar la base de datos
 private function close_connection() {  
    $this->_db->close();  
} 
# Ejecutar un query simple del tipo INSERT, DELETE, UPDATE 
protected function execute_single_query() { 
    $this->open_connection();  
    if ($this->_db->query($this->query) === TRUE) {
        $msg = "Operación exitosa";
        $this->lastID= $this->_db->insert_id;

    } else {
        $msg = "Error: " .$this->query . "<br>" . $this->_db->error;
    }
     
    $this->close_connection();  

    return $msg;
} 
# Traer resultados de una consulta en un Array 
protected function get_results_from_query() {  
    $this->open_connection();  
    //$result = $this->_db->query($this->query);  
    if (!$result = $this->_db->query($this->query)) {
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

    $this->rows= $result->fetch_all(MYSQLI_ASSOC);
    $result->close();  
    $this->close_connection();

}
}
