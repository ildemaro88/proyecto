<?php

require_once '../class/Prestamo.php';
require_once '../class/Cargo.php';
require_once 'menu.php';

$prestamos = new Prestamo();
$prestamos = $prestamos->getAll();


?>

<body>
    <h1>Prestamos</h1>
   <br/>
    
        <div class="container">
            <div class="pull-right">
                <button class="btn btn-primary hidden" id="btnNuevo"> Nuevo</button>
            </div>
            <div>
             <div class="pull-right col-md-1 ">
                <a href=<?php echo (count($prestamos)>0)?"../reportes/reportePrestamo.php":"#";?> class="btn btn-warning" id="btnExportar"> Exportar</a>
            </div>

            </div>
            <br/><br/><br/>
        <div class="container">
            <table id="prestamos" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Responsable</th> 
                <th>Telefono</th> 
                <th>Herramienta / Material</th>                 
                <th>Cantidad</th>
                <th>Fecha Asignado</th>
                <th>Fecha Devuelto</th>
                <th>Estatus</th>
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Responsable</th> 
                <th>Telefono</th> 
                <th>Herramienta / Material</th>                 
                <th>Cantidad</th>
                <th>Fecha Asignado</th>
                <th>Fecha Devuelto</th>
                <th>Estatus</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
        <?php if(!empty($prestamos)){ ?>
        <tbody>
            <?php foreach ($prestamos as $prestamo){ 
     
                ?>
                <tr>
                    <td><?php echo $prestamo['responsable']; ?></td>
                    <td><?php echo $prestamo['telefono']; ?></td>        
                    <td><?php echo $prestamo['herramienta']; ?></td>
                    <td><?php echo $prestamo['cantidad']; ?></td>
                    <td><?php echo date("d/m/Y H:i:s",strtotime($prestamo['fecha'])); ?></td>
                    <?php if($prestamo['id_estatus'] == '5'){ ?>
                    <td>N/A</td>
                    <?php }else{ ?>
                    <td><?php echo (empty($prestamo['fechae']))?' ':date("d/m/Y H:i:s",strtotime($prestamo['fechae']));?></td>
                    <?php } ?>
                    <td><?php echo $prestamo['estatus']; ?></td>
                    <td>
<?php if ($prestamo['id_estatus'] == '4'){ ?>
                       <button type="button" class="btn btn-primary btn-xs"  onclick="editar(<?php echo $prestamo['id_prestamo']; ?>)" id="<?php echo $prestamo['id_prestamo']; ?>"
                                                                                                                            data-id="<?php echo $prestamo['id_prestamo']; ?>">
                                                                                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                                                                                    </button>
                    <?php } else{ ?>
                        N/A
                      <?php } ?>
                    </td>
                    <td><p data-placement="top" title="Delete">
                        <button class="btn btn-danger btn-xs" data-toggle="modal" id="<?php echo $prestamo['id_prestamo']; ?>"  data-title="Delete"data-record-id="<?php echo $prestamo['id_prestamo']; ?>" data-record-title="<?php echo $prestamo['herramienta']; ?>" data-target="#confirm-delete">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </p>

                    </td>         
                                

                </tr>
            <?php } ?>
        </tbody>
        <?php } ?>
    </table>
    </div>
           <!-- Modal -->
<div id="modalPrestamo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrar Prestamo</h4>
      </div>
      <div class="modal-body">
         <form action="index.php" method="post"  id="formPrestamo" class="formInicio">    
                

                <div >
                 <em id="msg"></em>
                </div>
                <div class="form-group row">
                 
                    <div class="col-md-6">
                        <label for="responsable" class="control-label">Responsable</label>
                        <input type="hidden" name="id" id="id"/>
                        <input type="text" readonly="readonly"  placeholder="responsable" class="form-control" id="responsable" name="responsable"/>
                    </div>             
                    <div class="col-md-6">
                        <label for="telefono" class="control-label">Telefono</label>
                         <input type="text" readonly="readonly" placeholder="telefono" class="form-control solo-numero" id="telefono" name="telefono"/>
                    </div>
                </div> 
                 <div class="form-group row">                
                    <div class="col-md-6">
                        <label for="fechaSalida" class="control-label">Fecha Prestamo</label>
                         <input type="text" readonly="readonly" placeholder="fechaSalida" class="form-control " id="fechaSalida" name="fechaSalida"/>
                    </div>
                               
                    <div class="col-md-6">
                        <label for="herramienta" class="control-label">Herramienta / Material</label>
                        <input type="hidden" name="idHerramienta" id="idHerramienta"/>
                         <input type="text" readonly="readonly" placeholder="fechaSalida" class="form-control " id="herramienta" name="herramienta"/>
                    </div>
                </div> 
                <div class="form-group row">                
                    <div class="col-md-6">
                        <label for="cantidad" class="control-label">Cantidad</label>
                         <input type="text" readonly="readonly" placeholder="cantidad" class="form-control solo-numero" id="cantidad" name="cantidad"/>
                    </div>
                
                    <div class="col-md-6">
                        <label for="estatus" class="control-label">Estatus</label>
                        <select id="estatus" name="estatus" class="form-control" >
                            <option selected="selected" value="4">PRESTADO</option>
                            <option  value="3">DEVUELTO</option>
                            
                        </select>
                        
                    </div>  
                </div>
                
            </form>
      </div>
      <div class="modal-footer">
        <input type="submit" class="form-control btn-warning" id="btnActualizarPrestamo" value="Actualizar">
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

<script src="../src/js/prestamo.js" type="text/javascript"></script>