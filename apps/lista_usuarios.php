<?php

require_once '../class/Usuario.php';
require_once '../class/Trabajador.php';
require_once '../class/Rol.php';
require_once 'menu.php';

$usuairo = new Usuario();
$usuarios = $usuairo->getAll();

$trabajadores = new Trabajador();
$trabajadores = $trabajadores->getAll('p');

$roles = new Rol();
$roles = $roles->getAll();



?>

<body>
    <h1>Usuarios</h1>
   <br/>
    
        <div class="container">
            <div class="pull-right">
                <button class="btn btn-primary" id="btnNuevo"> Nuevo</button>
            </div>
            <br/><br/><br/>
        <div class="container">
            <table id="usuarios" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Usuario</th> 
            	<th>Nombre</th> 
                <th>Rol</th>                 
                <th>Correo</th>
                <th>Estatus</th>
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Usuario</th> 
                <th>Nombre</th> 
                <th>Rol</th>                 
                <th>Correo</th>
                <th>Estatus</th>
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </tfoot>
        <?php if(!empty($usuarios)){ ?>
        <tbody>
            <?php foreach ($usuarios as $usuario){ 
     
                ?>
                <tr>
                    <td><?php echo $usuario['usuario']; ?></td>
                    <td><?php echo $usuario['nombre']; ?></td>        
                    <td><?php echo $usuario['rol']; ?></td>
                    <td><?php echo $usuario['correo']; ?></td>
                     <td><?php echo $usuario['estatus']; ?></td>
                    <td><button type="button" class="btn btn-primary btn-xs"	onclick="editar(<?php echo $usuario['id_usuario']; ?>)" id="<?php echo $usuario['id_usuario']; ?>"
                                                                                                                            data-id="<?php echo $usuario['id_usuario']; ?>">
                                                                                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                                                                                    </button></td>
                    <td><p data-placement="top" title="Delete">
                        <button class="btn btn-danger btn-xs" data-toggle="modal" id="<?php echo $usuario['id_usuario']; ?>"  data-title="Delete"data-record-id="<?php echo $usuario['id_usuario']; ?>" data-record-title="<?php echo $usuario['nombre']; ?>" data-target="#confirm-delete">
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
<div id="modalUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrar Usuario</h4>
      </div>
      <div class="modal-body">
         <form action="index.php" method="post"  id="formUsuario" class="formInicio">    
                

                <div >
                 <em id="msg"></em>
                </div>
                  
                <div class="form-group row" id="trabajador">                
                    <div class="col-md-12">
                        <label for="idTrabajador" class="control-label">Nombre y Apellido</label>
                        <select class="form-control" id="idTrabajador" name="idTrabajador">
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
                 
                    <div class="col-md-12">
                        <label for="nombreUsuario" class="control-label">Usuario</label>
                        <input type="hidden" name="idUsuario" id="idUsuario"/>
                        <input type="text" placeholder="Nombre del Usuario" class="form-control" id="nombreUsuario" name="nombreUsuario"/>
                    </div>
                </div>
                 <div class="form-group row" id="clave">                
                    <div class="col-md-12">
                        <label for="claveUsuario" class="control-label">Contraseña</label>
                         <input type="password" placeholder="clave del Usuario" class="form-control" id="claveUsuario" name="claveUsuario"/>
                    </div>
                </div> 
                <div class="form-group row">
                    <div class="col-md-12">
                       <label for="rolUsuario" class="control-label">Rol</label>
                        <select id="rolUsuario" name="rolUsuario" class="form-control" >
                            <option selected="selected" value="">Seleccione:</option>
                            <?php foreach ($roles as $rol){?>
                            <option value="<?php echo $rol['id_rol'];?>"><?php echo $rol['descripcion'];?></option>

                             <?php   }?>
                        </select>
                        
                    </div>  
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="correo" class="control-label">Correo Electr&oacute;nico</label>
                        <input type="text" placeholder="Correo Electr&oacute;nico" class="form-control" id="correo" name="correo"/>
                    </div>
                </div> 
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="estatusUsuario" class="control-label">Estatus</label>
                        <select id="estatusUsuario" name="estatusUsuario" class="form-control" >
                            <option selected="selected" value="1">ACTIVO</option>
                            <option  value="2">INACTIVO</option>                             
                            
                        </select>
                        
                    </div>  
                </div>
             
            </form>
      </div>
      <div class="modal-footer">
        <input type="submit" class="form-control btn-primary" id="btnRegistrarUsuario" value="Registrar">
        <input type="submit" class="form-control btn-warning" id="btnActualizarUsuario" value="Actualizar">
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

<script src="../src/js/usuario.js" type="text/javascript"></script>