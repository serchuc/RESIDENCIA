<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>MENU CONSULTAS</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
</head>

<body>
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
  <h3 class="mt-5">Menu CONSULTAS BITACORA </h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
      
    
      <div align="left">
        
        <form  method="POST" class="form-inline" action="busqueda_aula.php">
          <div class="form-group mx-sm-3 mb-2">

          <select name="algo"  class="form-control" >
              <option value="">Seleccione:</option>
              <?php
          include 'conexion.php';
         
          $solicitud="SELECT * FROM alumno"; //EL ESTUDIANTE SOLO DE DEBE DE MOSTRAR UNA VEZ

          $consulta=mysqli_query($conexion ,$solicitud);

          while ($valores = mysqli_fetch_array($consulta)) {
            echo '<option value="'.$valores[alumno_id].'">'.$valores[nombre_alumno].'</option>';
          }
               
            mysqli_close($conexion);
                ?>
           </select>
          



          </div>
        
          <input type="submit" value="Enviar" class="btn btn-secondary btn-lg">
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