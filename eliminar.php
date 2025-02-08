<?php
// Incluir la función eliminar_personaje desde el archivo correspondiente
include 'componentes.php';

// Verificar si el código del personaje está presente en la URL
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo']; // Obtener el código del personaje

    // Llamar a la función eliminar_personaje
    $resultado = eliminar_personaje($codigo);

    echo "<div class='container'>";
    
    if ($resultado) {
        // Si el archivo se eliminó con éxito, mostrar un mensaje de éxito
        echo "<h2>✨ ¡Personaje eliminado con éxito! ✨</h2>";
        echo "<p>El personaje ha sido eliminado del Mundo Mágico de Barbie. 🌸</p>";
        echo "<div class='boton-container'><a href='index.php' class='boton'>🌟 Volver al Panel 🌟</a></div>";
    } else {
        // Si no se pudo eliminar, mostrar un mensaje de error
        echo "<h2>⚠️ Error al eliminar ⚠️</h2>";
        echo "<p>No se pudo eliminar el personaje. El archivo no existe. 🌸</p>";
        echo "<div class='boton-container'><a href='index.php' class='boton'>⬅️ Volver al Panel</a></div>";
    }

    echo "</div>";
} else {
    // Si no se proporciona un código, mostrar mensaje de error
    echo "<div class='container'>";
    echo "<h2>⚠️ Error ⚠️</h2>";
    echo "<p>No se proporcionó un código válido para eliminar. 🌸</p>";
    echo "<div class='boton-container'><a href='index.php' class='boton'>⬅️ Volver al Panel</a></div>";
    echo "</div>";
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
