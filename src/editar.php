<?php
require("seguridad.php");
require_once("conexion.php"); 
if(isset($_POST)){

    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $ciudad = $_POST["ciudad"];
    $pais = $_POST["pais"];
    $telefono = $_POST["telefono"];
    $nif = $_POST["NIF"];
    $logo = $_POST["logo"];

    $query = "UPDATE confempresa SET Nombre = '$nombre', Direccion= '$direccion', Ciudad='$ciudad', Pais='$pais', Telefono='$telefono', NIF='$nif', Logo='$logo' WHERE id = 2 ";
    mysqli_query($conexion, $query);

    echo "<script>window.location='../index.php';</script>";
}
