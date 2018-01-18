<?php

require_once '../class/Bitacora.php';
require_once '../class/Cargo.php';
require_once 'menu.php';

$bitacoras = new Bitacora();
$bitacoras = $bitacoras->getAll();


?>

<body>
    <h1>Bitácora</h1>
   <br/>
    
        <div class="container">
            <div class="pull-right">
                <button class="btn btn-primary hidden" id="btnNuevo"> Nuevo</button>
            </div>
            <div>
             <!--div class="pull-right col-md-1 ">
                <a href=<?php echo (count($prestamos)>0)?"../reportes/reportePrestamo.php":"#";?> class="btn btn-warning" id="btnExportar"> Exportar</a>
            </div-->

            </div>
            <br/><br/><br/>
        <div class="container">
            <table id="bitacora" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Trabajador</th> 
                <th>Telefono</th> 
                <th>Nombre Usuario</th>                 
                <th>Acción</th>
                <th>Fecha</th>
                
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Trabajador</th> 
                <th>Telefono</th> 
                <th>Nombre Usuario</th>                 
                <th>Acción</th>
                <th>Fecha</th>
                
            </tr>
        </tfoot>
        <?php if(!empty($bitacoras)){ ?>
        <tbody>
            <?php foreach ($bitacoras as $bitacora){ 
     
                ?>
                <tr>
                    <td><?php echo $bitacora['trabajador']; ?></td>
                    <td><?php echo $bitacora['telefono']; ?></td>        
                    <td><?php echo $bitacora['nombre_usuario']; ?></td>
                    <td><?php echo $bitacora['accion']; ?></td>
                    <td><?php echo $bitacora['fecha']; ?></td>
                    
                                

                </tr>
            <?php } ?>
        </tbody>
        <?php } ?>
    </table>
    </div>
           <!-- Modal -->

    
</body>

<script src="../src/js/bitacora.js" type="text/javascript"></script>