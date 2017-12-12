<?php
require_once '../class/Recurso.php';
require_once 'menu.php';



$material = new Recurso();
$materiales = $material->getAll("2");

$herramienta = new Recurso();
$herramientas = $herramienta->getAll("1");

?>

<body>
    <h1>Entrada Inventario</h1>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#material">Material</a></li>
  <li><a data-toggle="tab" href="#herramienta">Herramienta</a></li>
  
</ul>

<div class="tab-content container">
  <div id="material" class="tab-pane fade in active">
    <h3> </h3>
      <form name="formMaterialEntrante" id="formMaterialEntrante" method="post" class="formInicio">  
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
                  <label for="cantidadMaterialEntrante" class="control-label">Cantidad Entrante</label>
                  <input type="text" maxlength="5" class="form-control solo-numero" id="cantidadMaterialEntrante" name="cantidadMaterialEntrante" placeholder="Cantidad Entrante"/>
              </div>
          </div>
          <div class="form-group row">
            
            <div class=" col-md-12">
              <input type="button" class="form-control btn-primary" id="btnRegistrarMaterialEntrante" value="Registrar">
            </div>
          </div>
      </form>
  </div>
  <div id="herramienta" class="tab-pane fade">
    <h3> </h3>
     <form name="formHerramientaEntrante" id="formHerramientaEntrante" method="post" class="formInicio">  
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
                <label for="herramientaEntrante" class="control-label">Cantidad Entrante</label>
                <input type="text" class="form-control solo-numero" id="cantidadHerramientaEntrante" maxlength="5" name="cantidadHerramientaEntrante" placeholder="Cantidad Entrante"/>
            </div>
        </div>
        <div class="form-group row">
          
          <div class=" col-md-12">
            <input type="button" class="form-control btn-primary" id="btnRegistrarHerramientaEntrante" value="Registrar">
          </div>
        </div>
    </form>
  </div>
</div>                              
</body>

<script src="../src/js/inventarioEntrada.js" type="text/javascript"></script>