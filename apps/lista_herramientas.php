<?php
require_once '../class/Recurso.php';
require_once 'menu.php';


$herramienta = new Recurso();
$herramientas = $herramienta->getAll('1');

?>

<body>
    <h1>Herramientas</h1>
    <br/>
     <div class="container">
            <div class="pull-right">
                <button class="btn btn-primary" id="btnNuevo"> Nuevo</button>
                </div>
            <br/><br/><br/>
   
        <div class="container">
            <table id="herramientas" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>C&oacute;digo</th> 
            	<th>Nombre</th>                
                <th>Estatus</th>
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>C&oacute;digo</th> 
               <th>Nombre</th>
                <th>Estatus</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
        <?php if(!empty($herramientas)){ ?>
        <tbody>
            <?php foreach ($herramientas as $herramienta){ 
     
                ?>
                <tr>
                    <td><?php echo $herramienta['codigo']; ?></td>        
                    <td><?php echo $herramienta['nombre']; ?></td>
                    <td><?php echo ($herramienta['estatus']==1)? "ACTIVO": "INACTIVO"; ?></td>
                    <td><button type="button" class="btn btn-primary btn-xs"  onclick="editar(<?php echo $herramienta['id_recurso']; ?>)" id="<?php echo $herramienta['id_recurso']; ?>"
                                                                                                                            data-id="<?php echo $herramienta['id_recurso']; ?>">
                                                                                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                                                                                    </button></td>
                    <td><p data-placement="top" title="Delete">
                        <button class="btn btn-danger btn-xs" data-toggle="modal" id="<?php echo $herramienta['id_recurso']; ?>"  data-title="Delete"data-record-id="<?php echo $herramienta['id_recurso']; ?>" data-record-title="<?php echo $herramienta['nombre']; ?>" data-target="#confirm-delete">
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
<div id="modalHerramienta" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrar Herramienta</h4>
      </div>
        
      <div class="modal-body">
          <form name="formHerramienta" id="formHerramienta" method="post" class="formInicio">   
             <div >
                 <em id="msg"></em>
             </div>
            
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="nombreHerramienta" class="control-label">Nombre</label>
                        <input type="hidden" name="idHerramienta" id="idHerramienta"/>
                        <input type="text" placeholder="nombre o descripci&oacute;n" class="form-control" id="nombreHerramienta" name="nombreHerramienta"/>
                    </div>
                </div>  
                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="hidden" name="idMaterial" id="idMaterial"/>
                        <label for="codigoHerramienta" class="control-label">C&oacute;digo de la herramienta</label>
                        <input type="text" placeholder="C&oacute;digo único para esta herramienta" class="form-control" id="codigoHerramienta" name="codigoHerramienta"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="estatusHerramienta" class="control-label">Estatus</label>
                        <select id="estatusHerramienta" name="estatusHerramienta" class="form-control" >
                            <option selected="selected" value="1">ACTIVO</option>
                            <option  value="2">INACTIVO</option>                             
                            
                        </select>
                    </div>  
                </div>
          </form>  
      </div>
            
      <div class="modal-footer">          
          <input type="button" class="form-control btn-primary" id="btnRegistrarHerramienta" value="Registrar">
          <input type="button" class="form-control btn-warning" id="btnActualizarHerramienta" value="Actualizar">
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

<script src="../src/js/herramienta.js." type="text/javascript"></script>