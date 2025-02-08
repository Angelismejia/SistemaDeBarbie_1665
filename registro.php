<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenidos al Mundo Mágico de Barbie</title>
  <style>
    /* Estilos generales */
    body {
      font-family: 'Comic Sans MS', cursive, sans-serif;
      margin: 0;
      padding: 0;
      background: url('https://th.bing.com/th/id/OIP.TdWs2cLejeZWUI_ilZILwQHaEK?rs=1&pid=ImgDetMain') no-repeat center center fixed;
      background-size: cover;
      color: white;
    }

    .container {
      width: 50%;
      margin: 30px auto;
      background-color: rgba(255, 182, 193, 0.9); /* Rosa pastel */
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(255, 105, 180, 0.8);
      text-align: center;
    }

    h2 {
      font-size: 26px;
      color:rgb(255, 255, 255); /* Rosa fuerte */
      text-shadow: 2px 2px 4px rgba(255, 0, 136, 0.8);
    }


    .form-group {
      margin-bottom: 15px;
      text-align: left;
    }

    label {
      display: block;
      font-weight: bold;
      color: #d63384; /* Rosa Barbie */
      font-size: 18px;
    }

    input {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 2px solid #ff1493; /* Borde rosa Barbie */
      font-size: 16px;
      background-color: #fff0f5; /* Rosa claro */
    }

    .botones {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .boton {
      padding: 10px;
      width: 48%;
      text-align: center;
      border: none;
      border-radius: 10px;
      font-size: 18px;
      cursor: pointer;
      font-weight: bold;
    }

    .guardar {
      background-color: #ff1493; /* Rosa fuerte */
      color: white;
    }

    .guardar:hover {
      background-color: #ff69b4; /* Rosa Barbie */
    }

    .atras {
      background-color: #ff1493; /* Amarillo Barbie */
      color: white;
      text-decoration: none;
      display: inline-block;
      text-align: center;
      line-height: 40px;
    }

    .atras:hover {
      background-color: #ff69b4; /* Amarillo más suave */
    }
  </style>
</head>
<body>

<div class="container">
  <h2>💖 ¡Bienvenidos al Mundo Mágico de Barbie! 💖</h2>
  <p>✨ Crea tu propio personaje y dale vida en este mundo de sueños y aventuras. ✨</p>
  
  <form method="post" action="guardar.php">
    <?php
      echo my_input("identificacion", "Identificación", "", ["required" => true]);
      echo my_input("nombre", "Nombre", "", ["required" => true]);
      echo my_input("apellido", "Apellido", "", ["required" => true]);
      echo my_input("fecha_nacimiento", "Fecha de nacimiento", "", ["type" => "date", "required" => true]);
      echo my_input("foto", "Foto del Personaje (URL)", "", ["type" => "url", "required" => true]);
      echo my_input("profesion_rol", "Profesión o Rol en el Mundo Barbie", "", ["required" => true]);
    ?>
    
    <div class="botones">
      <button type="submit" class="boton guardar">💾 Guardar</button>
      <a href="index.php" class="boton atras">⬅️ Volver</a>
    </div>
  </form>
</div>

<?php
function my_input($nombre, $label, $valor = "", $opciones = []) {
    $tipo = isset($opciones["type"]) ? $opciones["type"] : "text";
    $required = isset($opciones["required"]) && $opciones["required"] ? "required" : "";
    ?>
    <div class="form-group">
        <label for="<?= htmlspecialchars($nombre) ?>"><?= htmlspecialchars($label) ?>:</label>
        <input type="<?= $tipo ?>" value="<?= htmlspecialchars($valor) ?>" name="<?= htmlspecialchars($nombre) ?>" id="<?= htmlspecialchars($nombre) ?>" <?= $required ?>>
    </div>
    <?php
}
?>

</body>
</html>
