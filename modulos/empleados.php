<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <?php
    require("../src/conexion.php");
    require("../src/seguridad.php");
    $query = "SELECT * FROM configuracion INNER JOIN usuarios ON usuarios.configuracion_id = configuracion.id Where usuarios.id = " . $_SESSION["user_id"];
    $queryRS = mysqli_query($conexion, $query);
    while ($rs = mysqli_fetch_assoc($queryRS)) {
        if ($rs['apariencia'] == 2) {
            echo "<link rel='stylesheet' href='../css/css_blackMode.css'>";
        }
    }
    ?>
</head>

<body>
    <?php
    require("../src/menu.inc.php");
    ?>
    <div class="container">
        <div class="row">
            <?php
            $query = "SELECT * FROM configuracion INNER JOIN usuarios ON usuarios.configuracion_id = configuracion.id Where usuarios.id = " . $_SESSION["user_id"];
            $queryRS = mysqli_query($conexion, $query);
            while ($rs = mysqli_fetch_assoc($queryRS)) {
                if ($rs['apariencia'] == 2) {
                    echo "<table class='table mt-5 table-dark'>";
                } else {
                    echo "<table class='table mt-5'>";
                }
            }
            ?>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Rango</th>
                    <th scope="col">Permisos</th>
                    <th scope="col">Usuarios</th>
                    <th scope="col">Ganancias</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT trabajadores.id AS id,trabajadores.nombre AS nombre, rangos.nombre as rango, permisos.nombre as permisos, usuarios, ganancias, usuarios_permisos_id FROM trabajadores 
                     INNER JOIN usuarios ON usuarios.id = usuarios_id
                     INNER JOIN rangos ON rangos.id = rangos_id
                     INNER JOIN permisos ON permisos.id = usuarios_permisos_id";
                $queryRS = mysqli_query($conexion, $query);
                while ($rs = mysqli_fetch_assoc($queryRS)) { ?>
                    <tr>
                        <th scope="row"><?php echo $rs['id']; ?></th>
                        <td><?php echo $rs['nombre']; ?></td>
                        <td><?php echo $rs['rango']; ?></td>
                        <td><?php echo $rs['permisos']; ?></td>
                        <td><?php echo $rs['usuarios']; ?></td>
                        <td><?php echo $rs['ganancias']; ?> €</td>
                        <td><a class="btn btn-primary" href="editUser.php?id=<?php echo $rs['id']; ?>" role="button">Editar</a></td>
                    </tr>
                <?php
                } ?>
            </tbody>
            </table>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>

</html>