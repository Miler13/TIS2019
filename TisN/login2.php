<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laboratorios de informatica-sistemas UMSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="shortcut icon" href="imagenes/logoUNI.ico" type="image/x-icon">
      <link rel="stylesheet" href="css/index.css">
	  <link rel="shortcut icon" href="imagenes/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="admin/css/bootstrap.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/estilo.css">

</head>

<body>

<?php include('includes/menuPublico.php') ?>

    <!-- Header Carousel -->
    

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
            <div class="col-md-6" id="login-wrapper">
                <div class="panel panel-primary animated flipInY">
                    <div class="panel-heading">
                        <div  style="text-align: center;">
                            <h3 class="panel-title"> <i class="glyphicon glyphicon-off"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Acceso al Sistema </h3>  
                        </div>       
                    </div>
                    <div class="panel-body">
                   <div style="text-align: center;">
                       <img src="imagenes/logoSiad.png">
                   </div>
                   <br> 
                           <div  style="text-align: center;">
                             <p style="font-weight: bold"> Introduce tus datos de acceso</p>   
                           </div>                   
                        <form class="form-horizontal" role="form" method="post" action="login/validar.php">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" style="text-align: center;" class="form-control" name="usuario" placeholder="Introduce usuario" required="true">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                            <div class="form-group">
                               <div class="col-md-12">
                                    <input type="password" style="text-align: center;" class="form-control" name="password" placeholder="Introduce tu Password" required="true">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <center><h6 style="color:green;">Contacte al administrador para obtener sus credenciales de acceso</h6></center>
                            <div class="form-group">
                               <div class="col-md-12">
                               <center>
                                <input type="submit" name="Submit" value="Entrar"  class="btn btn-success" >
                                <a href="index.php" class="btn btn-danger">Salir</a>                             
                                 </center> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            </div> 
			<div class="col-lg-12">
                 <h2 class="page-header">Identifique su tipo de usuario y haga click en entrar</h2> 
            </div>
                             
        </div>

        </div>
        <!-- /.row -->
        <!-- Features Section -->
        <div class="row">
            
          
          
        </div>
        <!-- para avisos Estimado usuario, le recordamos NO usar acentos, ñ's o caracteres especiales del LENGUAJE ESPAÑOL,
                      en los nombres de sus archivos y/o documentos que suba a la plataforma. -->
   <hr>
    </div>
    <script src="js/jquery.js"></script>
     <script src="js/back-to-top.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    
<?php
include('includes/footer.php');
 ?>

</body>

</html>
