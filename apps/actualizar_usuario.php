<?php

require_once '../class/Usuario.php';
require_once '../class/Trabajador.php';
require_once '../class/Rol.php';
require_once 'menu.php';

$usuairo = new Usuario();
$usuario = $usuairo->buscar($idUsuarioLogueado);
$correo = $usuario[0]['correo'];
$roles = new Rol();
$roles = $roles->getAll();



?>

<body>
    <h1>Actualizar Datos de Usuario</h1>
<hr/>


         <form action="index.php" method="post"  id="formUsuarioActualizar" class="formInicio">    
                
            <div class="modal-body container"> 
                <div >
                 <em id="msg"></em>
                </div>
                 
                <div class="form-group row" id="trabajador">                
                    <div class="col-md-6">
                        <label for="idTrabajador" class="control-label">Nombre y Apellido</label>
                         <input type="hidden" name="idUsuario" value="<?php echo $idTrabajadorLogueado;?>" id="idTrabajador"/>
                        <input type="text" readonly="readonly" placeholder="Nombre del Usuario" class="form-control" id="nombreUsuario" value="<?php echo $nombreLogueado ?>" name="nombreUsuario"/>
                    </div>
                    
                
                 
                    <div class="col-md-6">
                        <label for="nombreUsuario" class="control-label">Usuario</label>
                        <input type="hidden" name="idUsuario" value="<?php echo $idUsuarioLogueado;?>" id="idUsuario"/>
                        <input type="text" readonly="readonly" value="<?php echo $usuarioLogueado ?>" placeholder="Nombre del Usuario" class="form-control" id="nombreUsuario" name="nombreUsuario"/>
                    </div>
                </div>
                  <div class="form-group row">
                  <div class="col-md-6">
                       <label for="rolUsuario" class="control-label">Rol</label>
                      <input type="hidden" name="idRol" value="<?php echo $rolUsuarioLogueado;?>" id="idRol"/>
                      <?php $rol = ($rolUsuarioLogueado = 1)?"ADMINISTRADOR":"REGISTRADOR"; ?>
                      <input type="text" disabled="disabled" class="form-control" name="rolId" value="<?php echo $rol;?>" id="rolId"/>
                        
                    </div>  
                    <div class="col-md-6">
                        <label for="estatusUsuario" class="control-label">Estatus</label>
                        <select disabled="disabled" id="estatusUsuario" name="estatusUsuario" class="form-control" >
                            <option selected="selected" value="1">ACTIVO</option>
                            <option  value="2">INACTIVO</option>                             
                            
                        </select>
                        
                    </div>  
                </div>
                 <div class="form-group row" id="clave">                
                    <div class="col-md-6">
                        <label for="claveUsuario" class="control-label">Nueva Contraseña</label>
                         <input type="password" placeholder="clave del Usuario" class="form-control" id="claveUsuario" name="claveUsuario"/>
                    </div>
                    <div class="col-md-6">
                        <label for="claveUsuario" class="control-label">Repetir Contraseña</label>
                         <input type="password" placeholder="clave del Usuario" class="form-control" id="claveUsuario2" name="claveUsuario2"/>
                    </div>
                </div> 
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="correo" class="control-label">Correo Electr&oacute;nico</label>
                        <input type="text" placeholder="Correo Electr&oacute;nico" value="<?php echo $correo; ?>" class="form-control" id="correo" name="correo"/>
                    </div>
                </div> 
              
                <div class="form-group row">
                    <div class="col-md-12">
                <input type="button" class="form-control btn-warning" id="btnUsuarioActualizar" value="Actualizar">
              </div>  
                </div>
                </div>
            </form>
      
</body>

<script src="../src/js/actualizar_usuario.js" type="text/javascript"></script>