<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "c1115";

#$host = "localhost";
#$user = "stpargen_admin";
#$pass = "EiJlz;YPWw&N";
#$db = "stpargen_c1115";

$conn=mysqli_connect($host, $user, $pass, $db)or exit("No se puede establecer conexion con la base de datos");

