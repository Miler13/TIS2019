
<?php
$dato = $_POST['id'];

include '../admin/conexion.php';


      
      
                $registro = mysqli_query($conexion,"SELECT * FROM mensajes  WHERE idMensaje= '$dato'");

                $registro2 = mysqli_fetch_array($registro);


               $remi= $registro2['Remitente'];
               $mensaje= $registro2['Mensaje'];
               $ima= $registro2['foto'];
               
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
                   
                </ul>
                <p></p>
            </div>
            <div class="col-md-12">
               <img class="img-responsive" src=../ninos/<?php echo $ima ?>   alt="">
            </div>
        </div>
   
        <a href="admin.php" class="btn btn-success"><i class="fa fa-mail-forward"></i> volver</a>
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
