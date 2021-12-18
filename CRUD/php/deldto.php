<?php 
include_once("conectar.php");
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:../index.php");
}
$id_dto = $_GET['id_dto'];
$update="error";

if(isset($id_dto)){
$sql = "UPDATE empleados SET num_dto =0, activo=0 WHERE num_dto=$id_dto";

mysqli_query($conn,$sql)or die("Problemas para actualizar empleados antes de eliminar dto". mysqli_error($conn));

$update = "ok";
}


if($update == "ok"){

$sqlquerydel ="DELETE FROM departamentos where id_dto=$id_dto";


mysqli_query($conn, $sqlquerydel)or die("Problemas al eliminar".mysqli_error($conn));


 mysqli_close($conn);
}
 header("Location: admin.php");