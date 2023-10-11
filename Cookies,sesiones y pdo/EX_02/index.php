<!DOCTYPE html>
<html>
<head>
    <title>Configuración de Usuario</title>
</head>
<body>
<h2>Configuración de Usuario</h2>
<form action="cookies.php" method="post">
    <label for="nombre">Nombre de Usuario:</label>
    <input type="text" name="nombre" id="nombre"><br><br>

    <label for="lengua">Lengua por Defecto:</label>
    <select name="lengua" id="lengua">
        <option value="es">Español</option>
        <option value="en">Inglés</option>
        <option value="fr">Francés</option>
    </select><br><br>

    <input type="submit" value="Guardar Configuración">
</form>
</body>
</html>
