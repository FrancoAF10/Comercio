<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="agregar_t04.css" type="text/css">
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
            <input type="hidden" name="Nro_Taller" value="4">
        </div>
        <div class="form-container"> 
           <div>
            <p>Ingresar Nueva Maquina</p>
            <input type="text" name="Nro_Maquina" required>
           </div>
           <br>
            <div class="form-section">
                <input type="hidden" name="Monitor" value="-">
                <input type="hidden" name="Serie_Monitor" value="-">
                

                <p>Estado de Pantalla</p>
                <select name="Estado_Monitor" required>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>
                </select>
            </div>
            <div>
                <input type="hidden" name="CPU" value="-">
                <input type="hidden" name="Serie_CPU" value="-">
                <input type="hidden" name="Descripcion_CPU" value="-">
                <input type="hidden" name="Estado_CPU" value="-">
            </div>
            <div class="form-section">
                <input type="hidden" name="Teclado" value="-">
                <input type="hidden" name="Serie_Teclado" value="-">
                <p>Estado de Teclado</p>
                <select name="Estado_Teclado" required>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>
                </select>
            </div>
            <div class="form-section">
                <input type="hidden" name="Mouse" value="-">
                <input type="hidden" name="Serie_Mouse" value="-" >
                <p>Estado del Mouse</p>
                <select name="Estado_Mouse" required>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>
                </select>
            </div>
        </div>
        <div class="button_agregar" align="center">
            <button type="submit" name="agregar4">Agregar</button>
        </div>
        
    </form>
    <br>
</body>
</html>