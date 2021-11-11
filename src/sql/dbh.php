<?php

// CONNECTION WITH DATA BASE 

$dsn = "mysql:host=".$_SERVER["SERVER_NAME"].";dbname=employeeMngmt";
$dbusername ="root";
$dbpassword = "";

$db = new PDO($dsn, $dbusername, $dbpassword);
?>