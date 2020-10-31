<?php
$conexion = mysqli_connect("localhost", "id7001989_torrent", "Passw0rd", "id7001989_torrent");
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$ssql = "SELECT * FROM usuarios WHERE Nombre='$usuario' and Contrasena='$contrasena' AND Perfiles_idPerfiles=1";
$ssql2 = "SELECT * FROM usuarios WHERE Nombre='$usuario' and Contrasena='$contrasena' AND Perfiles_idPerfiles=2";
$rs = mysqli_query($conexion,$ssql);
$rs2 = mysqli_query($conexion,$ssql2);
if (mysqli_num_rows($rs)!=0){
//usuario y contraseña válidos
//defino una sesion y guardo datos
session_start();
$_SESSION["autentificado"]= "SI";
echo "<script>window.location='../Index_ADMIN/pagina.php';</script>";
}elseif (mysqli_num_rows($rs2)!=0) {
    session_start();
$_SESSION["autentificado"]= "SI";
echo "<script>window.location='../Index_usuario/pagina.php';</script>";}
else{
//si no existe le mando otra vez a la portada
echo "<script>window.location='login.php?errorusuario=si';</script>";
}
?>

<?php
$conexion = mysqli_connect("localhost", "root", "", "bdfase2g8");
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$sql = "SELECT * FROM usuarios WHERE Nombre='$usuario' and Contrasena='$contrasena'";
$rs = mysqli_query($conexion,$ssql);
if (mysqli_num_rows($rs)!=0){
session_start();
$_SESSION["autentificado"]= "SI";
echo "<script>window.location='./index.php';</script>";
}else{
echo "<script>window.location='../login.php?errorusuario=si';</script>";
}
?>

