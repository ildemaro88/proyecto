<?php 
require_once '../config/config.php';
/*$return_var = NULL;
$output = NULL;

//exec('mysqldump --user=root --password=123 --host=localhost tricolor > ../backup/file.sql');
$backup_file = "../backup/tricolor-" . date("Y-m-d-H-i-s") . ".sql.gz";
$command = "mysqldump --opt -h localhost -u root -p123 tricolor | gzip > ../backup/file.sql.gz";

exec($command,$output,$return_var);*/
$dbhost   = DB_HOST;
$dbuser   = DB_USER;
$dbpwd    = DB_PASS;
$dbname   = DB_NAME;
$dumpfile = PATH_BACKUP.$dbname . "_" . date("d-m-Y_H-i-s") . ".sql";

passthru("C:\wamp\bin\mysql\mysql5.7.14\bin\mysqldump --opt --host=$dbhost --user=$dbuser --password=$dbpwd $dbname > $dumpfile");

// report - disable with // if not needed
// must look like "-- Dump completed on ..." 


echo "<script type='text/javascript' > alert('Se a creado el respaldo de la base de datos en $dumpfile');</script>$dumpfile "; 
header('location: ../apps/inicio.php?backup=true');
//passthru("tail -1 $dumpfile");


?>