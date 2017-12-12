<?php

require_once '../class/Recurso.php';
require_once 'menu.php';

$material = new Recurso();
$materiales = $material->getAll("2");

?>

<body>
    <h1>Materiales</h1>
     <br/>
    
        <div class="container">
        <div>
            <div class="pull-right">
                <button class="btn btn-primary" id="btnNuevo"> Nuevo</button>
            </div>
            </div>
            
            <br/><br/><br/>
    
        <div class="container">
            <table id="materiales" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>Nombre</th>                
                <th>Estatus </th>
                
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>Nombre</th>
               <th>Estatus </th>
               
               <th>Editar</th>
               <th>Eliminar</th>
            </tr>
        </tfoot>
        <?php if(!empty($materiales)){ ?>
        <tbody>
            <?php foreach ($materiales as $material){ 
     
                ?>
                <tr>
                            
                    <td><?php echo $material['nombre']; ?></td>
                    <td><?php echo ($material['estatus']==1)? "ACTIVO": "INACTIVO"; ?></td>
                    
                       <td><button type="button" class="btn btn-primary btn-xs"  onclick="editar(<?php echo $material['id_recurso']; ?>)" id="<?php echo $material['id_recurso']; ?>"
                                                                                                                            data-id="<?php echo $material['id_recurso']; ?>">
                                                                                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                                                                                    </button></td>
                    <td><p data-placement="top" title="Delete">
                        <button class="btn btn-danger btn-xs" data-toggle="modal" id="<?php echo $material['id_recurso']; ?>"  data-title="Delete"data-record-id="<?php echo $material['id_recurso']; ?>" data-record-title="<?php echo $material['nombre']; ?>" data-target="#confirm-delete">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </p></td> 
                </tr>
            <?php } ?>
        </tbody>
        <?php } ?>
    </table>
                <!-- Modal -->
<div id="modalMaterial" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrar Material</h4>
      </div>
      <div class="modal-body">
         <form name="formMaterial"id="formMaterial" method="post" class="formInicio">    
                <div >
                 <em id="msg"></em>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="hidden" name="idMaterial" id="idMaterial"/>
                        <label for="nombreMaterial" class="control-label">Nombre del material</label>
                        <input type="text" placeholder="Nombre o descripci&oacute; del Material" class="form-control" id="nombreMaterial" name="nombreMaterial"/>
                    </div>
                </div>  
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="estatusMaterial" class="control-label">Estatus</label>
                        <select id="estatusMaterial" name="estatusMaterial" class="form-control" >
                            <option selected="selected" value="1">ACTIVO</option>
                            <option  value="2">INACTIVO</option>                             
                            
                        </select>
                        
                    </div>  
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <input type="button" class="form-control btn-primary" id="btnRegistrarMaterial" value="Registrar">
        <input type="button" class="form-control btn-warning" id="btnActualizarMaterial" value="Actualizar">
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

<script src="../src/js/material.js" type="text/javascript"></script>