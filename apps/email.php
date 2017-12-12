<?php
// Incluimos la clase swift
require '../swiftmailer/lib/swift_required.php';


$miServidor = gethostbyname('smtp.gmail.com');
$miPuertoSMTP = 465;
$miUsuario = "proyecto7121@gmail.com";
$miPassword = "proyecto.7121";

 // Configuración del mensaje
$miDestinatario	= array('josechino0802@gmail.com');
$miSubject ="Probando22 correo";
$mensaje="<b>Usuario Registrado: </b> Usuario X."; 

$transport = Swift_SmtpTransport::newInstance($miServidor, 465, 'ssl') // Puerto de salida SMTP
	->setUsername("proyecto7121@gmail.com")
	->setPassword("proyecto.7121");
	 
	// Inicializamos swiftmailer
	$mailer = Swift_Mailer::newInstance($transport);
	 
	// Instanciamos el mensaje
	$message = Swift_Message::newInstance()
	 
	// Asunto del mensaje
	->setSubject($miSubject)
	 
	// Especificamos el remitente
	->setFrom(array($miUsuario => 'Usuario Registrado'))
	 
	// Especificamos el destinatario
	->setTo($miDestinatario)

	//Copias 
	//->setCc($cc)

	//Copias ocultas
	//->setBcc($bcc)
	 
	// Especificamos el cuerpo del mensaje indicando que es en formato HTML en el segundo parámetro
	->setBody($mensaje,'text/html')
	  
	;
        
	$result = $mailer->send($message);
        
        if($result){
            echo "OK";
        }else{
            echo "1K";
        }
        