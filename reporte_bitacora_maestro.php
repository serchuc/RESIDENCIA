<?php 
 include 'conexion.php';
$maestro=$_POST['maestro'];
$solicitud="SELECT * FROM bitacora WHERE maestro_id  LIKE '%$maestro' ";
$resultado= mysqli_query($conexion,$solicitud);


echo"<table border =1>  <tr><td>ID MAESTRO</td> <td>FECHA</td><td>TURNO</td><td>ALUMNO</td> <td>GRADO</td>  <td>GRUPO</td><td>LAPTOP_ID</td><td>AULA</td><td>INCIDENCIA</td>";
while ($fila= mysqli_fetch_array($resultado)){
       echo"<tr>";
       echo "<td>".$fila['maestro_id']."</td>";
       echo "<td>".$fila['fecha']."</td>";
       echo "<td>".$fila['turno']."</td>";
       echo "<td>".$fila['alumno']."</td>";
       echo "<td>".$fila['grado']."</td>";
       echo "<td>".$fila['grupo']."</td>";
       echo "<td>".$fila['laptop_id']."</td>";
       echo "<td>".$fila['aula']."</td>";
       echo "<td>".$fila['incidencia']."</td>";
 
       echo "</tr>";
    
}
echo"</table>";




 ?>