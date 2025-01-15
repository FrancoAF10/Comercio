<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="taller4.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php

session_start();
if(!isset($_SESSION["usuario"])){
    header("Location:/comercio/login.php");
    exit();
}
?>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="">AAC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/comercio/registros.php">REGISTROS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/comercio/views/taller01/taller1.php">TALLER 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/comercio/views/taller02/taller2.php">TALLER 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/comercio/views/taller03/taller3.php">TALLER 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/comercio/cerrar_sesion.php">CERRAR SESION</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="imagen">
            <br>
            <div class="titulo">
                <h1 class="text-center">TALLER 4</h1>
                </div>
  <div class="buttons-containers">
<form action="/comercio/models/conexion_taller1.php" method="post">
    <div class="buttons-container">
        <!-- Botón Agregar (sin submit, solo redirige) -->
        <button type="button" class="btn btn-primary" onclick="window.location.href='Agregar_taller4.php'">Nuevo Equipo</button>
    </div>
</form>

<form action="pdf4.php" method="post">
    <div class="buttons-container">
        <!-- Botón Generar PDF (submit) -->
        <button type="submit" name="pdf" class="btn btn-primary">Generar PDF</button>
    </div>
</form>
<form action="excel4.php" method="post">
    <div class="buttons-container">
        <!-- Botón Generar PDF (submit) -->
        <button type="submit" name="excel" class="btn btn-primary">Generar Excel</button>
    </div>
</form>

    </div>
    <br>
    <div class="table-container">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>N° Maquina</th>
                    <th>Pantalla</th>
                    <th>Teclado</th>
                    <th>Estado de Touchpad</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>     
                </tr>
            </thead>
            <tbody>
            <?php
                $connect = mysqli_connect("localhost", "root", "", "nuevo");
                $datos = "SELECT Nro_Taller, Nro_Maquina, Monitor, Serie_Monitor, Estado_Monitor, CPU, Serie_CPU,Descripcion_CPU, Estado_CPU, Teclado, Serie_Teclado, Estado_Teclado, Mouse, Serie_Mouse, Estado_Mouse FROM EQUIPOS WHERE Nro_Taller=4 ORDER BY Nro_Maquina ASC";
                $conexion2 = mysqli_query($connect, $datos);
                while ($mostrar = mysqli_fetch_row($conexion2)) {
                ?>
                <tr style="text-align:center">
                <td><?php echo $mostrar['1']?></td>
                <td><?php echo $mostrar['4']?></td>
                <td><?php echo $mostrar['11']?></td>
                <td><?php echo $mostrar['14']?></td>
                    <td align="center">
                    <form action="/comercio/views/taller04/editar_taller04.php" method="GET">
    <input type="hidden" name="Nro_Taller" value="<?php echo $mostrar['0']; ?>">
    <input type="hidden" name="Nro_Maquina" value="<?php echo $mostrar['1']; ?>">
    <input type="hidden" name="Monitor" value="<?php echo $mostrar['2']; ?>">
    <input type="hidden" name="Serie_Monitor" value="<?php echo $mostrar['3']; ?>">
    <input type="hidden" name="Estado_Monitor" value="<?php echo $mostrar['4']; ?>">
    <input type="hidden" name="CPU" value="<?php echo $mostrar['5']; ?>">
    <input type="hidden" name="Serie_CPU" value="<?php echo $mostrar['6']; ?>">
    <input type="hidden" name="Descripcion_CPU" value="<?php echo $mostrar['7']; ?>">
    <input type="hidden" name="Estado_CPU" value="<?php echo $mostrar['8']; ?>">
    <input type="hidden" name="Teclado" value="<?php echo $mostrar['9']; ?>">
    <input type="hidden" name="Serie_Teclado" value="<?php echo $mostrar['10']; ?>">
    <input type="hidden" name="Estado_Teclado" value="<?php echo $mostrar['11']; ?>">
    <input type="hidden" name="Mouse" value="<?php echo $mostrar['12']; ?>">
    <input type="hidden" name="Serie_Mouse" value="<?php echo $mostrar['13']; ?>">
    <input type="hidden" name="Estado_Mouse" value="<?php echo $mostrar['14']; ?>">

    <button type="submit" class="btn btn-outline-primary">Editar</button>
</form>
                    </td>
                    <td>
            <form action="/comercio/models/conexion_taller1.php" method="POST">
                <!-- Enviar el Nro_Maquina para eliminarlo -->
                <input type="hidden" name="Nro_Maquina" value="<?php echo $mostrar[1]; ?>">
                <button type="submit" class="btn btn-danger" name="Eliminar4">Eliminar</button>
            </form>
        </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
