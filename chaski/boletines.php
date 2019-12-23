<?php

include 'admin/conexion.php';


        ?>
           <?php 
      
    
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Chasqui </title>
     <link rel="shortcut icon" href="editor/imagenes/favicon.ico" type="image/x-icon">
    <link href="admin/css/bootstrap.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="editor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.js"></script>
    <script src="editor/js/back-to-top.js"></script>
    <script src="editor/js/bootstrap.min.js"></script>
    <script src="editor/entrega_boletin/myjava.js"></script>

</head>
<body>
           <?php
          include ('includes/menuPublico.php');
            ?>
       <br>
        <div class="container">
            <div class="row">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="" width="80" height="80" class="img-responsive"></div>
                       <div class="col-md-6">              
                      
                       </div>
               <div class="col-md-3">
              
              
               </div> 
            </div>
          
        </div> 
        <!-- /.row -->

            <!-- Content Column -->
 

            <div class="col-md-9">
                <div class="containe">
      <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b>Boletines</b></h4></center>
        </div>
        <div class="panel-body">
            <div class="row">
                  <!--Fin del Segundo Row !-->

		               <div class="col-md-3"><h4>Buscar boletin:</h4></div>
		               
                   <div class="col-md-4">
		                  <input type="text" name="s" id="bs-prod" class="form-control" placeholder="Buscar">
		               </div>
		               
	              <br>
 <br>
    <div class="registros" id="agrega-registros"></div>
      <div class="col-md-6" style="text-align: left;">
		    <center>
		        <ul class="pagination" id="pagination"></ul>
		    </center>
      </div>
      </div>
      <div class="col-md-6">
		   <center>
		   <h4 style="font-weight: bold;"> 
    <?php
          include('admin/conexion.php');
          $numeroRegistros = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM boletin "));
          echo "Registros Totales: $numeroRegistros";
        ?>
        </h4>
          </center>
      </div>
 

     
                    
        </div>
        <!-- Fin del Panel -->
      </div>
    </div>
</div>
</div>
</div>
        <hr>

    </div>
           <?php
    include('includes/footer.php');
 ?> 
</body>
</html>
<?php
    
?>
