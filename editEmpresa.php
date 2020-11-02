<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <?php
    require("src/conexion.php");
    require("./src/seguridad.php");

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
    <form action="src/editar.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-3">
                    <h2>Editar Empresa</h2>
                </div>
                <?php
                $query = "SELECT * FROM confempresa";
                $queryRS = mysqli_query($conexion, $query);
                while ($rs = mysqli_fetch_assoc($queryRS)) { ?>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-1 align-self-center ">
                                <label for="nombre">Nombre</label>
                            </div>
                            <div class="col-11">
                            <input type="text" size="75" id="nombre" name="nombre" value="<?php echo $rs["Nombre"]; ?>" required class="form-control">
                            </div>

                            <div class="col-1 align-self-center  mt-3">
                                <label for="direccion">Direccion</label>
                            </div>
                            <div class="col-11  mt-3">
                            <input type="text" size="75" id="direccion" name="direccion" value="<?php echo $rs["Direccion"]; ?>" required class="form-control">
                            </div>

                            <div class="col-1 align-self-center  mt-3">
                                <label for="ciudad">Ciudad</label>
                            </div>
                            <div class="col-11  mt-3">
                            <input type="text" size="75" id="ciudad" name="ciudad" value="<?php echo $rs["Ciudad"]; ?>" required class="form-control">
                            </div>

                            <div class="col-1 align-self-center  mt-3">
                                <label for="pais">Pais</label>
                            </div>
                            <div class="col-11  mt-3">
                            <input type="text" size="75" id="pais" name="pais" value="<?php echo $rs["Pais"]; ?>" required class="form-control">
                            </div>
                            
                            <div class="col-1 align-self-center  mt-3">
                                <label for="telefono">Telefono</label>
                            </div>
                            <div class="col-11  mt-3">
                            <input type="text" size="75" id="telefono" name="telefono" value="<?php echo $rs["Telefono"]; ?>" required class="form-control">
                            </div>

                            <div class="col-1 align-self-center  mt-3">
                                <label for="NIF">NIF</label>
                            </div>
                            <div class="col-11  mt-3">
                            <input type="text" size="75" id="NIF" name="NIF" value="<?php echo $rs["NIF"]; ?>" required class="form-control">
                            </div>

                            <div class="col-1 align-self-center  mt-3">
                                <label for="logo">Logo</label>
                            </div>
                            <div class="col-11  mt-3">
                            <input type="text" size="75" id="logo" name="logo" value="<?php echo $rs["Logo"]; ?>" required class="form-control">
                            </div>

                            <div class="col-12 mt-5 d-flex justify-content-center">
                            <input type="submit" name="uploadBtn" value="Actualizar" class="btn btn-primary" />
                            </div>
                            
                           
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</body>

</html>