<?php
require_once 'menu.php';
require_once '../class/Casa.php';

$casa = new Casa();
$casas = $casa->getAll();

?>

<body>
    <h1>Casas</h1>
    <br/>
    
        <div class="container">
            <div class="pull-right">
                <button class="btn btn-primary" id="btnNuevo"> Nuevo</button>
            </div>
            <br/><br/><br/>
    <table id="casas" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>Numero</th>                
                <th>Direcci&oacute;</th>
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>Numero</th>                
               <th>Direcci&oacute;</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
        <?php if(!empty($casas)){ ?>
        <tbody>
            <?php foreach ($casas as $cas){ 
     
                ?>
                <tr>
                            
                    <td><?php echo $cas['numero']; ?></td>
                    <td><?php echo $cas['direccion']; ?></td>
                    <td><button type="button" class="btn btn-primary btn-xs"	onclick="editar(#{evento.id})" id="edit#{evento.id}"
                                                                                                                            data-id="#{evento.id}">
                                                                                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                                                                                    </button></td>					
                                    <td><button type="button" class="btn btn-danger btn-xs"	onclick="editar(#{evento.id})" id="edit#{evento.id}"
                                                                                                                            data-id="#{evento.id}">
                                                                                                                            <span class="glyphicon glyphicon-trash"></span>
                                                                                                                    </button></td>	

                </tr>
            <?php } ?>
        </tbody>
        <?php } ?>
    </table>
          
           
        </div>    
      <!-- Modal -->
<div id="modalCasa" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrar Casa</h4>
      </div>
      <div class="modal-body">
     <form name="formCasa" id="formCasa" method="post" class="formInicio">   
             <div>
                 <p id="msg"></p>  
                
                <div class="form-group">
                    <div class="">
                        <label for="numeroCasa" class="">N&uacute;mero de Casa</label>
                        <input type="text" placeholder="N&uacute;mero de Casa" class="form-control" id="numeroCasa" name="numeroCasa"/>
                    </div>
                </div>  
                <div class="form-group">
                    <div class="">
                        <label for="direccioncasa" class="">Direcci&oacute;n/Ubicaci&oacute;n</label>
                        <input type="text" placeholder="Direcci&oacute;n/Ubicaci&oacute;n" class="form-control" id="direccioncasa" name="direccioncasa"/>
                    </div>  
                </div>
            </div>
        </form>
      <div class="modal-footer">
        <input type="submit" id="btnRegistrar" class="form-control btn-primary" value="Registrar">
      </div>
    </div>

  </div>
</div>
    
</body>
<script src="../src/jquery/jquery.js" type="text/javascript"></script>
<script src="../src/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../src/dataTable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../src/js/casa.js" type="text/javascript"></script>