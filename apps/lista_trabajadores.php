<?php

require_once '../class/Trabajador.php';
require_once '../class/Cargo.php';
require_once 'menu.php';

$trabajadores = new Trabajador();
$trabajadores = $trabajadores->getAll();
$cargos = new Cargo();
$cargos = $cargos->getAll();


?>

<body>
    <h1>Trabajadores</h1>
   <br/>
    
        <div class="container">
            <div class="pull-right">
                <button class="btn btn-primary" id="btnNuevo"> Nuevo</button>
            </div>
            <div>
             <div class="pull-right col-md-2 ">
                <a href="../reportes/reporteTrabajadores.php" class="btn btn-warning" id="btnExportar"> Exportar</a>
            </div>

            </div>
            <br/><br/><br/>
        <div class="container">
            <table id="trabajadores" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>C&eacute;dula</th> 
            	<th>Nombre</th> 
                <th>Apellido</th>                 
                <th>Cargo</th>
                <th>Tel&eacute;fono</th>
                <th>Estatus</th>
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>C&eacute;dula</th>
                <th>Nombre</th> 
                <th>Apellido</th>                
                <th>Cargo</th>
                <th>Tel&eacute;fono</th>
                <th>Estatus</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
        <?php if(!empty($trabajadores)){ ?>
        <tbody>
            <?php foreach ($trabajadores as $trabajador){ 
     
                ?>
                <tr>
                    <td><?php echo $trabajador['ci']; ?></td>
                    <td><?php echo $trabajador['nombre']; ?></td>        
                    <td><?php echo $trabajador['apellido']; ?></td>
                    <td><?php echo $trabajador['cargo']; ?></td>
                     <td><?php echo $trabajador['telefono']; ?></td>
                     <td><?php echo $trabajador['status']; ?></td>
                    <td><button type="button" class="btn btn-primary btn-xs"	onclick="editar(<?php echo $trabajador['id_trabajador']; ?>)" id="<?php echo $trabajador['id_trabajador']; ?>"
                                                                                                                            data-id="<?php echo $trabajador['id_trabajador']; ?>">
                                                                                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                                                                                    </button></td>
                    <td><p data-placement="top" title="Delete">
                        <button class="btn btn-danger btn-xs" data-toggle="modal" id="<?php echo $trabajador['id_trabajador']; ?>"  data-title="Delete"data-record-id="<?php echo $trabajador['id_trabajador']; ?>" data-record-title="<?php echo $trabajador['nombre']; ?>" data-target="#confirm-delete">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </p></td>					
                                

                </tr>
            <?php } ?>
        </tbody>
        <?php } ?>
    </table>
    </div>
           <!-- Modal -->
<div id="modalTrabajador" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrar Trabajador</h4>
      </div>
      <div class="modal-body">
         <form action="index.php" method="post"  id="formTrabajador" class="formInicio">    
                

                <div >
                 <em id="msg"></em>
                </div>
                <div class="form-group row">                
                    <div class="col-md-12">
                        <label for="ciTrabajador" class="control-label">C&eacute;dula del Trabajador</label>
                         <input type="text" placeholder="C&eacute;dula del Trabajador" class="form-control solo-numero" id="ciTrabajador" name="ciTrabajador"/>
                    </div>
                </div> 
                <div class="form-group row">
                 
                    <div class="col-md-12">
                        <label for="nombreTrabajador" class="control-label">Nombre del Trabajador</label>
                        <input type="hidden" name="idTrabajador" id="idTrabajador"/>
                        <input type="text" placeholder="Nombre del Trabajador" class="form-control" id="nombreTrabajador" name="nombreTrabajador"/>
                    </div>
                </div>  
                <div class="form-group row">                
                    <div class="col-md-12">
                        <label for="apellidoTrabajador" class="control-label">Apellido del Trabajador</label>
                         <input type="text" placeholder="Apellido del Trabajador" class="form-control" id="apellidoTrabajador" name="apellidoTrabajador"/>
                    </div>
                </div> 
                 
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="cargoTrabajador" class="control-label">Cargo Del Trabajador</label>
                        <select id="cargoTrabajador" name="cargoTrabajador" class="form-control" >
                            <option selected="selected" value="">Seleccione:</option>
                            <?php foreach ($cargos as $cargo){?>
                            <option value="<?php echo $cargo['id_cargo'];?>"><?php echo $cargo['descripcion'];?></option>

                             <?php   }?>
                        </select>
                        
                    </div>  
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="direccionTrabajador" class="control-label">Direcci&oacute;n Del Trabajador</label>
                        <input type="text" placeholder="Direcci&oacute;n/Ubicaci&oacute;n" class="form-control" id="direccionTrabajador" name="direccionTrabajador"/>
                    </div>
                </div> 
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="telefonoTrabajador" class="control-label">Tel&eacute;fono Del Trabajador</label>
                        <input type="text" placeholder="Telefono de Habitacion" class="form-control solo-numero" id="telefonoTrabajador" name="telefonoTrabajador"/>
                    </div> 
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <input type="submit" class="form-control btn-primary" id="btnRegistrarTrabajador" value="Registrar">
        <input type="submit" class="form-control btn-warning" id="btnActualizarTrabajador" value="Actualizar">
      </div>
    </div>

  </div>
</div>

<div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">Confirmar Solicitud</h4>
                </div>
            
                <div class="modal-body">
                    <p>¿Seguro de eliminar el registro <b><i class="title"></i></b>?, este procedimiento es irreversible.</p>
                    <p>¿Confirma la solicitud?</p>
                    <p class="debug-url"></p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger btn-ok">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
    
</body>

<script src="../src/js/trabajador.js" type="text/javascript"></script>