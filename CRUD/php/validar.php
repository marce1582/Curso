<?php 
include_once("conectar.php");
require("PHPMAILER/class.phpmailer.php");
require("PHPMAILER/class.smtp.php");
	


		$usuario =$_POST['nombre'];
		$clave = password_hash($_POST['clave'],PASSWORD_DEFAULT);
        $correo = $_POST['correo'];
		$rol = $_POST['sel'];
    
		$activo = 0;

$sql ="INSERT INTO usuarios VALUES('','$usuario','$rol','$clave','$correo',CURRENT_TIMESTAMP,$activo)";
    mysqli_query($conn, $sql) or die("Problemas en el registro".mysqli_error($conn));
     mysqli_close($conn);
     


$mensaje="Solicitud de alta";

$admin ='operador7050@gmail.com';
$smtpUsuario = "operador7050@gmail.com";
$smtpHost = "smtp.gmail.com"; 
$smtpClave = "0p3rad0r2021";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Port = 587; 
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";

$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $correo; // Email desde donde env�o el correo.
$mail->FromName = $usuario;
$mail->AddAddress($admin, " Solicitud de alta");

$mail->Subject = "Formulario de ALta "; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "
<html> 
<body> 
<h1>Solicitud de alta </h1>
<p>Informacion enviada por el usuario de la web:</p>

<p>nombre: {$usuario}</p>
<p>email: {$correo}</p>
<p>mensaje: {$mensaje}</p>
<p>clave : {$clave}</p>
</body> 



</html>
<br />";

$mail->AltBody = "{$mensaje} \n\n ";

$estadoEnvio = $mail->Send(); 



?>

