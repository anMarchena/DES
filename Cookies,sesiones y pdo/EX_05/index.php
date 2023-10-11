<?php
session_start();

// Variables para el inicio de sesión
$correo = $password = "";
$correoErr = $passwordErr = "";

// Verifica si se ha enviado el formulario de inicio de sesión o registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        // Lógica para el formulario de inicio de sesión
        $correo = $_POST["correo"];
        $password = $_POST["password"];

        try {
            $conexion = new PDO('mysql:host=fmesasc.com;dbname=daw2', 'daw2', 'Gimbernat');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Consulta SQL para verificar las credenciales del usuario
            $sql = "SELECT * FROM usuarios_adrian WHERE correo = :correo";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar la contraseña
            if ($usuario && password_verify($password, $usuario['contrasena'])) {
                $_SESSION['username'] = $usuario['nombre'];
                header("Location: welcome.php");
                exit();
            } else {
                $passwordErr = "Credenciales incorrectas";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    if (isset($_POST['registro'])) {
        // Lógica para el formulario de registro
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
        $fechaNacimiento = $_POST["fecha_nacimiento"];
        $permisos = false; // Por defecto, los nuevos usuarios no son administradores

        // Manejo de la imagen
        $imagenNombre = $_FILES["imagen"]["name"];
        $imagenRuta = "uploads/" . $imagenNombre;
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagenRuta);

        try {
            $conexion = new PDO('mysql:host=fmesasc.com;dbname=daw2', 'daw2', 'Gimbernat');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO usuarios_adrian (nombre, correo, contrasena, fecha_nacimiento, permisos, imagen) 
                    VALUES (:nombre, :correo, :contrasena, :fecha_nacimiento, :permisos, :imagen)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':contrasena', $contrasena);
            $stmt->bindParam(':fecha_nacimiento', $fechaNacimiento);
            $stmt->bindParam(':permisos', $permisos);
            $stmt->bindParam(':imagen', $imagenRuta);
            $stmt->execute();

            echo "Usuario registrado correctamente.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión y Registro</title>
</head>
<body>
<h2>Iniciar Sesión</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="login">
    Correo: <input type="email" name="correo" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <span class="error"><?php echo $passwordErr; ?></span>
    <input type="submit" name="login" value="Iniciar Sesión">
</form>

<h2>Registro</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <input type="hidden" name="registro">
    Nombre: <input type="text" name="nombre" required><br>
    Correo: <input type="email" name="correo" required><br>
    Contraseña: <input type="password" name="contrasena" required><br>
    Fecha de Nacimiento: <input type="date" name="fecha_nacimiento" required><br>
    Imagen: <input type="file" name="imagen"><br>
    <input type="submit" name="registro" value="Registrarse">
</form>

</body>
</html>
