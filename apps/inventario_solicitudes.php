<?php
require_once '../class/Prestamo.php';
require_once '../class/Cargo.php';
require_once 'menu.php';

$prestamos = new Prestamo();
$solicitudes = $prestamos->getSolicitudesPendientes();





?>

<body>
    <h1>Solicitudes Pendientes</h1>

    <div class="container">
      
                 <table id="solicitudes" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Cédula</th> 
                <th>Responsable</th> 
                <th>Telefono</th> 
                <th>Herramienta / Material</th>                 
                <th>Cantidad</th>
               <!--  <th>Fecha Asignado</th>
                <th>Fecha Devuelto</th> -->
                <th>Estatus</th>
                <th>Aprobar</th>
                <th>Rechazar</th> 
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Cédula</th> 
                <th>Responsable</th> 
                <th>Telefono</th> 
                <th>Herramienta / Material</th>                 
                <th>Cantidad</th>
                <!-- <th>Fecha Asignado</th>
                <th>Fecha Devuelto</th> -->
                <th>Estatus</th>
                <th>Aprobar</th>
                <th>Rechazar</th>
            </tr>
        </tfoot>
        <?php if(!empty($solicitudes)){ ?>
        <tbody>
            <?php foreach ($solicitudes as $solicitud){ 
     
                ?>
                <tr>
                    <td><?php echo $solicitud['ci']; ?></td>
                    <td><?php echo $solicitud['responsable']; ?></td>
                    <td><?php echo $solicitud['telefono']; ?></td>        
                    <td><?php echo $solicitud['recurso']; ?></td>
                    <td><?php echo $solicitud['cantidad']; ?></td>
                    <!-- <td><?php echo date("d/m/Y H:i:s",strtotime($solicitude['fecha'])); ?></td>
                    <td><?php echo (empty($prestamo['fechae']))?' ':date("d/m/Y H:i:s",strtotime($prestamo['fechae']));?></td> -->
                    
                    <td><?php echo $solicitud['estatus']; ?></td>
                  <!--   <td><button type="button" class="btn btn-success btn-xs"  onclick="editar(<?php echo $prestamo['id_prestamo']; ?>)" id="<?php echo $prestamo['id_prestamo']; ?>"
                                                                                                                            data-id="<?php echo $prestamo['id_prestamo']; ?>">
                                                                                                                            <span title="Entregar" class=" glyphicon glyphicon-log-out"></span>
                                                                                                                    </button></td> -->
                    <td><p data-placement="top" title="Aprobar">
                        <button class="btn btn-success btn-xs" data-toggle="modal" id="<?php echo $solicitud['id_prestamo']; ?>"  data-title="Aprobar" data-record-id="<?php echo $solicitud['id_prestamo']; ?>" data-record-tipo="<?php echo $solicitud['tipo']; ?>" data-record-title="<?php echo 'Solicitante : '.$solicitud['responsable'].' | Recurso: '. $solicitud['recurso'].' | Cantidad : '.$solicitud['cantidad']; ?>" data-target="#confirm-aprobar">
                            <span title="Aprobar" class=" glyphicon glyphicon-check"></span>
                        </button>
                    </p></td>

                     <td><p data-placement="top" title="Delete">
                        <button class="btn btn-danger btn-xs" data-toggle="modal" id="<?php echo $solicitud['id_prestamo']; ?>"  data-title="Delete" data-record-id="<?php echo $solicitud['id_prestamo']; ?>" data-record-tipo="<?php echo $solicitud['tipo']; ?>" data-record-title="<?php echo 'Solicitante : '.$solicitud['responsable'].' | Recurso: '. $solicitud['recurso'].' | Cantidad : '.$solicitud['cantidad']; ?>" data-target="#confirm-delete">
                            <span title="Rechazar" class="glyphicon glyphicon-remove-sign"></span>
                        </button>
                    </p></td>       
                                

                </tr>
            <?php } ?>
        </tbody>
        <?php } ?>
    </table>
      

    </div>
    <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">Confirmar Salida de Recurso</h4>
                </div>
            
                <div class="modal-body">
                    <p>¿Confirma el rechazo de la siguiente solicitud:  <b><i class="title"></i></b>?, este procedimiento es irreversible.</p>
                    <p>¿Confirma el rechazo?</p>
                    <p class="debug-url"></p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger btn-ok">Rechazar</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="confirm-aprobar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">Confirmar Salida de Recurso</h4>
                </div>
            
                <div class="modal-body">
                    <p>¿Confirma la aprobación de la siguiente solicitud:  <b><i class="title"></i></b>?, este procedimiento es irreversible.</p>
                    <p>¿Confirma la aprobación?</p>
                    <p class="debug-url"></p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-success btn-ok">Confirmar</a>
                </div>
            </div>
        </div>
    </div>
