<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="favicon.ico">
<title>BITACORA</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<script src="jquery-3.4.1.js"></script>







</head>

<body>
  <?php 
date_default_timezone_set('America/Mexico_City');
$fecha_actual=date("Y-m-d H:i:s");
?>

<header> 
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="menu.php">Inicio <span class="sr-only">(current)</span></a> </li>
      </ul>
   
    </div>
  </nav>
</header>

<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5"><a  target="_blank">Bitacora</a></h3>
  <hr>
  <div class="row">
    <div class="col-15 col-md-12"> 
      <!-- Contenido -->
      
      
      <div align="left">
               
        <form method="POST"  class="form-inline" action="captura.php">

        <!-- TURNO -->
        <label for="staticEmail2">Turno:</label>
        <div class="form-group mx-sm-3 mb-2">

        <select name="turno" id="turno">
        
        <option value="MATUTINO">MATUTINO</option>
        <option value="VESPERTINO">VESPERTINO</option>
        </select>
        </div>
        <!-- TERMINA TURNO -->

          <!-- MAESTRO -->
          <div class="form-group mx-sm-3 mb-3 ">
            <label for="staticEmail2">Maestro:</label>
          </div>
           <div class="form-group mx-sm-3 mb-2">    
            <select name="maestros" id="maestros" class="form-control" >
            </select>
          </div>

          <!-- TERMINA MAESTRO -->
        

        <!-- FECHA Y HORA -->
        <label for="staticEmail2">Fecha y hora:</label>
        <div class="form-group mx-sm-3 mb-2">
        <label><input type="datetime" name="fecha" value="<?=$fecha_actual?> "> </label>
        </div>
        <!-- TERMINA FECHA Y HORA -->
       


        <!-- GRADO--> 
        <div class="form-group mx-sm-3 mb-3 ">
            <label for="staticEmail2">Grado:</label>
        </div>
        
        <div class="form-group mx-sm-3 mb-2"> 
        <select name="grado" id="grado" class="form-control" >
         <option value="1ro">Primero</option>
         <option value="2do">Segundo</option>
         <option value="3ro">Tercero</option>
        </select>
        </div>
      <!--TERMINA GRADO--> 
      

      <!-- GRUPO--> 
         <div class="form-group ">
         <label for="grupo">Grupo</label>
         <select name="grupo" id="grupo" class="form-control">
          <option value="A">A</option>
           <option value="B">B</option>
           <option value="C">C</option>
           <option value="D">D</option>
           <option value="E">E</option>
           <option value="F">F</option>
           <option value="G">G</option>
           <option value="H">H</option>
           <option value="I">I</option>
           <option value="J">J</option>
           <option value="K">K</option>
           <option value="L">L</option>
           <option value="M">M</option>
           <option value="N">N</option>
         <option>...</option>
         </select>
         </div>
        <!-- TERMINA GRUPO--> 


        <!-- ALUMNO -->
        <label for="staticEmail2">Nombre del alumno:</label>
        <div class="form-group mx-sm-3 mb-2">
         
        <select name="alumno" id="alumno" class="form-control" >
        
        <option value="">Seleccione:</option>     
        </select>


        </div>
        <!-- TERMINA ALUMNO -->
        

     
      
       <!-- AULA--> 
        
      <div class="form-group mx-sm-3 mb-3 ">
            <label for="staticEmail2">Aula:</label>
          </div>


           <div class="form-group mx-sm-3 mb-2">    
          <select name="aula" id="aula" class="form-control" >
              <option value="">Seleccione:</option>
              <?php
          include 'conexion.php';
         
          $solicitud="SELECT aula_id FROM aula"; //es con AJAX Y SE TIENE PASAR EL PARAMETRO DEL OTRO CAMPO

          $consulta=mysqli_query($conexion ,$solicitud);

          while ($valores = mysqli_fetch_array($consulta)) {
            echo '<option value="'.$valores[aula_id].'">'.$valores[aula_id].'</option>';
          }
               
            mysqli_close($conexion);
                ?>
            </select>
          </div>
      <!--TERMINA AULA-->

        <!-- LAPTOPS--> 
          <div class="form-group mx-sm-3 mb-3 ">
            <label for="staticEmail2">Laptop:</label>
          </div>


           <div class="form-group mx-sm-3 mb-2">    
            <select name="laptop" id="laptop" class="form-control" >
        
            </select>
          </div>
       
          <!-- Iniciamos el segmento de codigo javascript -->
    <script type="text/javascript">
      $(document).ready(function(){
        var laptops = $('#laptop');
        var maestros = $('#maestros');
        var grupo = $('#grupo');
        var grado= $('#grado');


        //Ejecutar accion al cambiar de opcion en el select 
        $('#aula').change(function(){
          var aula_id = $(this).val(); //obtener el id seleccionado

          if(aula_id !== ''){ //verificar haber seleccionado una opcion valida

            /*Inicio de llamada ajax*/
            $.ajax({
              data: {aula_id:aula_id}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
              dataType: 'html', //tipo de datos que esperamos de regreso
              type: 'POST', //mandar variables como post o get
              url: 'get_laptops.php' //url que recibe las variables
            }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion             

              laptops.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax             
              laptops.prop('disabled', false); //habilitar el select
            });
            /*fin de llamada ajax*/

          }else{ //en caso de seleccionar una opcion no valida
            laptops.val(''); //seleccionar la opcion "- Seleccione -", osea como reiniciar la opcion del select
           laptops.prop('disabled', true); //deshabilitar el select
          }    
          });

        
        /*SEGMENTO DE MAESTRO TURNO*/

          $('#turno').change(function(){
          var turno = $(this).val(); //obtener el id seleccionado

          if(turno !== ''){ //verificar haber seleccionado una opcion valida

            /*Inicio de llamada ajax*/
            $.ajax({
              data: {turno:turno}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
              dataType: 'html', //tipo de datos que esperamos de regreso
              type: 'POST', //mandar variables como post o get
              url: 'get_maestros.php' //url que recibe las variables
            }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion             

              maestros.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax             
              maestros.prop('disabled', false); //habilitar el select
            });
            /*fin de llamada ajax*/

          }else{ //en caso de seleccionar una opcion no valida
            maestros.val(''); //seleccionar la opcion "- Seleccione -", osea como reiniciar la opcion del select
           maestros.prop('disabled', true); //deshabilitar el select
          }    
        });


      });
    </script>   
        <!-- TERMINA LAPTOPS--> 
       

       
        
        <!--INCIDENCIA-->
        <label for="staticEmail2">INCIDENCIA:</label>
        <div class="form-group mx-sm-3 mb-2">
        <input type="text" name="incidencia"> <br>
        </div>
        <!--TERMINA INCIDENCIA-->
          <input type="submit" value="Enviar">
      </form>

      </div>
      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 
  
</div>
<!-- Fin container -->




<script src="assets/jquery-1.12.4-jquery.min.js"></script> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>