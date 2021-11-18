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

$cant="SELECT count(id_dto) FROM departamentos";
mysqli_query($conn, $cant)or die(mysqli_error());
 $resultado =mysqli_num_rows($cant);
 echo'<pre>';
 var_dump($resultado);
 echo'</pre>';

/*while($id1=mysqli_fetch_array($resultado)){
	var_dump ( $id1[count('id_dto')]);
}


$sqlverificacion = "SELECT id_dto FROM departamentos";
mysqli_query($conn, $sqlverificacion)or die(mysqli_error());
$verificacion = mysqli_query($conn,$sqlverificacion);
/*while($id=mysqli_fetch_array($verificacion)){
   
 for($i=0;$i<count($id['id_dto']);$i++){
         
         if(!($id_dto==$id['id_dto']){
         	
         	$diff = $id['id_dto'];

         }else{

         	$igual=$id['id_dto'];
         }
   }
}
   //if($id_dto==$id['id_dto']){
   if($igual==$id['id_dto']){
    	header("Location: ../index.php?existe#existe");
    }else{


$sqlqueryinsert ="INSERT INTO departamentos VALUES($id_dto,'$nombre_dto',$presupuesto, CURRENT_TIMESTAMP,$activo)";


mysqli_query($conn, $sqlqueryinsert)or die(mysqli_error());
mysqli_close($conn);
  
 header("Location: ../index.php?okadd#okadd");
 //break;
 }*/
}

