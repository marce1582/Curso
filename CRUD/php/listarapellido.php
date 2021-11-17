<?php 
include_once("config.php");
echo '<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">';
echo '<link rel="stylesheet" href="../css/estilos.css">';

echo '<section class="container mb-2">';
echo '<div class="col-sm-2">';
echo '<table class="table table-striped">
    <thead><tr>
      
      <th>Apellido</th>
      
    </tr></thead>';
$sqlLastName ="SELECT apellido FROM `empleados`";

$result = mysqli_query($conn ,$sqlLastName);
  while ($fila = mysqli_fetch_array($result)){
   
  echo '<tr>';
  echo '<td>' .$fila['apellido'].'</td>';
  echo '</tr>';

}
echo '</table>';
echo '</div>';
echo '</section><section class="container"><div class="col-sm-2">';
echo '<button class="btn btn-success"><a href="../index.php#listado">Volver</a></button>';
echo '</div></section>';;




echo '<script type="text/javascript" src="../js/bootstrap.min.js"></script>';
echo '<script type="text/javascript" src="../js/dataTables.bootstrap5.min.js"></script>';
echo '</body></html>';
