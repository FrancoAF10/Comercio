<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="RegistrosM.css" type="text/css">
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
                      <a class="nav-link active" href="/comercio/views/taller01/taller1.php">TALLER 1</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/comercio/views/taller02/taller2.php">TALLER 2</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/comercio/views/taller03/taller3.php">TALLER 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/comercio/views/taller04/taller4.php">TALLER 4</a>
                      </li>
                      <form class="d-flex">
                      <nav class="navbar-text me-2" style="font-weight: bold;">BUSCAR:</nav>
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="buscar" id="buscar" style="width: 400px;">
                    </form>
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
              <h1 align="center">REGISTROS DE EQUIPOS</h1>
              </div>

<div class="table-container">
<table class="table table-bordered">
<thead>
    <th>N° Taller</th>
    <th>Maquina</th>
    <th>Monitor</th>
    <th>Serie Monitor</th>
    <th>Estado Monitor</th>
    <th>CPU</th>
    <th>Serie CPU</th>
    <th>Descripcion CPU</th>
    <th>Estado CPU</th>
    <th>Teclado</th>
    <th>Serie Teclado</th>
    <th>Estado Teclado</th>
    <th>Mouse</th>
    <th>Serie Mouse</th>
    <th>Estado Mouse</th>

</thead>
<!--CARGA DE LOS DATOS DENTRO DEL TBODY-->
<tbody id="content">

</tbody>

</table>
</div>
<script>
getData()
 document.getElementById("buscar").addEventListener("keyup", getData)
function getData(){
    let input=document.getElementById("buscar").value
    let content=document.getElementById("content")
    let url="buscar.php"
    let formaData=new FormData()
    formaData.append('buscar', input)
    
    fetch(url, {

        method: "POST",
        body:formaData
    }).then(response => response.json())
    .then(data => {
        content.innerHTML=data
    }).catch(err => console.log(err))
}
</script>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>