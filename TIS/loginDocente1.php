
<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT * FROM administrador WHERE user_Adm = '$myusername' and passwordAdm = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: welcome.php");
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
      <h1>Docente</h1>
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
