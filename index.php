<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP Macaco</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <?php
    require("./src/seguridad.php");
    require("src/conexion.php");
    $query = "SELECT * FROM configuracion INNER JOIN usuarios ON usuarios.configuracion_id = configuracion.id Where usuarios.id = " . $_SESSION["user_id"];
    $queryRS = mysqli_query($conexion, $query);
    while ($rs = mysqli_fetch_assoc($queryRS)) {
        if ($rs['apariencia'] == 2) {
            echo "<link rel='stylesheet' href='./css/css_blackMode.css'>";
        }
    }
    ?>
</head>

<body>
    <?php
    require("./src/menu.inc.php");
    ?>
    <?php
    $query = "SELECT * FROM confempresa";
    $queryRS = mysqli_query($conexion, $query);
    while ($rs = mysqli_fetch_assoc($queryRS)) { ?>

        <div class="container">

            <div class="col-12 mt-5 d-flex ">
                <div class="col-6 ">
                    <img src="<?php echo $rs['Logo']; ?>" alt="" class="img-fluid">
                </div>
                <div class="col-6 ml-5">
                    <h3 class="text-center"><?php echo $rs['Nombre']; ?></h3>
                    <div class="row mt-4">
                        <div class="col-3">
                            <p><b>Pais: </b></p>
                        </div>
                        <div class="col-9">
                            <p><?php echo $rs['Pais']; ?></p>
                        </div>

                        <div class="col-3">
                            <p><b>Ciudad: </b></p>
                        </div>
                        <div class="col-9">
                            <p><?php echo $rs['Ciudad']; ?></p>
                        </div>

                        <div class="col-3">
                            <p><b>Direccion: </b></p>
                        </div>
                        <div class="col-9">
                            <p><?php echo $rs['Direccion']; ?></p>
                        </div>

                        <div class="col-3">
                            <p><b>NIF: </b></p>
                        </div>
                        <div class="col-9">
                            <p><?php echo $rs['NIF']; ?></p>
                        </div>

                        <div class="col-3">
                            <p><b>Telefono: </b></p>
                        </div>
                        <div class="col-9">
                            <p><?php echo $rs['Telefono']; ?></p>
                        </div>

                        <?php
                        $query = "SELECT * FROM Usuarios Where id= " . $_SESSION["user_id"];
                        $queryRS = mysqli_query($conexion, $query);
                        while ($rs = mysqli_fetch_assoc($queryRS)) {
                            if ($rs['permisos_id'] == 1) {
                        ?>
                                <a class="btn btn-primary col-12 mt-5" href="./editEmpresa.php" role="button">Editar</a>
                        <?php
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>

        </div>
        </div>

    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>