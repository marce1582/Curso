<?php 
 include_once("config.php");

$nombre = $_POST['nombre'];
$apellido =$_POST['apellido'];
$dni = $_POST['dni'];
$cat = $_POST['cat'];

If(!empty($_POST['activo2'])){
        $activo2=1;
    }else{
        $activo2= 0;
    }

if(empty($nombre and $apellido and $dni)){

    header("Location: ../index.php?Error#erroruser");
    
}else{

$sqlqueryinsert ="INSERT INTO empleados VALUES('',$dni,'$nombre','$apellido',$cat, CURRENT_TIMESTAMP,$activo2)";

mysqli_query($conn, $sqlqueryinsert)or die(mysqli_error());

 mysqli_close($conn);
  header("Location: ../index.php?ok#OkUser");
 }

