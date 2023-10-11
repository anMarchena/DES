<?php
if (isset($_COOKIE['contador'])) {
    $contador = $_COOKIE['contador'];
} else {
    $contador = 0;
}

$contador++;

setcookie('contador', $contador, time() + 3600);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contador de Visitas</title>
</head>
<body>
<h2>Contador de Visitas</h2>

<?php
echo "Número de visitas: $contador";
?>
</body>
</html>