<!--ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#material">Material</a></li>
  <li><a data-toggle="tab" href="#herramienta">Herramienta</a></li>
  
</ul>

<div class="tab-content container">
  <div id="material" class="tab-pane fade in active">
    <h3> </h3>
      <form name="formMaterialEntregado" id="formMaterialEntregado" method="post" class="formInicio">  
      <em id="msgMaterial"></em>
         <div class="form-group row">
              <div class="col-md-6">
                  <label for="recursoMaterial" class="control-label">Nombre</label>                                
                  <select class="form-control" id="recursoMaterial" name="recursoMaterial">
                      <option value="">Seleccione:</option>
                      <?php if(!empty($materiales)){ ?>
                      <?php foreach ($materiales as $material){ 
                      if($material['estatus'] == 1){     
                  ?>
                  <option value="<?php echo $material['id_recurso'];?>"><?php echo $material['nombre'];?></option>

                    <?php }} }?>                    
                  </select>
                  <em id="cantidadMaterialDisponible"></em>
                  
              </div>                                
              <div class="col-md-6">
                  <label for="cantidadMaterialEntregado" class="control-label">Cantidad Entregada</label>
                  <input type="text" maxlength="5" class="form-control solo-numero" id="cantidadMaterialEntregado" name="cantidadMaterialEntregado" placeholder="Cantidad Entregada"/>
                  <em id="msgMaterial2"></em>
              </div>
              <input type="hidden"  id="mexistente" name="mexistente" value=" " />
          </div>
          <div class="form-group row">
              <div class="col-md-12">
                  <label for="trabajadorRecibe" class="control-label">Recibe</label>                                
                  <select class="form-control" id="trabajadorRecibeMaterial" name="trabajadorRecibe">
                      <option value="">Seleccione:</option>
                      <?php if(!empty($trabajadores)){ ?>
                      <?php foreach ($trabajadores as $trabajador){ 
                        
                  ?>
                  <option value="<?php echo $trabajador['id_trabajador'];?>"><?php echo $trabajador['nombre'].' '.$trabajador['apellido'];?></option>

                    <?php } }?>                    
                  </select>
              </div>
          </div>
          
          <div class="form-group row">
            
            <div class=" col-md-12">
              <input type="button" class="form-control btn-primary" id="btnRegistrarMaterialEntregado" value="Registrar">
            </div>
          </div>
      </form>
  </div>
  <div id="herramienta" class="tab-pane fade">
    <h3> </h3>
     <form name="formHerramientaEntregada" id="formHerramientaEntregada" method="post" class="formInicio">  
      <em id="msgHerramienta"></em>
       <div class="form-group  row ">
            <div class="col-md-6">
                <label for="recursoHerramienta" class="control-label">Nombre</label>                                
                <select class="form-control" id="recursoHerramienta" name="recursoHerramienta">
                    <option value="">Seleccione:</option>
                    <?php if(!empty($herramientas)){ ?>
                    <?php foreach ($herramientas as $herramienta){ 
                    if($herramienta['estatus'] == 1){     
                ?>
                <option value="<?php echo $herramienta['id_recurso'];?>"><?php echo $herramienta['nombre'];?></option>

                  <?php }} }?>                    
                </select>
                <em id="cantidadHerramientaDisponible"></em>
            </div>                                
            <div class="col-md-6">
                <label for="herramientaEntregada" class="control-label">Cantidad Entregada</label>
                <input type="text" class="form-control solo-numero" maxlength="5" id="cantidadHerramientaEntregada" name="cantidadHerramientaEntregada" placeholder="Cantidad Entregada"/>
                <em id="msgHerramienta2"></em>
                <input type="hidden"  id="hexistente" name="hexistente" />
            </div>
        </div>
        <div class="form-group row">
              <div class="col-md-12">
                  <label for="trabajadorRecibe" class="control-label">Recibe</label>                                
                  <select class="form-control" id="trabajadorRecibe" name="trabajadorRecibe">
                      <option value="">Seleccione:</option>
                      <?php if(!empty($trabajadores)){ ?>
                      <?php foreach ($trabajadores as $trabajador){ 
                        
                  ?>
                  <option value="<?php echo $trabajador['id_trabajador'];?>"><?php echo $trabajador['nombre'].' '.$trabajador['apellido'];?></option>

                    <?php } }?>                    
                  </select>
              </div>
          </div>
        <div class="form-group row">
          
          <div class=" col-md-12">
            <input type="button" class="form-control btn-primary" id="btnRegistrarHerramientaEntregada" value="Registrar">
          </div>
        </div>
    </form>
  </div>
</div-->                              
</body>
<script src="../src/js/inventarioSolicitudes.js" type="text/javascript"></script>