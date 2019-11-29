
<?php
$dato = $_POST['id'];

include '../admin/conexion.php';


      
      
                $registro = mysqli_query($conexion,"SELECT * FROM mensajes  WHERE idMensaje= '$dato'");

                $registro2 = mysqli_fetch_array($registro);


               $remi= $registro2['Remitente'];
               $mensaje= $registro2['Mensaje'];
               $ima= $registro2['foto'];
               
                $tam=strlen($mensaje);
                $letra=substr($mensaje,$tam-1,$tam-1);
                $advertencia="";
                if($letra=="P"){
                    $advertencia="El contenido de la carta contiene palabras malas, agresivas es recomendable enviar a un area de psicologia";
                }else{
                    if($letra=="E"){
                        $advertencia="El contenido de la carta contiene contenido educativo, propio de un buen escritor de carta";

                    }else{
                        $advertencia="El contenido de la carta es comun";
                    }
                }
                $mensaje=substr($mensaje,0,$tam-2);
      ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     
</head>

<body>

<br>
    <!-- Page Content -->
    <div class="container">

     

        <!-- Content Row -->

            <!-- Sidebar Column -->
 

      <div class="row">
            <div class="col-lg-8">
                <h2 class="page-header"><?php echo $remi?></h2>
            </div>
            <div class="col-md-6">
                
                    <strong><?php echo $mensaje ?></strong>
                
                    <br><br><br>
                <?php 
                    if($letra=='P'){
                        echo '<h5 style="color:#cc0000">' . $advertencia . '</h6>';
                    }else{
                        if($letra=='E'){
                            echo '<h5 style="color:green">' . $advertencia . '</h6>';
                        }else{
                            echo '<h5 style="color:#2980B9">' . $advertencia . '</h6>';
                        }
                    }
                ?>                        
                
                
                </ul>
                <p></p>
            </div>


            <div class="col-md-12">
               <img class="img-responsive" src=../ninos/<?php echo $ima ?>   alt="">
            </div>

        </div>
   
        <a href="especialista.php" class="btn btn-success"><i class="fa fa-mail-forward"></i> volver</a>
    <!-- MODAL PARA EL REGISTRO-->
   
            </div>
        </div>
    </div>

            </div>
                    
        </div>
        <!-- Fin del Panel -->
      </div>
    </div>
</div>
</div>
        <hr>
    </div>
    
</body>

</html>

<?php
  
?>
