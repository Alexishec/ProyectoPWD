<!DOCTYPE html>
<html>
<head>
    <!-- <link rel="stylesheet" href="./css/fuentes/fuente1.css"> -->
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="./css/cajas/containers.css">
</head>
<body class="bodyy">
    <div class="cajaContenedor">
        <main>
        <!-- <h2>Iniciar Sesión</h2><br><br> -->
            <div class="caja">
                <div class="cajaInput">
                        
                        <form method="post" action="">
                            Nombre de usuario: <br><input type="text" name="nombre"><br>
                            Contraseña: <br><input type="password" name="contrasenia"><br>
                            <input type="submit" class="buton" name="iniciar_sesion" value="Iniciar Sesión">
                        </form>
                    </div>
                </div>
                <div class="caja">
                    <div class="links">
                        <p>¿No tiene cuenta? Puede crearse una <a href="register.php">aquí</a></p>
                    </div>
                </div>
            </div>
        </main>

<?php
if (isset($_POST["iniciar_sesion"])) {
    $nombre = $_POST["nombre"];
    $contrasenia = $_POST["contrasenia"];

    $conn = new mysqli('localhost', 'alexishector310804', '31Deagosto@', 'pwd');

    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    $query = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($contrasenia, $row["contrasenia"])) {
            session_start();
            $_SESSION["nombre"] = $nombre;
            header("location: bienvenido.php");
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $conn->close();
}
?>
</div>
</body>
</html>
