<?php
include_once ("conectar.php"); 
session_start();

if(!isset($_SESSION['usuario'])){
  header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="shortcut icon" href="#" type="image/x-icon">
  <title>Marcelo Donadini CRUD</title>
</head>
<body class="bg-operador">

<section class="container-fluid">
  <div class="row">
 

      <div class="col-9 col-md-10 bg-primary">
           <h1 class="">Bienvenid@ <?php echo strtoupper($_SESSION['usuario']);?></h1>
    </div>
    <div class="col-3 col-md-2 bg-primary">
      <a class="text-start" href="cerrarsession.php"><button class="btn btn-outline-dark m-2" type="button">cerrar sesion</button></a>
    </div>
  </div>
</section>

<section class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-md-6">

      <h2>Alta nuevo departamento</h2>
  <?php
 
 if(isset($_GET['Errordto'])){
         echo '<div id="error"><h3 style="color:red";>"Es necesario completar el formulario"</h3></div>';
         }
   if(isset($_GET['existe'])){
         echo '<div id="existe"><h3 style="color:red";>"El departamento ya existe"</h3></div>';
       }
    if(isset($_GET['noexiste'])){
          echo '<div id="existe"><h3 style="color:red";>"El departamento no fue creado"</h3></div>';
        }
         ?>
<form id="formdto" action="" name="dtoNuevo" method="post">
  <div class="row g-3 m-2">
    <div class="col-12 col-m-3">
    <input type="number" class="form-control" min="01" max="150" placeholder="ID Dto" name="id_dto" id="id_dto" aria-label="ID Dto" >
  </div>
  <div class="col-12 col-m-6">
    <input type="text" class="form-control" placeholder="Nombre Dto" name="nombre_dto" id="nombre_dto" aria-label="Nombre Dto" >
  </div>
  <div class="col-12 col-m-4">
    <input type="number" min="30000" class="form-control" placeholder="Presupuesto" name="presupuesto" id="presupuesto" aria-label="Presupuesto" >
  </div>
 <div class="col-12 col-m-4">
    <input type="checkbox" name="activo" aria-label="Presupuesto">
    <label for="activo">activo</label>
  </div>

<?php 
    

     ?>


  <div class="col-12 col-m-4">
    <!--button id="nDto" class="btn btn-success">Nuevo</button-->
    <button id="updateDto" name=""   class="btn btn-outline-dark m-1">Actualizar</button>
    
  </div>
  <div class="col-12 col-m-4">
      <button id="" name="btnlist" class="btn btn-outline-dark m-1">Listar</button>
      <button id="" name="btnclear" class="btn btn-outline-dark m-1">Limpiar</button>
  </div>
</div>
<?php
if(isset($_GET['okdto'])){

   echo '<div id="ok" class="display-5 text-primary">Dto Actualizado</div>';
            
         }

 if(isset($_GET['no'])){
  echo '<div class="fs3 text-warning">
        No existe el dto, imposible modificar
        </div>';

 }

?>
</form>
    </div>
<!--Segundo Formulario  --> 
<div class="col-sm-12 col-md-6">
         <h2>Agregar empleado nuevo</h2>
 <?php  

       if(isset($_GET['Error'])){
           echo '<div id="erroruser"><h3 style="color:red";>"Es necesario completar el formulario"</h3></div>';
         
         }else if(isset($_GET['ok'])){

          echo '<div id="OkUser"><h3 style="color:green";>"Nuevo Empleado Registrado"</h3></div>';
          
         }else if(isset($_GET['okUpt'])){

          echo '<div id="OkUser"><h3 style="color:green";>"Empleado Actualilzado"</h3></div>';
          
         }

         ?>

  <form id="form" action="" name="usuarioNuevo" method="post">
    <div class="row g-3 m-2">
        <div class="col-12 col-m-3">
        <input type="text" id="nom" class="form-control" placeholder="Nombre" name="nombre" aria-label="Nombre">
      </div>
      <div class="col-12 col-m-6">
          <input type="text" class="form-control" placeholder="Apellido" name="apellido" aria-label="Apelido" >
       </div>
      <div class="col-12 col-m-4">
          <input type="number" minlength="8"  class="form-control" placeholder="DNI" name="dni" aria-label="DNI" >
      </div>

  <div class="col-12 col-m-4">
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

  <div class="col-12 col-m-4"> 
    <input type="checkbox" name="activo2" aria-label="activo2">
    <label for="activo">activo</label>
  </div>

    <div class="col-12 col-sm-6">
      <button id="add"  class="btn btn-outline-dark m-1">Nuevo</button>
      <button id="update" class="btn btn-outline-dark m-1">Actualizar</button>
   </div>
      <div class="col-12 col-sm-6">
         <button id="" name="btnclear" class="btn btn-outline-dark m-1">Limpiar</button>
         <button id=""  name="listlastname"class="btn btn-outline-dark m-1">Apellidos</button>
         <button id="" name="query" class="btn btn-outline-dark m-1">Empleados</button>
      </div>
</div>
</form>
</div>
</section>
<section class="container-fluid">
  <div class="row">
<div class="col-3">
  </div>
     <div id="listado" class="col-4">
       <?php  
  
             if(isset($_POST['query'])){

      echo '<table id="data_table" class="table table-dark">
               <thead><tr>
               <th>DNI</th>
               <th>Nombre</th>
               <th>Apellido</th>
               <th>Departamento</th>
               <th>Presupuesto</th>
               <th>Activo</th>
               <th>Accion</th>
               </tr></thead>';
 
    
      $sqlqueryjoin ="SELECT empleados.dni,empleados.nombre,empleados.apellido,empleados.activo, departamentos.nombre_dto,departamentos.presupuesto FROM empleados,departamentos where empleados.num_dto = departamentos.id_dto  ORDER BY (nombre_dto)";
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
            $activo="Si";
        }else{
          $activo = "No";
         }

        echo '<td>'.$activo.'</td>';

        echo '<td><button id="eliminar"  class="btn btn-outline-danger"><a href="deluser.php?dni='.$file['dni'].'">Eliminar</a></button>
        </td>';        
         echo'</tr>';
         
   } 
     }else if(isset($_POST['listlastname'])){

      echo '
      <table class="table table-dark">
      <thead><tr>
      <th></th>
      <th>Apellidos</th>
      <th></th>
      </tr></thead>';

    $sqlLastName ="SELECT apellido FROM `empleados` WHERE num_dto!=0";
        $result = mysqli_query($conn ,$sqlLastName);
          while ($fila = mysqli_fetch_array($result)){
           echo '<tr>
              <td></td>
               <td>'.$fila['apellido'].'</td>
               <td></td>
               </tr>';
       }
      }
        
     ?> 
      
      </table>
