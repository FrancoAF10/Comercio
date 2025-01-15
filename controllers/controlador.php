<?php
session_start();
if(!empty($_POST["btningresar"])){
    if(empty($_POST["usuario"]) and empty($_POST["password"])){
        echo '<div class="alert" style=color:red>LOS CAMPOS ESTAN VACIOS</div>';
    }else{
        $usuario=$_POST["usuario"];
        $clave=$_POST["password"] ;
        $sql=$conexion->query(" SELECT * FROM USUARIO WHERE Id_Usuario='$usuario' AND  Password_Usuario='$clave'");
        if($datos=$sql->fetch_object()){
            $_SESSION["usuario"] = $usuario;
            header("Location: /comercio/views/taller01/taller1.php");
            exit();
        }else{
            echo '<div class="alert alert-danger">  ACCESO DENEGADO</div>';
        }
    }
}

