<?php
require("seguridad.php");
require_once("conexion.php"); 
if(isset($_POST)){
    $idUser = $_GET["idUser"];
    $idTrabajador = $_GET["idtrab"];
    $nombre = $_POST["nombre"];
    $ganancias = $_POST["ganancia"];
    $usuario = $_POST["usuario"];

    $query = "UPDATE usuarios SET usuarios = '$usuario' WHERE id = $idUser ";
    mysqli_query($conexion, $query);

    $query2 = "UPDATE trabajadores SET nombre = '$nombre', ganancias='$ganancias' WHERE id = $idTrabajador ";
    mysqli_query($conexion, $query2);

    echo "<script>window.location='../modulos/empleados.php';</script>";
}
