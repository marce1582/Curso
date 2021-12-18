<?php 
 include_once("conectar.php");
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:../index.php");
}

$id_dto = $_POST['id_dto'];
$nombre_dto = $_POST['nombre_dto'];
$presupuesto = $_POST['presupuesto'];
	

if(!empty($_POST['activo'])){
		$activo=1;
	}else{
		$activo= 0;
	}

if(empty($id_dto || $nombre_dto || $presupuesto)){
 echo "Estoy vacio";
    header("Location: operador.php?Errordto#error");
    
	}else{

	$sqlverificacion = "SELECT id_dto FROM departamentos";
	$verificacion = mysqli_query($conn,$sqlverificacion);
   $positivo=0;
   $negativo=0;

 while($id=mysqli_fetch_array($verificacion)){
    if($id['id_dto']==$id_dto){
  	  $positivo++;
     	$sqlquery ="UPDATE departamentos SET nombre_dto='$nombre_dto', presupuesto=$presupuesto,fecha_asig_presupuesto=CURRENT_TIMESTAMP,presupuesto_act=$activo WHERE id_dto=$id_dto";
    	mysqli_query($conn, $sqlquery)or die(mysqli_error());
 			}else{
 				$negativo++;
				
 				}
		}
	if($positivo>0){
		header("Location: operador.php?okdto");
		}
}
