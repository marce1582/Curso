<?php 
 include_once("conectar.php");
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:../index.php");
}
$dni = $_GET['dni'];

$sqlquerydel ="DELETE FROM empleados where dni=$dni";

mysqli_query($conn, $sqlquerydel)or die("Problemas al eliminar".mysqli_error($conn));

 mysqli_close($conn);
 header("Location: admin.php#listado");