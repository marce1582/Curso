<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <title>CRUD</title>
</head>
<body class="bg">
    <header style="height: 70px"></header>
    <div style="height: 30px;"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card d-flex shadow-lg p-3 mb-5 bg-white ">
               <div class="card-header bg-dark text-white d-flex justify-content-center">Bienvenido</div>
                <div class="card-body ">
                    <form id="form1" action="" name="login2" method="post" class="needs-validation" novalidate>
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
                            <button id="enviar" type="submit" class="btn btn-primary mt-3 col-12">login</button>
                            </div>
                                                           
                        </div>
                        <div>
                                <p>User: admin Pass: admin12345</p>
                                <p>User: operador Pass :123456</p>
                            </div>
                          <?php 
                                if(isset($_GET['solicitud'])){

                                echo '<div id="solicitud" class="text-primary> Solicitud generada con existo.</div>' ;
                                    }

                                if(isset($_GET['loginerror'])){
                                echo '<div id="loginerror" class="text-danger> Usuario y/o Contraseña incorrecta.</div>' ;
                                }    
                                if(isset($_GET['loginerror2'])){
                                echo '<div id="loginerror" class="text-danger"> Usuario y/o No se encuentra habilitado.</div>' ;
                                }    
                                ?>
                    </form>
                    <p>No tienes usuario ? <a class="text-start" href="php/registro.php"> Registrate</a></p>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
 <script type="text/javascript">
        let btnenviar = document.getElementById("enviar");
        btnenviar.addEventListener('click', validar);
      </script>
</body>
</html>