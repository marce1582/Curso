<?php

try{

$db ="c1115";    
$userdb ="root"; 
$passDB=""; 

		$usuario =htmlentities(addslashes($_POST['nombre']));
		$clave = htmlentities(addslashes($_POST['clave']));

		$base = new PDO("mysql:host=localhost; dbname=$db","$userdb","$passDB");
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$sql ="SELECT * FROM usuarios WHERE nombre= :usuario";
		$resultado = $base->prepare($sql);
		$resultado->bindValue(":usuario", $usuario);

		$resultado->execute();
		$registro=$resultado->rowCount();
		$clave2 = $resultado->fetch(PDO::FETCH_ASSOC);
		

	if($registro!=0){
		if(is_array($clave2)){
			if(password_verify($clave, $clave2['clave'])){
				session_start();
	 				$_SESSION['usuario'] = $_POST['nombre'];
	 					$perfil = $clave2['rol'];
	 					$activo = $clave2['activo'];

	 		if($activo!=0){

	 			switch ($perfil){
	 			  case 2 :
	 			
	 				header("Location:admin.php");
	 				break;
	 			  case 3 :
	 				   
	 				header("Location:operador.php");
	 						break;
	 					default:
	 						// code...
	 						break;
	 				}
	 			}else{
	 				header("location:../index.php?loginerror2");
	 			}


 					
   				}else{
					header("location:../index.php?loginerror");
					 }
				
	}else{

	header("location:../index.php?loginerror");
}
}else{

	header("location:../index.php?loginerror");
}


}catch(Exception $e){

	die("Error: " . $e->getMessage());
}