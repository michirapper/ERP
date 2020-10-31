<?php
$conexion = mysqli_connect("localhost", "root", "", "bdfase2g8");
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$sql = "SELECT * FROM usuarios WHERE usuarios='$usuario' and contrasena='$contrasena'";
$rs = mysqli_query($conexion,$sql);
if (!empty($rs) AND mysqli_num_rows($rs) > 0){
session_start();
$_SESSION["autentificado"]= "SI";
echo "<script>window.location='../index.php';</script>";
}else{
echo "<script>window.location='../login.php?errorusuario=si';</script>";
}
?>