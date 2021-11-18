<?php   session_start();
include ("php/config.php");
       
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  <link rel="stylesheet" href="css/estilos.css">
	<title>Marcelo Donadini CRUD</title>
</head>
<body>
<section class="container borde">
  <div class="row container-fluid col-12 ">
  <nav class="navbar navbar-dark bg-dark">
  <h1>Pruebas con base de datos </h1>
</nav>
</div>
</section>

<section class="container borde mb-2">
<div class="row container-fluid col-12 ">
  <h2>Alta nuevo departamento</h2>
  <?php 
 if(isset($_GET['Errordto'])){
         echo '<div id="error"><h3 style="color:red";>"Es necesario completar el formulario"</h3></div>';
         }else if(isset($_GET['okadd'])){

            echo '<div id="okadd"><h3 style="color:green";>"Nuevo departamento ingresado"</h3></div>';
            
         }else if(isset($_GET['existe'])){

          echo '<div id="existe"><h3 style="color:red";>"El departamento ya existe"</h3></div>';
         } else if(isset($_GET['noexiste'])){

          echo '<div id="existe"><h3 style="color:red";>"El departamento no fue creado"</h3></div>';
        }



         ?>
<form id="formdto" action="" name="dtoNuevo" method="post">
  <div class="row g-3 m-2">
    <div class="col-12 col-sm-3">
    <input type="number" class="form-control" min="01" max="150" placeholder="ID Dto" name="id_dto" aria-label="ID Dto" >
  </div>
  <div class="col-12 col-sm-6">
    <input type="text" class="form-control" placeholder="Nombre Dto" name="nombre_dto" aria-label="Nombre Dto" >
  </div>
  <div class="col-12 col-sm-4">
    <input type="number" min="30000" class="form-control" placeholder="Presupuesto" name="presupuesto" aria-label="Presupuesto" >
  </div>
 <div class="col-12 col-sm-4">
    <input type="checkbox" name="activo" aria-label="Presupuesto">
    <label for="activo">activo</label>
  </div>

  <div class="col-12 col-sm-4">
    <button id="nDto" class="btn btn-success">Nuevo Dto</button>
    <button id="updateDto" class="btn btn-success">Actualizar Dto</button>
    
  </div>
  <div class="col-12 col-sm-4">
      <button id="listardto" class="btn btn-success">Listar Dto</button>
  </div>
</div>

</form>
<hr>

  <?php 
  $sql = "SELECT * FROM departamentos";

$result = mysqli_query($conn ,$sql);
  while ($fila = mysqli_fetch_assoc($result)){
   
?>
      <p class="col-3">Codigo dto: <?php echo $fila['id_dto'];?><br>
      Descripcion: <?php echo $fila['nombre_dto'];?><br>
      Presupuesto : <?php echo $fila['presupuesto'];?><br>
      Asignado : <?php echo $fila['fecha_asig_presupuesto'];?><br>
      activo : <?php 
          $activodto = $fila['presupuesto_act'];
            if($activodto){
            $activodto= "Si";
        }else{
          $activodto = "No";
         }

      echo $activodto;?>
    <a id="trash" href="php/deldto.php?id_dto=<?php echo $fila['id_dto']; ?>" ><img src="img/trash.png" alt="Eliminar"></a></p>
<?php } ?>


<hr>

<!--Segundo Formulario  --> 
<h2>Agregar empleado nuevo</h2>
 <?php  if(isset($_GET['Error'])){
           echo '<div id="erroruser"><h3 style="color:red";>"Es necesario completar el formulario"</h3></div>';
         }else if(isset($_GET['ok'])){

          echo '<div id="OkUser"><h3 style="color:green";>"Nuevo Empleado Registrado"</h3></div>';
         }

         ?>

<form id="form" action="" name="usuarioNuevo" method="post">
<div class="row g-3 m-2">
   <div class="col-12 col-sm-5">
    <input type="text" id="nom" class="form-control" placeholder="Nombre" name="nombre" aria-label="Nombre">
  </div>
  <div class="col-12 col-sm-5">
    <input type="text" class="form-control" placeholder="Apellido" name="apellido" aria-label="Apelido" >
  </div>
      <div class="col-12 col-sm-5">
    <input type="number" minlength="8"  class="form-control" placeholder="DNI" name="dni" aria-label="DNI" >
  </div>
  <div class="col-12 col-sm-3">
  
   <select name="cat">
      <option   value="0">Seleccione:</option>';
   <?php  
      $sqlquerycat = "SELECT id_dto, nombre_dto FROM departamentos";
        $resultado = mysqli_query($conn ,$sqlquerycat);
        while ($file = mysqli_fetch_array($resultado)){
    echo '<option name="cat" value="'.$file['id_dto'].'">'.$file['nombre_dto'].'</option>';
         
       } 

      ?>
    </select>
  </div>
 <div class="col-12 col-sm-4"> 

    <input type="checkbox" name="activo2" aria-label="activo2">
    <label for="activo">activo</label>
  </div>

    <div class="col-12 col-sm-6">
    <button id="add"  class="btn btn-success">Nuevo Empleado</button>
    <button id="update" class="btn btn-success">Actualizar Empleado</button>
  </div>
     <div class="col-12 col-sm-6">
    <button id="listarapellido"  class="btn btn-success">Listar Apellidos</button>
    <button id="query" class="btn btn-success">Query SQL</button>
  </div>
</div>
</form>
<hr>
<div id="listado">
  <table class="table table-striped">
    <thead><tr>
      <th>DNI</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Departamento</th>
      <th>Presupuesto</th>
      <th>Activo</th>
    </tr></thead>
  <?php  
      $sqlqueryjoin ="SELECT empleados.dni,empleados.nombre,empleados.apellido,empleados.activo, departamentos.nombre_dto,departamentos.presupuesto FROM empleados,departamentos where empleados.num_dto = departamentos.id_dto ORDER BY (nombre_dto)";
        $resultado = mysqli_query($conn ,$sqlqueryjoin);
        while ($file = mysqli_fetch_array($resultado)){
          
        echo '<tr>';
        echo '<td>'.$file['dni'].'</td>';
        echo '<td>'.$file['nombre'].'</td>';
        echo '<td>'.$file['apellido'].'</td>';
        echo '<td>'.$file['nombre_dto'].'</td>';
        echo '<td>'.$file['presupuesto'].'</td>';
          $activo = $file['activo'];
            if($activo){
            $activo= "Si";
        }else{
          $activo = "No";
         }
        echo '<td>'.$activo.'</td>';
echo '<td><button id="eliminar"  class="btn btn-warning"><a href="php/deluser.php?dni='.$file['dni'].'">Eliminar</a></button></td>';        
         echo'</tr>';
         
       
       } 
          
       ?> 
  </table>
</div>
</div>
</section>







 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
    <script type="text/javascript" src="js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js" crossorigin="anonymous"></script>
   <script src="js/sweetalert2.all.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
	<script type="text/javascript" src="js/custom.js"></script>

 <script type="text/javascript">
   
   
   

   


 </script>

</body>
</html>

