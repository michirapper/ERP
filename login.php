<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link rel="stylesheet" href="./css/css_Login.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
   <?php
   require_once("./src/conexion.php");
   session_start();
   session_destroy();
   ?>
</head>

<body>
   <div class="sidenav">
      <div class="login-main-text">
         <h2>Macaquinho ERP</h2>
         <p>El ERP mas simple que veras.</p>
         <img src="./img/LogoERP.png" alt="" class="img-fluid ">
      </div>
   </div>
   <div class="main">
      <div class="col-md-6 col-sm-12">
         <div class="login-form">
            <form method="POST" action="./src/control.php" accept-charset="UTF-8">
               <?php if (@$_GET["errorusuario"] == "si") { ?>
                  <span style="color:red"><b>Datos incorrectos</b></span>
               <?php } ?>
               <div class="form-group">
                  <label>Usuario</label>
                  <input type="text" class="form-control" placeholder="Usuario" name="usuario">
               </div>
               <div class="form-group">
                  <label>Contraseña</label>
                  <input type="password" class="form-control" placeholder="Contraseña" name="contrasena">
               </div>
               <button type="submit" class="btn btn-black">Login</button>
               <button type="submit" class="btn btn-secondary">Register</button>
            </form>
         </div>
      </div>
   </div>
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>

</html>