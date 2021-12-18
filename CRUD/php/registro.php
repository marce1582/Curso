<?php 
include_once("conectar.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="#" type="image/x-icon">
	<title id="registrophp" value="1">Registro</title>
</head>
<body class="bg">
	<header style="height: 70px"></header>
    <div style="height: 30px;"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card d-flex shadow-lg p-3 mb-5 bg-white ">
               <div class="card-header bg-dark text-white d-flex justify-content-center">Solicita tu usuario</div>
                <div class="card-body ">
                    <form id="formRegistro" action="" name="login" method="post" class="needs-validation" novalidate>
                        <div class="form-row d-flex justify-content-center">
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label">Usuario</label>
                                <input  type="text" name="nombre" class="form-control" id="nombre" placeholder="" value="" required>
                            </div>
                        </div>
                        <div class="form-row d-flex justify-content-center">
                            <div class="col-md-6 mb-3">
                            	<label for="clave">Password</label>
                                <input name="clave" type="password" class="form-control" id="clave" placeholder="" value="" >
                            </div>
                        </div>
                        <div class="form-row d-flex justify-content-center">
                            <div class="col-md-6 mb-3">
                                <label for="correo">correo</label>
                                <input name="correo" type="email" class="form-control" id="correo" placeholder="correo" value="" >
                            </div>
                        </div>
                   
              <div class="form-check col-md-8 d-flex justify-content-center">
                 <label for="sel">Seleccionar Perfil</label>
               </div>
              <div class="form-check col-md-8 d-flex justify-content-center">
                <select name="sel">
                    <option value="0"></option>
            <?php  
                   
                    $sql = "SELECT id, rol_name FROM `roles`";

                     $resultado = mysqli_query($conn,$sql);
                

                  while($file=mysqli_fetch_array($resultado)){
                    

                echo'<option name="sel" value="'.$file['id'].'">'.$file['rol_name'].'</option>';        
                        
                        }
                         ?>
                </select>

                            </div>

                          <div class="form-row d-flex justify-content-center">
                            <div class="col-md-6 mb-3">
                            	<button id="registro" name="send" type="submit" class="btn btn-primary mt-3 col-12">Enviar</button>
                            </div>
                        </div>
                      
                    </form>
                    <p>Tienes usuario identificate <a href="../index.php"> Regresar</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../js/bootstrap.min.js"></script>
<script src="../js/custom2.js"></script>
<script type="text/javascript">
let btnRegistro= document.getElementById("registro");
btnRegistro.addEventListener('click', validar);
</script>
</body>
</html>

