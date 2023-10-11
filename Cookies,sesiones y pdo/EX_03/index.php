<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['puntos_acumulados'])) {
    $_SESSION['puntos_acumulados'] = 0;
}

$_SESSION['puntos_acumulados'] += 10;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página Principal</title>
</head>
<body>
<h2>Bienvenido, <?php echo $_SESSION['username']; ?></h2>
<p>Puntos acumulados: <?php echo $_SESSION['puntos_acumulados']; ?></p>

<form method="post" action="index.php">
    <input type="submit" name="logout" value="Cerrar Sesión">
</form>
</body>
</html>

