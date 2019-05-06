<?php
  $conexion=mysqli_conect('localhost', 'root', 'pruebas');
?>

<!DOCTYPE html>
<head>
    <title>Estudiante</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="../menus/menuInscripcion.css">
    <script src= "../js/all.js"></script>
  </head>
  <body>
          <table class="tabla">
                  <tr>
                    <td>Estudiante</td>
                    <td>Inscribirse a un curso</td>
                    <td>
                       <div class="wrap">
                           <div class="widget">
                             <div class="fecha">
                               <p id="diaSemana" class="diaSemana"></p>
                               <p id="dia" class="dia"></p>
                               <p>de </p>
                               <p id="mes" class="mes"></p>
                               <p>del </p>
                               <p id="year" class="year"></p>
                              </div>
                              <div class="reloj">
                                <p id="horas" class="horas"></p>
                                <p>:</p>
                                <p id="minutos" class="minutos"></p>
                                <p>:</p>
                                <div class="caja-segundos">
                                 <p id="ampm" class="ampm"></p>
                                 <p id="segundos" class="segundos"></p>
                                </div>
                              </div>
                          </div>
                       </div>
                       <script src="../js/reloj.js"></script>
                    <td>

                  </tr>

          </table>

          <h3>

          <table class="tablaDatos" >
            <tr>
                <td>Nombre Materia</td>
                <td>grupo</td>
            </tr>
            <?php
            $sql= "SELECT * from ______";
            $result=mysqli_query($conexion,$sql);

            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar ['_____']?>aqui entra nombre de materias</td>
                <td><?php echo $mostrar ['_____']?>aqui entra el numero de grupo</td>
            </tr>
            <?php
            }
            ?>
          </table>

        </h3>

        

      <table class="tablaH">
              <tr>
                <td><i class="icon fas fa-step-backward"></i><a href="javascript:history.go(-1)">Atrás </a></td>
                <td><i class="icon fas fa-home"></i><a href="index.html">Home</a></td>
                <td><a href="javascript:history.go(1)">Adelante</a><i class="icon fas fa-step-forward"></i></td>

              </tr>

      </table>
      <h1>Escoja el curso al que desea inscribirse</h1>
      
     <h2> Plataforma es Diseño y Desarrollo de Stardust soft S.R.L Copyright © 2014-2019 . Todos los derechos reservados.<br>
     Stardust soft S.R.L - STARDUST SOFT SOCIEDAD DE RESPONSABILIDAD LIMITADA.<br>
     UMSS - Universidad Mayor de San Simon</h2>
  </body>
  </html>