<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema de Laboratorios de informatica-sistemas UMSS UNI</title>
    <link rel="shortcut icon" href="../imagenes/logoUNI.ico" type="image/x-icon">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery.js"></script>
    <script src="js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="horarios/myjava.js"></script>

    <link href="css/sweetalert.css" rel="stylesheet">
    <script src="js/functions.js"></script>
    <script src="js/sweetalert.min.js"></script>

    
    <!-- Bootstrap -->
    <link href='https://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- menu -->
    <div id="menu" class="col-md-12 text-right">
      <div class="container">
          <a class="btn btn-primary" href="lista.php"><i class="fa fa-calendar" aria-hidden="true"></i> Lista de Horarios</a>
          <button class="btn btn-warning" data-toggle="modal" data-target="#myModal"><i class="fa fa-calendar-check-o"></i> Nuevo Horario</button>
      </div>
    </div>
    <!-- menu -->


    <!-- container -->
      <div class="container">
       <div id="clockindex" class="col-sm-12 text-center">
         <i class="fa fa-calendar-plus-o icon-clock-index animated infinite pulse" aria-hidden="true"></i>
       </div>
       <div id="mynew" class="col-sm-12">
          
       </div>
      </div>
    <!-- container -->



<!-- modal nuevo horario -->
<div class="modal fade animated bounceInLeft" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cancel-new" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar"></i> Nuevo Horario</h4>
      </div>
      <div class="modal-body">
        
         <form id="horariofrm">
            <label>Nombre de la materia:</label>
            <input class="form-control" type="text" name="nombre" >
            <label>Descripción:</label>
            <textarea class="form-control" name="descripcion" rows="3"></textarea>
            <label>Dias:</label>
            <div id="days-list" class="col-sm-12">
               <a data-day="1" class="day-option">Lunes</a>
               <a data-day="2" class="day-option">Martes</a>
               <a data-day="3" class="day-option">Miercoles</a>
               <a data-day="4" class="day-option">Jueves</a>
               <a data-day="5" class="day-option">Viernes</a>
               <a data-day="6" class="day-option">Sabado</a>
               <a data-day="7" class="day-option">Domingo</a>
            </div>
            <input id="days-chose" class="form-control" type="text" name="days" >
            <label>Inicio:</label>
            <input class="form-control" type="text" id="time1" name="tiempo1">
            <label>Final:</label>
            <input class="form-control" type="text" id="time2" name="tiempo2">
            <label>Dividir Entre:</label>
            <select class="form-control" name="minutos">
                <option></option>
                <option value="45">45 minutos</option>
                <option value="90">1 Hora y Media</option>
            </select>
         </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="create-horario btn btn-success"><i class="fa fa-calendar-check-o"></i> Crear</button>
        <button type="button" class="cancel-new btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- modal nuevo horario -->

    
<!-- append modal set data -->
<div class="modal fade" id="DataEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close canceltask" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-thumb-tack"></i> Docente</h4>
      </div>
      <div class="modal-body">
        
        <form id="taskfrm">
           <label>Tarea</label>
           <input class="form-control" type="text" id="nametask" >
           <label>Color:</label>
           <select class="form-control" id="idcolortask">
              <option value="purple-label">Grupo 1</option>
              <option value="red-label">Grupo 2</option>
              <option value="blue-label">Grupo 3</option>
              <option value="pink-label">Grupo 4</option>
              <option value="green-label">Grupo 5</option>
           </select> 
          <input id="tede" type="hidden" name="tede" >
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="savetask btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
        <button type="button" class="canceltask btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- append modal set data -->




<!-- alert danger -->
<div id="alert-error"><i class="fa fa-times fa-2x"></i></div>
<!-- alert danger -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- datetimepicker -->
    <script src="js/moment-with-locales.js"></script>
    <script src="js/bootstrap-datetimepicker.js"></script>
    <!-- validate -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <!-- script -->
    <script src="js/script.js"></script>

  </body>
</html>