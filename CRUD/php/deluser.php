<?php 
 include_once("config.php");


$dni = $_GET['dni'];

$sqlquerydel ="DELETE FROM empleados where dni=$dni";

mysqli_query($conn, $sqlquerydel)or die(mysqli_error());

 mysqli_close($conn);
 header("Location: ../index.php#listado");