<?php
include 'conexion.php';

$maestro=$_POST['maestros'];
$fecha=$_POST['fecha'];
$turno=$_POST['turno'];
$alumno=$_POST['alumno'];
$grado=$_POST['grado'];
$grupo=$_POST['grupo'];
$laptop=$_POST['laptop'];
$aula=$_POST['aula'];
$incidencia=$_POST['incidencia'];


$consulta="INSERT INTO bitacora (maestro_id,fecha,turno,alumno,grado,grupo,laptop_id,aula,incidencia) 


VALUES ('$maestro','$fecha','$turno','$alumno','$grado','$grupo','$laptop','$aula','$incidencia')"; 
 


$ejecutar=mysqli_query($conexion,$consulta);


if($ejecutar>0)  
   {  
      echo'<script>alert("Se inserto con exito")</script>';  
   
   }  
   
else  
   {  
      echo'<script>alert("Error al insertar")</script>';

   } 







 ?>