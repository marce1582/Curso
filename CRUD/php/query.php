<?php 
echo '<html>';
echo '<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">';
echo '<link rel="stylesheet" href="../css/estilos.css">';
echo '<body>';

   

echo '<section class="container"><pre col-sm-2>
// Query Apellido All

$sqlLastName ="SELECT apellido FROM `empleados`";

 //Query distinct Apellido

 $sqlLastNameD ="SELECT DISTINCT apellido FROM `empleados` ORDER BY `apellido`";

 // Query Apellido Lopez

 $sqlLastNameLopez ="SELECT apellido FROM `empleados` where apellido =`Lopez`";

 //Query Apellido Lopez y Perez

 $sqlLastNameLopezandPerez = "SELECT apellido FROM `empleados` where apellido =`Lopez` or apellido = `Perez`";

 // Query Dto 14

 $sqldto ="SELECT * FROM empleados WHERE num_dto = 14";

 //Query Dto 37 and 77 Order by 

 $sqldto37or77 = "SELECT * FROM empleados WHERE num_dto = 37 or num_dto = 77 ORDER BY num_dto";

 //Query apellido inica con P

 $sqlLastNameComP ="SELECT * FROM empleados WHERE apellido like `P%`";


 //Query suma de presupuestos

 $sqlSumaPre = "SELECT SUM(presupuesto) FROM departamentos";

 //Query join dos tablas

 $sqlqueryjoin ="SELECT empleados.nombre,empleados.apellido, departamentos.nombre_dto,departamentos.presupuesto FROM empleados,departamentos where mpleados.num_dto = departamentos.id_dto ORDER BY (presupuesto)";


 //Query join obtener presupuestos superiores a 60000


 $sqlqueryjoinsuperior = "SELECT empleados.nombre,empleados.apellido, departamentos.nombre_dto,departamentos.presupuesto FROM empleados, departamentos where empleados.num_dto = departamentos.id_dto AND departamentos.presupuesto >60000 ORDER BY(presupuesto)";

 //Query descontar %10 

 $sqlqueryporcen = "UPDATE departamentos SET presupuesto = presupuesto - (10 * presupuesto) /100";

 // Quey sumar porcentaje 

 $sqlqueryporcen = "UPDATE departamentos SET presupuesto = presupuesto + (10 * presupuesto) /100";
</pre>';
echo '</section><section class="container"><div class="col-sm-2">';
echo '<button class="btn btn-success"><a href="../index.php">Volver</a></button>';
echo '</div></section>';;




echo '<script type="text/javascript" src="../js/bootstrap.min.js"></script>';
echo '<script type="text/javascript" src="../js/dataTables.bootstrap5.min.js"></script>';
echo '</body></html>';
