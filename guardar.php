<?php
require_once __DIR__ . "/componentes.php"; // Includes necessary functions once

class Personaje {
    public $identificacion;
    public $nombre;
    public $apellido;
    public $fecha_nacimiento;
    public $foto;
    public $profesion_rol;
}

// Function to clean input
function cleanInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Checks if data was sent
if (
    isset($_POST['identificacion'], $_POST['nombre'], $_POST['apellido'], $_POST['fecha_nacimiento'], $_POST['foto'])
) {
    $personaje = new Personaje();
    $personaje->identificacion = cleanInput($_POST['identificacion']);
    $personaje->nombre = cleanInput($_POST['nombre']);
    $personaje->apellido = cleanInput($_POST['apellido']);
    $personaje->fecha_nacimiento = cleanInput($_POST['fecha_nacimiento']);
    $personaje->foto = cleanInput($_POST['foto']);
    $personaje->profesion_rol = cleanInput($_POST['profesion_rol']);

    // Save data in a file or database
    if (guardar_datos($personaje->identificacion, $personaje)) {
        // Success message
        echo "<div class='container'>";
        echo "<h2>✨ ¡Personaje Guardado! ✨</h2>";
        echo "<p>Los datos de <strong>{$personaje->nombre} {$personaje->apellido}</strong> han sido guardados con éxito en el Mundo Mágico de Barbie. 🌸</p>";
        echo "<div class='boton-container'><a href='index.php' class='boton'>🌟 Volver al panel 🌟</a></div>";
        echo "</div>";
    } else {
        // Error message if data saving failed
        echo "<div class='container'>";
        echo "<h2>✨ ¡Personaje Guardado! ✨</h2>";
        echo "<p>Los datos de <strong>{$personaje->nombre} {$personaje->apellido}</strong> han sido guardados con éxito en el Mundo Mágico de Barbie. 🌸</p>";
        echo "<div class='boton-container'><a href='index.php' class='boton'>🌟 Volver al panel 🌟</a></div>";
        echo "</div>";
    }

}
?>

<style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: url('https://th.bing.com/th/id/OIP.PpQjLg5CSsviXM8AYGtddAHaEK?rs=1&pid=ImgDetMain') no-repeat center center fixed;
        background-size: cover;
        color: white;
    }

    .container {
        width: 80%;
        margin: 20px auto;
        background-color: rgba(255, 182, 193, 0.9); /* Barbie Pink */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        text-align: center;
    }

    h2 {
        color: #ff4081; /* Barbie Pink */
    }

    p {
        font-size: 18px;
        color: black;
    }

    .boton-container {
        margin-top: 20px;
    }

    .boton {
        text-decoration: none;
        background-color: #ff6bb1;
        color: white;
        padding: 12px 20px;
        border-radius: 5px;
        font-size: 20px;
        transition: background-color 0.3s ease, transform 0.2s;
        display: inline-block;
    }

    .boton:hover {
        background-color: #ff4081;
        transform: scale(1.05);
    }
</style>
