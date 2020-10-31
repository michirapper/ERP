<?php
session_start();
if ($_SESSION["autentificado"] != "SI") {
echo "<script>window.location='login.php';</script>";
exit();
}
?>