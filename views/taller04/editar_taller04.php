<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="etaller.css" type="text/css">
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
    $Descripcion_CPU=$_GET['Descripcion_CPU'];
    $Estado_CPU = $_GET['Estado_CPU'];
    $Teclado = $_GET['Teclado'];
    $Serie_Teclado = $_GET['Serie_Teclado'];
    $Estado_Teclado = $_GET['Estado_Teclado'];
    $Mouse = $_GET['Mouse'];
    $Serie_Mouse = $_GET['Serie_Mouse'];
    $Estado_Mouse = $_GET['Estado_Mouse'];
    ?>

<form action="/comercio/models/conexion_taller1.php" method="POST">
    <!-- Campo oculto para el Nro_Taller -->
    <input type="hidden" name="Nro_Taller" value="<?= $Nro_Taller?>">

    <div class="form-container">
        <div>
            <p>Maquina</p>
            <input type="text" name="Nro_Maquina" value="<?=$Nro_Maquina?>" required readonly>
        </div>

        <div class="form-section">
            <p>Estado de Pantalla</p>
            <select name="Estado_Monitor" required>
                <option value="Bueno" <?php echo ($Estado_Monitor == 'Bueno') ? 'selected' : ''; ?>>Bueno</option>
                <option value="Regular" <?php echo ($Estado_Monitor == 'Regular') ? 'selected' : ''; ?>>Regular</option>
                <option value="Malo" <?php echo ($Estado_Monitor == 'Malo') ? 'selected' : ''; ?>>Malo</option>
            </select>
        </div>

        <div class="form-section">
            <p>Estado del Teclado</p>
            <select name="Estado_Teclado" required>
                <option value="Bueno" <?php echo ($Estado_Teclado == 'Bueno') ? 'selected' : ''; ?>>Bueno</option>
                <option value="Regular" <?php echo ($Estado_Teclado == 'Regular') ? 'selected' : ''; ?>>Regular</option>
                <option value="Malo" <?php echo ($Estado_Teclado == 'Malo') ? 'selected' : ''; ?>>Malo</option>
            </select>
        </div>

        <div class="form-section">
            <p>Estado de Touchpad</p>
            <select name="Estado_Mouse" required>
                <option value="Bueno" <?php echo ($Estado_Mouse == 'Bueno') ? 'selected' : ''; ?>>Bueno</option>
                <option value="Regular" <?php echo ($Estado_Mouse == 'Regular') ? 'selected' : ''; ?>>Regular</option>
                <option value="Malo" <?php echo ($Estado_Mouse == 'Malo') ? 'selected' : ''; ?>>Malo</option>
            </select>
        </div>
    </div>

    <div class="button_agregar" align="center">
        <button type="submit" name="Actualizar4" value="Actualizar">Actualizar</button>
    </div>
</form>

</body>
</html>