<?php 
 include_once("config.php");


$id_dto = $_POST['id_dto'];
$nombre_dto = $_POST['nombre_dto'];
$presupuesto = $_POST['presupuesto'];
	
	If(!empty($_POST['activo'])){
		$activo=1;
	}else{
		$activo= 0;
	}
if(empty($id_dto and $nombre_dto and $presupuesto)){

    header("Location: ../index.php?Errordto#error");
    
}else{

$sqlverificacion = "SELECT id_dto FROM departamentos";
mysqli_query($conn, $sqlverificacion)or die(mysqli_error());
$verificacion = mysqli_query($conn,$sqlverificacion);
while($id=mysqli_fetch_array($verificacion)){
   
   if($id['id_dto']==$id_dto){

    		$sqlquery ="UPDATE departamentos SET nombre_dto='$nombre_dto', presupuesto=$presupuesto,fecha_asig_presupuesto=CURRENT_TIMESTAMP,presupuesto_act=$activo WHERE id_dto=$id_dto";
 }else{

 	header("Location: ../index.php?noexiste#noexiste");

mysqli_query($conn, $sqlquery)or die(mysqli_error());
mysqli_close($conn);
header("Location: ../index.php?okadd#okadd");
 }
}
}
