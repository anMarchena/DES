<!DOCTYPE html>
<html>
<head>
</head>
<body>
<br action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="num1">Ingrese el primer número:</label>
    <input type="number" name="num1" id="num1" required></br></br>

    <label for="operacion">Seleccione la operación:</label>
    <select name="operacion" id="operacion">
        <option value="sumar">Sumar</option>
        <option value="restar">Restar</option>
        <option value="multiplicar">Multiplicar</option>
        <option value="dividir">Dividir</option>
    </select></br></br>

    <label for="num2">Ingrese el segundo número:</label>
    <input type="number" name="num2" id="num2" required></br>

    <input type="submit" value="Calcular">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operacion = $_POST["operacion"];

    echo "<h3>Resultado de la Operación:</h3>";

    switch ($operacion) {
        case "sumar":
            $resultado = $num1 + $num2;
            echo "$num1 + $num2 = $resultado";
            break;
        case "restar":
            $resultado = $num1 - $num2;
            echo "$num1 - $num2 = $resultado";
            break;
        case "multiplicar":
            $resultado = $num1 * $num2;
            echo "$num1 * $num2 = $resultado";
            break;
        case "dividir":
            if ($num2 != 0) {
                $resultado = $num1 / $num2;
                echo "$num1 / $num2 = $resultado";
            } else {
                echo "Error: No se puede dividir por cero.";
                break;
            }
            break;
        default:
            echo "Operación no válida.";
            break;
    }
}
?>
</body>
</html>

