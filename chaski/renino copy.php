<!DOCTYPE html>

<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CHASQUI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" href="imagenes/logo.JPG" type="image/x-icon">
    <link rel="stylesheet" href="admin/css/bootstrap.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css">
       <link rel="shortcut icon" href="" type="image/x-icon">

      <script src="js/jquery.js"></script>
         <link href="admin/sweetalert/sweetalert.css" rel="stylesheet">
    <script src="admin/sweetalert/sweetalert.min.js"></script>
     <script src="admin/sweetalert/sweetalert-dev.js"></script>
  
      <script src="validar.js"></script>
</head>
<body background="imagenes/fondo.jpg">




    <section id="login-container" style= "" src="imagenes/fondo.jpg">
        <div class="row">
            <div class="col-md-3" id="login-wrapper">
                <div class="panel panel-primary animated flipInY" style="background-color: rgba(255, 255, 255, .5);">
                    
                    <div class="panel-body"  >
                   <div style="text-align: center;">
                    </div>
                   <br> 
                           <div  style="text-align: center;">
                             <p style="font-weight: bold">Registrate</p>   
                           </div>                   
                        <form class="form-horizontal" role="form" method="post" action="reg/agrega_nino.php">
                        Cual es tu animal preferido?
        <br>
             <input name="strImagen[]"  type="checkbox" value="0"  id="leon" class="case"/>
             <img src="imagenes/leon.png" width="100" height="100" />  
             <input name="strImagen[]" type="checkbox" value="1"    id="mono" class="case"/>
             <img src="imagenes/mono.png" width="100" height="100" />  
             <input name="strImagen[]" type="checkbox" value="2"  id="leona" class="case"/>
             <img src="imagenes/leona.png" width="100" height="100" />  <br>
             <input name="strImagen[]" type="checkbox" value="3" id="elefante" class="case"/>
             <img src="imagenes/elefante.png" width="100" height="100" />  
             <input name="strImagen[]" type="checkbox" value="4" id="perico" class="case">
             <img src="imagenes/perico.png" width="100" height="100" /> 
             <input name="strImagen[]" type="checkbox" value="5" id="oso" class="case"/>
             <img src="imagenes/oso.png" width="100" height="100" />  <br>
        
                          
                            <div class="form-group">
                               <div class="col-md-12">
                                    <input type="text" style="text-align: center;" class="form-control" name="edad" placeholder="Introduce tu Edad" required="true" onkeypress="return solonumeros(event)"  >
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <center><h6 style="color:green;"></center>
                            <div class="form-group">
                               <div class="col-md-12">
                               <center>
                                
                                <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                                <a href="index.php" class="btn btn-danger">cancelar</a>                             
                                 </center> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



<script type="text/javascript">
  $('.case').on('change', function() {
		    $('.case').not(this).prop('checked', false);  
		});
</script>


</body>



</html>
