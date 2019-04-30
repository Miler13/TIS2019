
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de docentes</title>
    <link rel="stylesheet" href="../css/masterRD.css">
</head>

<body>
    <form action="registrar-usuario.php" method="post">
        <div class="contenedor">
            <h1>Registro de Docentes</h1>
            <h2 class="form_titulo">Ingrese Datos</h2>

            <label for="nombre_docente">Nombre Docente</label>
            <input type="text" placeholder="Ingrese nombres" name="password">

            <label for="apellido_docente">Apellido Docente</label>
            <input type="text" placeholder="Ingrese apellidos">

           <?php
  $mysqli = new mysqli('localhost', 'stadust', 'N3^B<gv9(=~WLv;', 'stadust_db');
?>


            <label for="paises" class="sr-only">Materia:
            <select class="form-control" >
              <option value="">Seleccione:</option>
              <?php
          $query = $mysqli -> query ("SELECT * FROM materia");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[nombre].'">'.$valores[nombre].'</option>';
          }
        ?>
            </select>
        </label>
               <label > </label>

            <label for="correo_electronico">Correo Electronico</label>
            <input type="text" placeholder="Ingrese correo electronico" name = "username">



            <input type="submit" value="Registrar" class="btn-enviar">
            <p class="form_Link">Hay problemas con la creacion de cuenta?</p>

        </div>

</form>


    <script src="assets/jquery-1.12.4-jquery.min.js"></script>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>
