<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Serpientes y Escaleras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: beige;
        }
    </style>
</head>

<body>
    <?php
    // Obtener el nombre del jugador desde el formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'Jugador';

    $jugador1casillaAcumulado = 0;
    $dado = 0;
    $filaActual = 0;
    if (isset($_POST['valor'])) {
        $dado = $vrandom = rand(1, 12);
        $valorantiguo = $_POST['valor'];
        $jugador1casillaAcumulado = $valorantiguo + $dado;

        switch ($jugador1casillaAcumulado) {
            case '20':
                $jugador1casillaAcumulado = 47;
                $mensaje = "USTED CAYO EN LA CASILLA 20 POR LO QUE SUBIO POR LA ESCALERA A LA CASILLA 47";
                $alerta = 1;
                echo $mensaje;
                break;
            case '67':
                $jugador1casillaAcumulado = 91;
                $mensaje = "USTED CAYO EN LA CASILLA 67 POR LO QUE SUBIO POR LA ESCALERA A LA CASILLA 91";
                $alerta = 1;
                break;
            case '69':
                $jugador1casillaAcumulado = 50;
                $mensaje = "USTED CAYO EN LA CASILLA 69 POR LO QUE BAJO POR LA SERPIENTE A LA CASILLA 50";
                $alerta = 1;
                break;
            case '79':
                $jugador1casillaAcumulado = 48;
                $mensaje = "USTED CAYO EN LA CASILLA 79 POR LO QUE BAJO POR LA SERPIENTE A LA CASILLA 48";
                $alerta = 1;
                break;

            default:
                if ($dado > 1) {
                    $mensaje = "USTED AVANZO $dado CASILLAS";
                } else {
                    $mensaje = "USTED AVANZO $dado CASILLAS";
                }
                $alerta = 1;
                break;
        }
    }
    ?>
    <div class="container text-center">
        <h1>JUEGO DE SERPIENTES Y ESCALERAS</h1>
        <p>Bienvenido, <?php echo $nombre; ?>.</p>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="escalera.php" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="form-label" for="valor">ACUMULADO</label>
                            <input class="form-control" type="text" id="valor" name="valor" min="1" max="10" value="<?= $jugador1casillaAcumulado ?>" required>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label" for="dado">DADO</label>
                            <input class="form-control" type="text" id="dado" name="dado" min="1" max="10" value="<?= $dado ?>" required>
                            <input type="hidden" name="Nojugada">
                        </div>
                        <div class="col-lg-4 d-flex align-items-end">
                            <input type="submit" id="enviar" name="enviar" class="btn btn-success w-100" value="TIRAR">
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-lg-4">
                            <a href="escalera.php" id="enviar" name="enviar" class="btn btn-warning w-100">REINICIAR</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?php
                if ($dado > 0) {
                ?>
                    <div style="border:solid">
                        <?php
                        if ($jugador1casillaAcumulado < 100) {
                        ?>
                            <h1>TIRO</h1>
                            <h1><?= $dado ?></h1>
                            <h2><?= $mensaje ?></h2>
                    </div>
                <?php } else { ?>
                    <h1>FELICIDADES GANASTE</h1>
                <?php } ?>
            <?php } ?>
            </div>
        </div>
        <div class="col-lg-6 offset-lg-3">
            <img src="./images/escalera1.png" alt="" style="z-index:2; margin-top: 290px; margin-left:-290px; position:absolute; width:100px; height:300px; transform:rotate(30deg)">
            <img src="./images/escalera2.png" alt="" style="z-index:2; margin-top: -10px; margin-left:100px; position:absolute; width:100px; height:300px; transform:rotate(30deg)">
            <img src="./images/serpiente1.png" alt="" style="z-index:2; margin-top: 200px; margin-left:100px; position:absolute; width:200px; height:200px; transform:rotate(-30deg)">
            <img src="./images/serpiente2.png" alt="" style="z-index:2; margin-top: 100px; margin-left:-210px; position:absolute; width:300px; height:300px; transform:rotate(-20deg)">
            <table class="tablero" style="z-index: 1;">
                <?php
                $colores = ['yellow', 'white', 'red', 'blue', 'green'];
                $NoCasilla = 101;
                $coloranterior = '';
                for ($fila = 0; $fila < 10; $fila++) {
                    echo "<tr>";
                    for ($columna = 0; $columna < 10; $columna++) {
                        echo "<td>";
                        $colorquetoca = rand(0, 4);
                        while ($colorquetoca == $coloranterior) {
                            $colorquetoca = rand(0, 4);
                        }
                        $coloranterior = $colorquetoca;

                        if ($fila > 0) {
                            if ($columna == 0) {
                                $NoCasilla -= 10;
                            } else {
                                if ($fila % 2 == 0) {
                                    $NoCasilla--;
                                } else {
                                    $NoCasilla++;
                                }
                            }
                        } else {
                            $NoCasilla--;
                        }

                        if ($jugador1casillaAcumulado == $NoCasilla && $jugador1casillaAcumulado > 0 && $jugador1casillaAcumulado < 101) {
                            echo "<div class='ficha' style='width: 60px; height: 60px; border: solid; background-color: $colores[$colorquetoca]'><img src='./images/ficha.png' alt='' style='z-index: 2; width: 60px; height: 60px;'></div>";
                        } else {
                            echo "<div class='ficha' style='width: 60px; height: 60px; border: solid; background-color: $colores[$colorquetoca]'><p>$NoCasilla</p></div>";
                        }
                        echo "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
