<?php  
// Incluir el archivo donde está definida la función cargar_datos()
include 'componentes.php';
include 'clases.php';

// Obtener el código (identificación) desde el parámetro URL
$codigo = $_GET['codigo']; 

// Cargar los datos del personaje con el código proporcionado
$Personaje = cargar_datos($codigo);

// Verificar si el personaje existe
if ($Personaje === false) {
    echo "Personaje no encontrado.";
    exit;
}

// Guardar cambios si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Personaje->nombre = $_POST['nombre'];
    $Personaje->apellido = $_POST['apellido'];
    $Personaje->fecha_nacimiento = $_POST['fecha_nacimiento'];
    $Personaje->salario = $_POST['salario'];
    $Personaje->profesion_rol = $_POST['profesion_rol'];
    $Personaje->nivel = $_POST['nivel'];
    $Personaje->categoria = $_POST['categoria']; // Nuevo campo

    // Guardar los datos actualizados
    guardar_datos($codigo, $Personaje);
    
    echo "<script>alert('Datos actualizados correctamente'); window.location.href='detalles.php?codigo=$codigo';</script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Personaje</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            margin: 0;
            padding: 0;
            background: url('https://th.bing.com/th/id/OIP.TdWs2cLejeZWUI_ilZILwQHaEK?rs=1&pid=ImgDetMain');
            background-size: cover;
        }
        .container {
            width: 80%;
            margin: 30px auto;
            background-color: rgba(255, 182, 193, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(255, 105, 180, 0.8);
            text-align: center;
        }
        h1 {
            color: white;
            text-shadow: 2px 2px 4px rgba(255, 0, 136, 0.8);
        }
        .detalles {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }
        .detalles .item {
            margin-bottom: 15px;
            font-size: 18px;
            width: 48%;
            box-sizing: border-box;
        }
        img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
        .boton-volver {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 18px;
            color: white;
            background-color: #ff1493;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
        }
        .boton-volver:hover {
            background-color: #ff69b4;
        }
        .formulario-edicion {
            margin-top: 30px;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: left;
        }
        .formulario-edicion label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        .formulario-edicion input, .formulario-edicion select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .formulario-edicion button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #ff1493;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .formulario-edicion button:hover {
            background-color: #ff69b4;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Detalles del Personaje: <?= htmlspecialchars($Personaje->nombre) ?> <?= htmlspecialchars($Personaje->apellido) ?></h1>

    <div class="item">
        <strong>Foto:</strong> <img src="<?= $Personaje->foto ?>" alt="<?= $Personaje->nombre ?>">
    </div>

    <div class="detalles">
        <div class="item"><strong>Nombre:</strong> <?= htmlspecialchars($Personaje->nombre) ?> <?= htmlspecialchars($Personaje->apellido) ?></div>
        <div class="item"><strong>Edad:</strong> <?= method_exists($Personaje, 'edad') ? $Personaje->edad() : 'N/A' ?></div>
        <div class="item"><strong>Fecha de Nacimiento:</strong> <?= htmlspecialchars($Personaje->fecha_nacimiento) ?></div>
        <div class="item"><strong>Salario:</strong> <?= isset($Personaje->salario) ? htmlspecialchars($Personaje->salario) : 'No especificado' ?></div>
        <div class="item"><strong>Nombre de la profesión:</strong> <?= htmlspecialchars($Personaje->profesion_rol) ?></div>
        <div class="item"><strong>Nivel de experiencia:</strong> <?= isset($Personaje->nivel) ? htmlspecialchars($Personaje->nivel) : 'No especificado' ?></div>
        <div class="item"><strong>Categoría:</strong> <?= isset($Personaje->categoria) ? htmlspecialchars($Personaje->categoria) : 'No especificado' ?></div>
    </div>

    <!-- Formulario para editar -->
    <form method="POST" class="formulario-edicion">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($Personaje->nombre) ?>" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?= htmlspecialchars($Personaje->apellido) ?>" required>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" value="<?= htmlspecialchars($Personaje->fecha_nacimiento) ?>">

        <label for="salario">Salario:</label>
        <input type="text" name="salario" value="<?= htmlspecialchars($Personaje->salario) ?>">

        <label for="profesion_rol">Nombre de la profesión:</label>
        <input type="text" name="profesion_rol" value="<?= htmlspecialchars($Personaje->profesion_rol) ?>">

        <label for="nivel">Nivel de experiencia:</label>
        <select name="nivel">
            <option value="Principiante" <?= ($Personaje->nivel == 'Principiante') ? 'selected' : '' ?>>Principiante</option>
            <option value="Intermedio" <?= ($Personaje->nivel == 'Intermedio') ? 'selected' : '' ?>>Intermedio</option>
            <option value="Avanzado" <?= ($Personaje->nivel == 'Avanzado') ? 'selected' : '' ?>>Avanzado</option>
        </select>

        <label for="categoria">Categoría:</label>
        <input type="text" name="categoria" value="<?= htmlspecialchars($Personaje->categoria) ?>">

        <button type="submit">Guardar Cambios</button>
    </form>

    <a href="MundoBarbie.php" class="boton-volver">⬅️ Volver a la lista</a>
</div>

</body>
</html>
