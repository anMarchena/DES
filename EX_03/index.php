<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="numero">Ingrese un número:</label>
    <input type="number" name="numero" id="numero" required>
    <input type="submit" value="Generar Líneas">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];

    if (is_numeric($numero) && $numero > 0) {
        echo "<h3>Escribiendo $numero líneas:</h3>";

        for ($i = 1; $i <= $numero; $i++) {
            if ($i==33){
                echo "Como? $i. Me repites ese numerin?<br>";
            }else{
                echo "Escribiendo linea $i...<br>";
            }
        }
    } else {
        echo "Ingrese un número válido y mayor que cero.";
    }
}
?>
</body>
</html>
