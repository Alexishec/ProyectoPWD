<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" href="./css/cajas/containers.css">
</head>
<body class="bodyy">
    <div class="cajaContenedor">
        <main>
        <h2>Registro</h2>
        <br><br>
        <div class="caja">
                <div class="cajaInput">
                    <form method="post" action="">
                        Nombre <br><input type="text" name="nombre"><br>
                        Contraseña <br><input type="password" name="contrasenia"><br>
                        Correo Elec <br><input type="text" name="mail"><br><br>
                        <input type="submit" class="buton" name="registrar" value="Registrarse">
                    </form>
                </div>
        </div>
        <div class="caja">
            <div class="links">
                <p>¿Ya tiene cuenta? Puede iniciar sesion <a href="login.php">aquí</a></p>
            </div>
</main>
        <?php
    if (isset($_POST["registrar"])) {
        $nombre = $_POST["nombre"];
        $contrasenia = $_POST["contrasenia"];
        $mail = $_POST["mail"];

        $conn = new mysqli('localhost', 'root', '', 'pwd');

        if ($conn->connect_error) {
            die("Error en la conexión a la base de datos: " . $conn->connect_error);
        }
        
        $errores = array();

        if (empty($nombre)) {
            $errores[] = "El nombre de usuario es obligatorio.";
        }

        if (empty($contrasenia)) {
            $errores[] = "La contraseña es obligatoria.";
        }

        if (empty($mail)) {
            $errores[] = "El correo electrónico es obligatorio.";
        }

        // Verifica si el nombre de usuario ya existe
        $query = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $errores[] = "El nombre de usuario ya existe. Por favor, elige otro.";
        }

        if (!empty($errores)) {
            echo "<h3>Errores:</h3>";
            echo "<ul>";
            foreach ($errores as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
        } else {

            $contrasenia = password_hash($contrasenia, PASSWORD_BCRYPT);
            $insertQuery = "INSERT INTO usuarios (nombre, contrasenia, mail) VALUES ('$nombre', '$contrasenia', '$mail')";
            if ($conn->query($insertQuery) === TRUE) {

                header("Location: login.php?registro=exitoso");

                exit(); 
            } else {
                echo "Error en el registro: " . $conn->error;
            }
        }
        $conn->close();
    }
    ?>
    </div>
</body>
</html>
