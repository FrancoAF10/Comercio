<?php
$Conexion = mysqli_connect('localhost', 'root', '', 'nuevo') or die(mysqli_error($Conexion));

if (isset($_POST['agregar1'])) {
    insertar($Conexion);
        header('Location:/comercio/views/taller01/taller1.php');
}else if (isset($_POST['agregar2'])) {
    insertar($Conexion);
        header('Location:/comercio/views/taller02/taller2.php');
    }else if (isset($_POST['agregar3'])) {
        insertar($Conexion);
            header('Location:/comercio/views/taller03/taller3.php');
    }else if (isset($_POST['agregar4'])) {
        insertar($Conexion);
            header('Location:/comercio/views/taller04/taller4.php');
    }


if (isset($_POST['Eliminar'])) {
    eliminar($Conexion);
    header('Location:/comercio/views/taller01/taller1.php');
}else if (isset($_POST['Eliminar2'])) {
    eliminar($Conexion);
    header('Location:/comercio/views/taller02/taller2.php');
}else if (isset($_POST['Eliminar3'])) {
    eliminar($Conexion);
    header('Location:/comercio/views/taller03/taller3.php');
}else if (isset($_POST['Eliminar4'])) {
    eliminar($Conexion);
    header('Location:/comercio/views/taller04/taller4.php');
}

if (isset($_POST['Actualizar1'])) {
    Actualizar($Conexion);
    header('Location:/comercio/views/taller01/taller1.php');
}else if (isset($_POST['Actualizar2'])) {
    Actualizar($Conexion);
        header('Location:/comercio/views/taller02/taller2.php');
    }else if (isset($_POST['Actualizar3'])) {
        Actualizar($Conexion);
            header('Location:/comercio/views/taller03/taller3.php');
    }else if (isset($_POST['Actualizar4'])) {
        Actualizar($Conexion);
            header('Location:/comercio/views/taller04/taller4.php');
    }

function insertar($Conexion) {
    $Nro_Maquina = mysqli_real_escape_string($Conexion, $_POST['Nro_Maquina']);
    $Nro_Taller = mysqli_real_escape_string($Conexion, $_POST['Nro_Taller']);
    $Monitor = mysqli_real_escape_string($Conexion, $_POST['Monitor']);
    $Serie_Monitor = mysqli_real_escape_string($Conexion, $_POST['Serie_Monitor']);
    $Estado_Monitor = mysqli_real_escape_string($Conexion, $_POST['Estado_Monitor']);
    $CPU = mysqli_real_escape_string($Conexion, $_POST['CPU']);
    $Serie_CPU = mysqli_real_escape_string($Conexion, $_POST['Serie_CPU']);
    $Descripcion_CPU = mysqli_real_escape_string($Conexion, $_POST['Descripcion_CPU']);
    $Estado_CPU = mysqli_real_escape_string($Conexion, $_POST['Estado_CPU']);
    $Teclado = mysqli_real_escape_string($Conexion, $_POST['Teclado']);
    $Serie_Teclado = mysqli_real_escape_string($Conexion, $_POST['Serie_Teclado']);
    $Estado_Teclado = mysqli_real_escape_string($Conexion, $_POST['Estado_Teclado']);
    $Mouse = mysqli_real_escape_string($Conexion, $_POST['Mouse']);
    $Serie_Mouse = mysqli_real_escape_string($Conexion, $_POST['Serie_Mouse']);
    $Estado_Mouse = mysqli_real_escape_string($Conexion, $_POST['Estado_Mouse']);

    $Consulta = "INSERT INTO EQUIPOS (Nro_Taller, Nro_Maquina, Monitor, Serie_Monitor, Estado_Monitor, CPU, Serie_CPU,Descripcion_CPU, Estado_CPU, Teclado, Serie_Teclado, Estado_Teclado, Mouse, Serie_Mouse, Estado_Mouse) 
    VALUES ($Nro_Taller, '$Nro_Maquina', '$Monitor', '$Serie_Monitor', '$Estado_Monitor', '$CPU', '$Serie_CPU','$Descripcion_CPU', '$Estado_CPU', '$Teclado', '$Serie_Teclado', '$Estado_Teclado', '$Mouse', '$Serie_Mouse', '$Estado_Mouse')";

    mysqli_query($Conexion, $Consulta);
    mysqli_close($Conexion);
   
}

function eliminar($Conexion) {
    $Nro_Maquina = mysqli_real_escape_string($Conexion, $_POST['Nro_Maquina']);
    
    // Consulta SQL para eliminar el registro
    $Consulta = "DELETE FROM EQUIPOS WHERE Nro_Maquina = '$Nro_Maquina'";
    
    // Ejecutar la consulta
    if (mysqli_query($Conexion, $Consulta)) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($Conexion);
    }

    // Cerrar la conexión
    mysqli_close($Conexion);
}

function Actualizar($Conexion){
   
    $Nro_Taller = mysqli_real_escape_string($Conexion, $_POST['Nro_Taller']);
    $Nro_Maquina = mysqli_real_escape_string($Conexion, $_POST['Nro_Maquina']);
    $Monitor = mysqli_real_escape_string($Conexion, $_POST['Monitor']);
    $Serie_Monitor = mysqli_real_escape_string($Conexion, $_POST['Serie_Monitor']);
    $Estado_Monitor = mysqli_real_escape_string($Conexion, $_POST['Estado_Monitor']);
    $CPU = mysqli_real_escape_string($Conexion, $_POST['CPU']);
    $Serie_CPU = mysqli_real_escape_string($Conexion, $_POST['Serie_CPU']);
    $Descripcion_CPU = mysqli_real_escape_string($Conexion, $_POST['Descripcion_CPU']);
    $Estado_CPU = mysqli_real_escape_string($Conexion, $_POST['Estado_CPU']);
    $Teclado = mysqli_real_escape_string($Conexion, $_POST['Teclado']);
    $Serie_Teclado = mysqli_real_escape_string($Conexion, $_POST['Serie_Teclado']);
    $Estado_Teclado = mysqli_real_escape_string($Conexion, $_POST['Estado_Teclado']);
    $Mouse = mysqli_real_escape_string($Conexion, $_POST['Mouse']);
    $Serie_Mouse = mysqli_real_escape_string($Conexion, $_POST['Serie_Mouse']);
    $Estado_Mouse = mysqli_real_escape_string($Conexion, $_POST['Estado_Mouse']);

    $Consulta = "UPDATE EQUIPOS SET  
    Nro_Taller='$Nro_Taller', 
    Nro_Maquina='$Nro_Maquina', 
    Monitor='$Monitor', 
    Serie_Monitor='$Serie_Monitor', 
    Estado_Monitor= '$Estado_Monitor',
    CPU='$CPU', 
    Serie_CPU='$Serie_CPU',
    Descripcion_CPU='$Descripcion_CPU', 
    Estado_CPU='$Estado_CPU',
    Teclado='$Teclado', 
    Serie_Teclado='$Serie_Teclado',
    Estado_Teclado='$Estado_Teclado',
    Mouse='$Mouse',
    Serie_Mouse='$Serie_Mouse',
    Estado_Mouse='$Estado_Mouse' WHERE Nro_Maquina='$Nro_Maquina'";
    mysqli_query($Conexion, $Consulta);
    mysqli_close($Conexion);
}
?>
