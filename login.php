<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="comercio.css" rel="stylesheet" type="text/css">
  <title>INGRESO</title>
</head>
<body>
 

  <!-- INICIO DE NAVBAR -->
  <!-- Aquí puedes agregar código para una barra de navegación si es necesario -->
  <!-- FIN DE NAVBAR -->
<form action="" method="post">
<h1 align="center">LOGIN</h1>
  <?php
  include("models/conexion.php");
  include("controllers/controlador.php");
  ?>
  <label  for="Id">Id:</label>
  <input type="text" id="usuario" placeholder="Ingrese ID" name="usuario" max="7">
  <script>
      const numeroInput = document.getElementById("numeroInput");
      numeroInput.addEventListener("input", function() {
          // Valida dato ingresado que sea numerico
          const valor = parseFloat(this.value);
          if (isNaN(valor)) {
              this.value = ""; 
          }
      });
  </script>
    <br>
  <label for="contrasenia">Contraseña:</label>
  <input type="password" id="password" name="password" placeholder="Ingrese contraseña" max="6">
  <br>
  <input type="submit" value="Ingresar" name="btningresar">

</form>
</body>
</html>