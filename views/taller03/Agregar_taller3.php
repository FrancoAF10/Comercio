<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="agregar_t3.css" type="text/css">
    <title>Agregar Nueva Máquina</title>
</head>
<body>
<?php

session_start();
if(!isset($_SESSION["usuario"])){
    header("Location:/comercio/login.php");
    exit();
}
?>
<br>
    <form action="/comercio/models/conexion_taller1.php" method="POST">
    <div>
            <input type="hidden" name="Nro_Taller" value=3>
        </div>
        <center>
        <div class="form-section">
            <p>Ingresar Nueva Maquina</p>
            <input type="text" name="Nro_Maquina" required>
        </div>
        </center>
        <div class="form-container">
            <div class="form-section">
                <p>Marca del Monitor</p>
                <input type="text" name="Monitor" required>
                <p>Serie del Monitor</p>
                <input type="text" name="Serie_Monitor" required>
                <p>Estado del Monitor</p>
                <select name="Estado_Monitor" required>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>
                </select>
            </div>
            <div class="form-section">
                <p>Marca del CPU</p>
                <input type="text" name="CPU" required>
                <p>Serie del CPU</p>
                <input type="text" name="Serie_CPU" required>
                <p>Descripcion CPU</p>
                <input type="text" name="Descripcion_CPU">
                <p>Estado del CPU</p>
                <select name="Estado_CPU" required>
                    <option value="Operativo">Operativo</option>
                    <option value="Inoperativo">Inoperativo</option>
                    <option value="Por Revision">Por Revision</option>
                </select>
            </div>
            <div class="form-section">
                <p>Marca del Teclado</p>
                <input type="text" name="Teclado" required>
                <p>Serie del Teclado</p>
                <input type="text" name="Serie_Teclado" required>
                <p>Estado del Teclado</p>
                <select name="Estado_Teclado" required>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>
                </select>
            </div>
            <div class="form-section">
                <p>Marca del Mouse</p>
                <input type="text" name="Mouse" required>
                <p>Serie del Mouse</p>
                <input type="text" name="Serie_Mouse" required>
                <p>Estado del Mouse</p>
                <select name="Estado_Mouse" required>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>
                </select>
            </div>
        </div>
        <div class="button_agregar" align="center">
            <button type="submit" name="agregar3">Agregar</button>
        </div>
        
    </form>
    <br>
</body>
</html>