<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="eltaller.css" type="text/css">
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
    <?php
    $Nro_Taller=$_GET['Nro_Taller'];
    $Nro_Maquina =$_GET['Nro_Maquina'];
    $Monitor =$_GET['Monitor'];
    $Serie_Monitor = $_GET['Serie_Monitor'];
    $Estado_Monitor =$_GET['Estado_Monitor'];
    $CPU = $_GET['CPU'];
    $Serie_CPU = $_GET['Serie_CPU'];
    $Descripcion_CPU = $_GET['Descripcion_CPU'];
    $Estado_CPU = $_GET['Estado_CPU'];
    $Teclado = $_GET['Teclado'];
    $Serie_Teclado = $_GET['Serie_Teclado'];
    $Estado_Teclado = $_GET['Estado_Teclado'];
    $Mouse = $_GET['Mouse'];
    $Serie_Mouse = $_GET['Serie_Mouse'];
    $Estado_Mouse = $_GET['Estado_Mouse'];
    ?>

    <form action="/comercio/models/conexion_taller1.php" method="POST">
   
        <div class="form-container">
        <div>
            <input type="hidden" name="Nro_Taller" value="<?=$Nro_Taller?>">
        </div>
        <div>
        <p>Maquina</p>
        <input type="text" name="Nro_Maquina" value="<?=$Nro_Maquina?>" required readonly>
    </div>
            <div class="form-section">
                <p>Marca del Monitor</p>
                <input type="text" name="Monitor" value="<?=$Monitor?>" required>
                <p>Serie del Monitor</p>
                <input type="text" name="Serie_Monitor" value="<?=$Serie_Monitor?>" required>
                <p>Estado del Monitor</p>
                <select name="Estado_Monitor" value="<?=$Estado_Monitor?>" required>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>
                </select>
            </div>
            <div class="form-section">
                <p>Marca del CPU</p>
                <input type="text" name="CPU" value="<?=$CPU?>" required>
                <p>Serie del CPU</p>
                <input type="text" name="Serie_CPU" value="<?=$Serie_CPU?>" required>
                <p>Descripcion CPU</p>
                <input type="text" name="Descripcion_CPU" value="<?=$Descripcion_CPU?>">
                <p>Estado del CPU</p>
                <select name="Estado_CPU" value="<?=$Estado_CPU?>" required>
                    <option value="Operativo">Operativo</option>
                    <option value="Inoperativo">Inoperativo</option>
                    <option value="Por Revision">Por Revision</option>
                </select>
            </div>
            <div class="form-section">
                <p>Marca del Teclado</p>
                <input type="text" name="Teclado" value="<?=$Teclado?>" required>
                <p>Serie del Teclado</p>
                <input type="text" name="Serie_Teclado" value="<?=$Serie_Teclado?>" required>
                <p>Estado del Teclado</p>
                <select name="Estado_Teclado" value="<?=$Estado_Teclado?>" required>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>
                </select>
            </div>
            <div class="form-section">
                <p>Marca del Mouse</p>
                <input type="text" name="Mouse" value="<?=$Mouse?>" required>
                <p>Serie del Mouse</p>
                <input type="text" name="Serie_Mouse" value="<?=$Serie_Mouse?>" required>
                <p>Estado del Mouse</p>
                <select name="Estado_Mouse" value="<?=$Estado_Mouse?>" required>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>
                </select>
            </div>
        </div>
        <div class="button_agregar" align="center">
            <button type="submit" name="Actualizar2" value="Actualizar" >Actualizar</button>
        </div>
        
    </form>
</body>
</html>