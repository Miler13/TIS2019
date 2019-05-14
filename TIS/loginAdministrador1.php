
<?php
  $host_db = "localhost";
  $user_db = "stadust";
  $pass_db = 'N3^B<gv9(=~WLv;';
  $db_name = 'stadust_db';
  $tbl_name = "materia";
 
  $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
 
  if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
 }
 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = $_POST['username'];
      $mypassword = $_POST['password'];

      $sql = "SELECT * FROM administrador WHERE user_Adm = '$myusername' and passwordAdm = '$mypassword'";

      
      $result = $conexion->query($sql);
     

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
        
        
         header("location: index.html");
      }else {
         $error = "Your Login Name or Password is invalid";
        
      }
   }
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido Administrador</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="../css/master.css">
    <script>
            function validar(){
                var username, password;
                username = document.getElementById("username").value;
                password = document.getElementById("password").value;

                if(username === "" || password === ""){
                    alert("Todos los campos son obligatorios");
                    return false;
                }

            }

    </script>
</head>
<body>
    <div class="login-box">
      <img class= "avatar" src="img/logoFcyt.jpg" alt="logo de laboratorio">
      <h1>Administrador</h1>
       <form onsubmit="return validar();">
         <!---user name---->
         <label for="nombre_usuario">Nombre Usuario</label>
         <input type="text" id="username" name="username" placeholder="Ingrese Usuario">

         <!---pasword---->
         <label for="contraseña">Contraseña</label>
         <input type="password" id="password" name="password" placeholder="Ingrese Contraseña">

         <input type="submit" value="Entrar">

         <a href="#">He olvidado mi contraseña</a><br>
         <a href="index.html">Volver</a>

       </form>
    </div>
</body>
</html>
