<?php
require("seguridad.php");
require_once("conexion.php"); 
if(isset($_POST)){

    if(isset($_POST["checkBox"])){
        $Moscuro = 2;
    }else{
        $Moscuro =1;
    }
    $idioma = $_POST["idioma"];
    $divisa = $_POST["divisa"];
    $query = "UPDATE configuracion SET divisa = '$divisa', idioma= '$idioma', apariencia='$Moscuro' WHERE id = ".$_SESSION["conf_id"];
    mysqli_query($conexion, $query);
    echo "<script>window.location='../configuration.php';</script>";
}
?>