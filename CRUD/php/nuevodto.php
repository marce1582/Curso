<?php 
 include_once("conectar.php");
if(!isset($_SESSION['usuario'])){
  header("Location:../index.php");
}

$id_dto = $_POST['id_dto'];
$nombre_dto = $_POST['nombre_dto'];
$presupuesto = $_POST['presupuesto'];
	
	If(!empty($_POST['activo'])){
		$activo=1;
	}else{
		$activo= 0;
	}

if(empty($id_dto and $nombre_dto and $presupuesto)){

    header("Location: operador.php?Errordto#error");
    
}else{

$sqlqueryinsert ="INSERT INTO departamentos VALUES($id_dto,'$nombre_dto',$presupuesto, CURRENT_TIMESTAMP,$activo)";


mysqli_query($conn, $sqlqueryinsert)or die(mysqli_error());
mysqli_close($conn);
  


 header("Location: operador.php?okadd#okadd");
 //break;
 }


