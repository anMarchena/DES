<?php
session_start();

if (isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['puntos_acumulados'] = 0;
    header("Location: index.php");
    exit();
}

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
</head>
<body>
<h2>Iniciar Sesión</h2>

<form method="post" action="login.php">
    <label for="username">Nombre de Usuario:</label>
    <input type="text" name="username" id="username" required>
    <input type="submit" value="Iniciar Sesión">
</form>
</body>
</html>