</div>





<div class="col-12">
      <?php 
      if(isset($_POST['btnlist'])){
      echo '<h2>Departamentos</h2>';
      
          $sql = "SELECT * FROM departamentos WHERE id_dto!=0";

         $result = mysqli_query($conn ,$sql);
    echo '<table id="data_table" class="table table-dark">
            <thead>
            <tr>
            <th>Codigo dto</th>
            <th>Descripcion</th>
            <th>Presupuesto</th>
            <th>Asignado</th>
            <th>activo</th>
            </tr>
            </thead>';

   while ($fila = mysqli_fetch_array($result)){
             
       $activodto = $fila['presupuesto_act'];
        if($activodto){
            $activodto= "Si";
        }else{
          $activodto = "No";
         }

      echo '<tbody><tr>';
      echo '<td>'.$fila['id_dto'].'</td>';
      echo '<td>'.$fila['nombre_dto'].'</td>';
      echo '<td>'.$fila['presupuesto'].'</td>';
      echo '<td>'.$fila['fecha_asig_presupuesto'].'</td>';
      echo '<td>'. $activodto.'</td>
      </tr>
      </tbody>
      ';
           }
          echo '</table>';

} 
if (isset($_POST['btnclear'])) {

echo("<meta http-equiv='refresh' content='1'>");
  // code...
}

?>

 </div>
</div>
</section>




    
     <script type="text/javascript" src="../js/bootstrap.min.js"></script>
     <script type="text/javascript" src="../js/custom.js"></script>
 <script type="text/javascript">
   
let btnUpdateDto= document.getElementById("updateDto");
btnUpdateDto.addEventListener('click',validar2);

let btnAdd=document.getElementById("add");
btnAdd.addEventListener('click', valadd);

let btnUpdateUser = document.getElementById("update");
btnUpdateUser.addEventListener('click',validarUpdate);

 </script>
     
</body>
</html>
