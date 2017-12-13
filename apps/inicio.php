<?php
require_once 'menu.php';
?>
<body background="../src/imagenes/hugo1.jpg">
    <h1>Inicio</h1>
    
    <?php if(!empty($_GET['backup'])){
    	echo PATH_BACKUP.DB_NAME. "_" . date("d-m-Y_H-i-s") . ".sql";?>
                <div >
                 <em id="msg" style="color: red "> Usuario/Contraseña Incorrectos. Intente de nuevo.</em>
                </div>
                <?php }?>
</body>