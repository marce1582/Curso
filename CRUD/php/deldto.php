<?php 
include_once("config.php");


$id_dto = $_GET['id_dto'];

$sqlquerydel ="DELETE FROM departamentos where id_dto=$id_dto";


mysqli_query($conn, $sqlquerydel)or die(mysqli_error());

 mysqli_close($conn);
 header("Location: ../index.php");