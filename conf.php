<?php
//config --
define('DB_SERVER', 'NAME');//database server ex:localhost
define('DB_USERNAME', 'NAME');//database username 
define('DB_PASSWORD', 'PASS');//database password
define('DB_DATABASE', 'NAME');//database name
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die("Can't Connect :(");
?>