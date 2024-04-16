<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Jugador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url(./images/fond.jpg);
            color: #ffffff; 
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            margin-top: 100px;
        }

        .form-control {
            background-color: #333333;
            color: #ffffff; 
        }

        .btn-primary {
            background-color: #cc0000; 
            border-color: #cc0000;
        }

        .btn-primary:hover {
            background-color: #990000; 
            border-color: #990000; 
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.25rem rgba(204, 0, 0, 0.5); 
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1>Ingrese su nombre</h1>
        <form action="escalera.php" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <button type="submit" class="btn btn-primary">Jugar</button>
        </form>
    </div>
</body>

</html>
