<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required><br><br>

    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" id="apellidos" required><br><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" id="contrasena" required><br><br>

    <label>Alumno o Profesor:</label>
    <input type="checkbox" name="tipo[]" value="Alumno"> Alumno
    <input type="checkbox" name="tipo[]" value="Profesor"> Profesor<br><br>

    <label for="foto">Foto (Nombre del fichero):</label>
    <input type="file" name="foto" id="foto"><br><br>

    <label for="edad">Edad:</label>
    <input type="number" name="edad" id="edad" required><br><br>

    <label for="comentarios">Comentarios:</label>
    <textarea name="comentarios" id="comentarios" rows="4" cols="50"></textarea><br><br>

    <input type="hidden" name="test" value="myPrueba">

    <input type="submit" value="Enviar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h3>Resultados:</h3>";
    echo "Nombre: " . $_POST["nombre"] . "<br>";
    echo "Apellidos: " . $_POST["apellidos"] . "<br>";
    echo "Contraseña: " . $_POST["contrasena"] . "<br>";

    if (isset($_POST["tipo"]) && is_array($_POST["tipo"])) {
        echo "Tipo: " . implode(", ", $_POST["tipo"]) . "<br>";
    }

    if (isset($_FILES["foto"])) {
        $fotoNombre = $_FILES["foto"]["name"];
        echo "Foto: $fotoNombre<br>";
    }

    echo "Edad: " . $_POST["edad"] . "<br>";

    if (isset($_POST["comentarios"])) {
        echo "Comentarios: " . $_POST["comentarios"] . "<br>";
    }

    echo "Campo oculto (test): " . $_POST["test"];
}
?>
</body>
</html>
