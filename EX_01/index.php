<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="palabra">Pon una palabra:</label>
    <input type="text" name="palabra" id="palabra" required>
    <input type="submit" value="Calcular Longitud">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $palabra = $_POST["palabra"];

    $longitud = strlen($palabra);

    echo "La longitud de '$palabra' es de $longitud caracteres.";
}
?>
</body>
</html>
