<?php 
include_once("config.php");

echo '<html>';
echo '<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">';
echo '<link rel="stylesheet" href="../css/estilos.css">';
echo '<body>';


echo '<section class="container mb-2">';
echo '<div class="col-sm-2">';
echo '<table class="table table-striped">
    <thead><tr>
       <th>ID</th>
       <th>Descripcion</th>
    </tr></thead>';
$sql = "SELECT id_dto, nombre_dto FROM departamentos";

$result = mysqli_query($conn ,$sql);
  while ($fila = mysqli_fetch_array($result)){
   
  echo '<tr>';
  echo '<td>'.$fila['id_dto'].'</td>';
  echo '<td>'.$fila['nombre_dto'].'</td>';
  echo '</tr>';

}
echo '</table>';
echo '</div>';
echo '</section><section class="container"><div class="col-sm-2">';
echo '<button class="btn btn-success"><a href="../index.php">Volver</a></button>';
echo '</div></section>';;




echo '<script type="text/javascript" src="../js/bootstrap.min.js"></script>';
echo '<script type="text/javascript" src="../js/dataTables.bootstrap5.min.js"></script>';
echo '</body></html>';
