<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $lengua = $_POST["lengua"];

    setcookie("nombre_usuario", $nombre, time() + 3600 * 24 * 30);
    setcookie("lengua_defecto", $lengua, time() + 3600 * 24 * 30);
}

header("Location: index.php");
?>
