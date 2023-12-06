<?php
session_start(); // Inicia la sesión

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION["nombre"])) {
    $nombre = $_SESSION["nombre"];
} else {
// Si no hay una sesión iniciada, puedes redirigir al usuario a la página de inicio de sesión
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="./css/usuarios/usuario.css">
    <link rel="stylesheet" href="./css/cajas/containers.css">
    <!-- <link rel="stylesheet" href="./css/etiquetas/eti_mod.css"> -->
    <link rel="stylesheet" href="./css/fuentes/fuente1.css">
    <link rel="stylesheet" href="./css/poke/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


</head>
<body class="cursiva">

<!-- ------------------------------------------------------------------------------------------ -->
<!-- HEADER -->
<div class="container">
<header>

    <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="">
            <span class="box1 menu-user">
                <img src="./imagenes/iconos/usuario.webp" alt="User">
            </span>

        </label>
        <nav class="menu">
            <ul>
                <li class="box2" ><?php echo $nombre; ?></li>
                <li class="box2"><a href="../login_registers/bienvenido.php"><img src="./imagenes/iconos/Inicio.webp" alt="Inicio"></a></li>
                <li class="box2" ><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
        <h2 class="cursiva2">Pokedex</h2>
      

</header>
</div>
<!-- ------------------------------------------------------------------------------------------ -->
<!-- MAIN -->

<main>

<div class="pokemon-container">

</div>
<nav class="pagination" aria-label="...">
    <ul class="pagination">
      <li class="page-item" id="previous">
        <a class="page-link" href="#" tabindex="-1">Anterior</a>
      </li>
      <li class="page-item" id="next">
        <a class="page-link" href="#">Siguiente</a>
      </li>
    </ul>
  </nav>
<div id="spinner" class="spinner-border text-light" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>

<script src="../anashe/main.js"></script>
</main>



<!-- ------------------------------------------------------------------------------------------ -->
</body>
</html>
