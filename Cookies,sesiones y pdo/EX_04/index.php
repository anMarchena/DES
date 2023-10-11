<?php

// Conexión a la base de datos
try {
    $conexion = new PDO('mysql:host=fmesasc.com;dbname=daw2', 'daw2', 'Gimbernat');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión a la base de datos OK<br>";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

// Crear la tabla usuarios_adrian si no existe
try {
    $sql = "CREATE TABLE IF NOT EXISTS usuarios_adrian (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(255) NOT NULL,
        correo VARCHAR(255) NOT NULL,
        contrasena VARCHAR(255) NOT NULL,
        fecha_nacimiento DATE,
        permisos BOOLEAN,
        imagen VARCHAR(255)
    )";

    $conexion->exec($sql);
    echo "Tabla usuarios_adrian creada o ya existente<br>";
} catch (PDOException $e) {
    echo "Error al crear la tabla: " . $e->getMessage();
}

// Datos de 5 usuarios
$usuarios = [
    [
        'nombre' => 'Pedro',
        'correo' => 'pedro@example.com',
        'contrasena' => 'clave123',
        'fecha_nacimiento' => '1990-01-01',
        'permisos' => true,
        'imagen' => 'pedro.jpg',
    ],
    [
        'nombre' => 'Ana',
        'correo' => 'ana@example.com',
        'contrasena' => 'contraseña123',
        'fecha_nacimiento' => '1985-03-15',
        'permisos' => false,
        'imagen' => 'ana.jpg',
    ],
    [
        'nombre' => 'Juan',
        'correo' => 'juan@example.com',
        'contrasena' => 'clave456',
        'fecha_nacimiento' => '1992-08-10',
        'permisos' => true,
        'imagen' => 'juan.jpg',
    ],
    [
        'nombre' => 'María',
        'correo' => 'maria@example.com',
        'contrasena' => 'contraseña789',
        'fecha_nacimiento' => '1987-05-20',
        'permisos' => false,
        'imagen' => 'maria.jpg',
    ],
    [
        'nombre' => 'Luis',
        'correo' => 'luis@example.com',
        'contrasena' => 'clave789',
        'fecha_nacimiento' => '1995-11-30',
        'permisos' => true,
        'imagen' => 'luis.jpg',
    ],
];

// Insertar los 5 usuarios en la tabla
try {
    foreach ($usuarios as $usuario) {
        $sql = "INSERT INTO usuarios_adrian (nombre, correo, contrasena, fecha_nacimiento, permisos, imagen)
                VALUES (:nombre, :correo, :contrasena, :fecha_nacimiento, :permisos, :imagen)";

        $stmt = $conexion->prepare($sql);
        $stmt->execute($usuario);
    }

    echo "Se han insertado 5 usuarios correctamente<br>";
} catch (PDOException $e) {
    echo "Error al insertar usuarios: " . $e->getMessage();
}

// Obtener y mostrar información de todos los usuarios
try {
    $sql = "SELECT * FROM usuarios_adrian";
    $stmt = $conexion->query($sql);

    echo "Listado de usuarios:<br>";

    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $fila['id'] . "<br>";
        echo "Nombre: " . $fila['nombre'] . "<br>";
        echo "Correo: " . $fila['correo'] . "<br>";
        echo "Fecha de Nacimiento: " . $fila['fecha_nacimiento'] . "<br>";
        echo "Permisos: " . ($fila['permisos'] ? 'Sí' : 'No') . "<br>";
        echo "Imagen: " . $fila['imagen'] . "<br>";
        echo "<hr>";
    }
} catch (PDOException $e) {
    echo "Error al obtener información de usuarios: " . $e->getMessage();
}

?>
