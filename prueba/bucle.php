<?php

/*for (VARIABLE;CONDICION;INCREMENTO) {
    LO QUE SE VA A REPETIR
 }
 */


$x = 1;
echo ($x);
echo ("<br/>");

$x++;// x es igual a 2
echo ($x);
echo ("<br/>");
$x++;// x es igual a 3
echo ($x);
echo ("<br/>");
$x++;// x es igual a 3
echo ($x);
echo ("<br/>");
$x++;// x es igual a 3
echo ($x);
echo ("<br/>");
$x++;// x es igual a 3
echo ($x);
echo ("<br/>");$x++;// x es igual a 3
echo ($x);
echo ("<br/>");$x++;// x es igual a 3
echo ($x);
echo ("<br/>");$x++;// x es igual a 3
echo ($x);
echo ("<br/>");$x++;// x es igual a 3
echo ($x);
echo ("<br/>");


echo ("<h1> BUCLE FOR </h1>");
echo ("<br/>");

/*for (VARIABLE;CONDICION;INCREMENTO) {
    LO QUE SE VA A REPETIR
 }
 */

for ($y = 1; $y<=10; $y++){
    echo ($y);
    echo ("<br/>");   
}

 echo ("<br/>");
?>

<html>
    <head>
        <title>Mis bucles</title>
    </head>
    <body>
        <table style="border: 1px solid black;">
        <?php
            for ($z=1; $z <=100;$z++){
            echo ( '<tr style="border: 1px solid black;">');
            echo ( '<td style="border: 1px solid black;">'.$z.'</td>');
            echo ( '<td style="border: 1px solid black;">'.$z.'</td>');
            echo ( '<td style="border: 1px solid black;">'.$z.'</td>');
            echo ( '<td style="border: 1px solid black;">'.$z.'</td>');
            echo ( '<td style="border: 1px solid black;">'.$z.'</td>');
            echo ( '<td style="border: 1px solid black;">'.$z.'</td>');
            echo ( '<td style="border: 1px solid black;">'.$z.'</td>');
            echo ( '<td style="border: 1px solid black;">'.$z.'</td>');
            echo ("</tr>");    
            }
            for ($y=1; $y <=100;$y++){
            echo ( '<tr style="border: 1px solid black;">');
            echo ( '<td style="border: 1px solid black;">'.$y.'</td>');
            echo ( '<td style="border: 1px solid black;">'.$y.'</td>');
            echo ( '<td style="border: 1px solid black;">'.$y.'</td>');
            echo ( '<td style="border: 1px solid black;">'.$y.'</td>');
            echo ( '<td style="border: 1px solid black;">'.$y.'</td>');
            echo ( '<td style="border: 1px solid black;">'.$y.'</td>');
            echo ( '<td style="border: 1px solid black;">'.$y.'</td>');
            echo ( '<td style="border: 1px solid black;">'.$y.'</td>');
            echo ("</tr>");    
            }
        ?>
        </table>
        
    </body>
</html>