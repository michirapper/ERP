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
    session_start();
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
    <form action="src/actConf.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-3">
                    <h2>Configuracion</h2>
                </div>
                <?php
                $query = "SELECT * FROM configuracion INNER JOIN usuarios ON usuarios.configuracion_id = configuracion.id Where usuarios.id = " . $_SESSION["user_id"];
                $queryRS = mysqli_query($conexion, $query);
                while ($rs = mysqli_fetch_assoc($queryRS)) { ?>
                    <div class="col-12 mt-3 d-flex">
                        <h5 class="mr-5 col-2">Modo Oscuro</h5>
                        <div class="border border-secondary rounded">
                            <input type="checkbox" <?php if ($rs['apariencia'] == 2) {
                                                        echo "checked";
                                                    } ?> data-toggle="toggle" name="checkBox">
                        </div>
                    </div>
                    <div class="col-12 d-flex">
                        <h5 class="mr-5 col-2">Idioma</h5>
                        <div>
                            <select class="custom-select" name="idioma">
                                <option value="ES" <?php if ($rs['idioma'] == "ES") {
                                                        echo "selected";
                                                    } ?>>ES</option>
                                <option value="EN" <?php if ($rs['idioma'] == "EN") {
                                                        echo "selected";
                                                    } ?>>EN</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 d-flex">
                        <h5 class="mr-5 col-2">Divisa</h5>
                        <div>
                            <select class="custom-select" name="divisa">
                                <option value="Euro" <?php if ($rs['divisa'] == "Euro") {
                                                            echo "selected";
                                                        } ?>>Euro</option>
                                <option value="Dolar" <?php if ($rs['divisa'] == "Dolar") {
                                                            echo "selected";
                                                        } ?>>Dolar</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center col-3">
                        <input class="btn btn-primary " type="submit" value="Submit">
                    </div>
                <?php } ?>
                <div class="col-12 mt-5">
                    <h2>Nuevo Modulo</h2>
                </div>
                <?php
                if (isset($_SESSION['message']) && $_SESSION['message']) {
                    printf('<b>%s</b>', $_SESSION['message']);
                    unset($_SESSION['message']);
                }
                ?>

            </div>
        </div>
    </form>
    <div class="container">
        <div class="row">
            <form method="POST" action="upload.php" enctype="multipart/form-data">
                <div class="input-group mt-2">
                    <div class="custom-file col-12">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="uploadedFile">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <input type="submit" name="uploadBtn" value="Upload" class="input-group-text" />
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</body>

</html>