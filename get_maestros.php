<?php
require_once 'conexion.php'; //libreria de conexion a la base

$turno = filter_input(INPUT_POST,'turno'); //obtenemos el parametro que viene de ajax

if($turno != ''){ //verificamos nuevamente que sea una opcion valida
  
  if(!$conexion){
    die("<br/>Sin conexi&oacute;n.");
  }

  /*Obtenemos los discos de la banda seleccionada
  $solicitud="SELECT * FROM alumno WHERE familia  LIKE '%$familia' ";
  $sql = "select laptop_id  from laptop where aula_id = ".$aula;  
  */
  $sql = "SELECT * FROM maestro WHERE Turno  LIKE '%$turno' ";
  $query = mysqli_query($conexion, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC); 
  mysqli_close($conexion);
}

/**
 * Como notaras vamos a generar código `html`, esto es lo que sera retornado a `ajax` para llenar 
 * el combo dependiente
 */
?>

<option value="">- Seleccione -</option>
<?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
<option value="<?= $op['maestro_id'] ?>"><?= $op['nombre_maestro'] ?></option>
<?php endforeach; ?>