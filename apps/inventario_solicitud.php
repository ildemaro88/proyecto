<?php
require_once '../class/Recurso.php';
require_once '../class/Trabajador.php';
require_once 'menu.php';


$material = new Recurso();
$materiales = $material->getAll("2");

$herramienta = new Recurso();
$herramientas = $herramienta->getAll("1");


$trabajador = new Trabajador();
$trabajadores = $trabajador->getAll();



?>

<body>
    <h1>Crear Solicitud</h1>
<ul class="nav nav-tabs">
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
              <input type="button" class="form-control btn-primary" id="btnRegistrarMaterialEntregado" value="Crear Solicitud">
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
                <select class="form-control" id="recursoHerramienta" style="width: 100%;" name="recursoHerramienta">
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
                  <select class="form-control" style="width: 100%;" id="trabajadorRecibe" name="trabajadorRecibe">
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
            <input type="button" class="form-control btn-primary" id="btnRegistrarHerramientaEntregada" value="Crear Solicitud">
          </div>
        </div>
    </form>
  </div>
</div>                              
</body>

<script src="../src/js/inventarioSolicitud.js" type="text/javascript"></script>