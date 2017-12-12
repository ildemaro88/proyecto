<?php

$x= 9;
$y = 12;

/*if(){
   si esa condicion es verdadera sale esto
}else {
   si esa condicion es falsa sale esto 
}
*/
$x == $y ? $c = "si son iguales" :$c = "no son iguales";
# mostrar lo del of compacto 
echo($c);


#SENTENCIA SWITCH
/*
stich(){
    case'':
        LO QUE PASA CUANDO ESTE SEA EL ELEMENTO 
        break;
    default'':
        LO QUE PASA SI NO CONSIGIO NUNCA EL ELEMENTO
        break;
   }
*/

$nombre = "12";

switch ($nombre){
    case 'prinick':
        echo ("el nombre encontrado fue " .$nombre ."para este primer caso");
        break;
    case 'jose':
        echo ("el nombre encotrado fue ".$nombre .     "para este primer caso");
        break;
    default :
        echo ("ninguno de los anteriores casos era");
         break;
        
}      
?>

