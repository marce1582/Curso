<?php 
include_once("conectar.php");
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:../index.php");
}
echo '<link rel="stylesheet" href="../css/bootstrap.min.css">
	  <link rel="stylesheet" href="../css/estilos.css">
	 <link rel="shortcut icon" href="#" type="image/x-icon">';

$sql="SELECT * FROM usuarios WHERE nombre!='admin'";


$resultado =mysqli_query($conn,$sql);
echo '<body class="bg-operador"><section class="container-fluid>"
	  <div class="row">
	  	<div class="col-12">
	  			  <div class="card-body ">
                    <form id="formRegistro" action="" name="login" method="post">
                        <div class="form-row d-flex justify-content-center">
                            <div class="col-1 mb-3">
                                <label for="nombre" class="form-label">ID Usuario</label>
                                <input  type="number" min="1" name="id" class="form-control" id="nombre" placeholder="" value="" required>
                            </div>
                        </div>
                        <div class="form-row d-flex justify-content-center">
                            <div class="col-1 mb-3">
                            	<label for="act">on = 1<br> off = 0</label>
                                <input name="act" type="number" class="form-control" id="act" min="0" max="1" value="" >
                            </div>
                        </div>
                        <div class="form-row d-flex justify-content-center">
                        	<div class="col-1">
                        		<button name="on" class="btn btn-outline-danger">on/off</button>
                        	</div>
                        </div>
  					</form>
				   </div>
		</div>		   
	  </div>
	 </section>';


echo '<section class="container-fluid">
  <div class="row">
<div class="col-2">
  </div>';
echo '<div class="col-8"><table id="data_table" class="table table-dark">
            <thead>
            <tr>
            <th>id</th>
            <th>nombre</th>
            <th>Correo</th>
            <th>Fecha de alta</th>
            <th>activo</th>
             </tr>
            </thead>';

 while($fila=mysqli_fetch_array($resultado)){
 	echo '<tbody><tr>';
 	echo '<td>'.$fila['id'].'</td>';
 	echo '<td>'.$fila['nombre'].'</td>';
 	echo '<td>'.$fila['correo'].'</td>';
 	echo '<td>'.$fila['alta'].'</td>';
 	echo '<td>'.$fila['activo'].'</td>';
 


 	echo '</tr></tbody>';
	
 }
  echo '</table></div>
  </div></section>

              <div class="form-row d-flex justify-content-center">
                  <div class="col-1">
                  	<button  class="btn btn-outline-dark m-2"><a href="admin.php">regresar</a></button>
                  	</div>
               </div>';

  if(isset($_POST['on'])){

  $id= $_POST['id'] ;
  $activo=$_POST['act'];



  	$sqlupt ="UPDATE usuarios SET activo=$activo WHERE id=$id";

 	mysqli_query($conn,$sqlupt)or die("Problemas al modificar".mysqli_error($conn));

 	 mysqli_close($conn);
 	 echo("<meta http-equiv='refresh' content='1'>");
  
  }
 

 echo '<script type="text/javascript" src="../js/bootstrap.min.js"></script></body>';
