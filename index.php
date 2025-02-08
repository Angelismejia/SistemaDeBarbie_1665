<!DOCTYPE html>
<html lang="es">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de Participantes</title>
  <style>
    /* Estilos generales */
    /*php -S localhost:8000*/
    /* http://localhost:8000/panel.php */
    body {
      font-family: 'Comic Sans MS', cursive, sans-serif;
      margin: 0;
      padding: 0;
      background: url('https://wallpapercave.com/wp/wp9554137.jpg') no-repeat center center fixed;
      background-size: cover;
      color: white;
      font-size: 20px;
    }

    .container {
      width: 80%;
      margin: 20px auto;
      background-color: rgba(255, 182, 193, 0.9); /* Rosa pastel */
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(255, 105, 180, 0.8);
      text-align: center;
    }

    h1 {
      font-size: 40px;
      margin-bottom: 10px;
      color: #ff4081;  /* Rosa brillante */
    }

    p {
      font-size: 22px;
      color: black;
    }

    .botones {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      gap: 15px;
      margin-bottom: 20px;
    }

    .botones a {
      text-decoration: none;
      background-color: #ff6bb1; /* Rosa Barbie */
      color: white;
      padding: 14px 24px;
      border-radius: 5px;
      font-size: 22px;
      transition: background-color 0.3s ease, transform 0.2s;
      display: inline-block;
    }

    .botones a:hover {
      background-color: #ff4081;
      transform: scale(1.05);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      color: black;
      font-size: 22px;
    }

    th, td {
      padding: 14px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #ff6bb1;
      color: white;
    }

    tr:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    img {
      border-radius: 0;
      width: 100px;
      height: 100px;
      object-fit: cover;
    }

    .ver-detalle-btn, .eliminar-btn {
      text-decoration: none;
      background-color: #ff80ab;
      color: black;
      padding: 12px 18px;
      border-radius: 5px;
      font-weight: bold;
      font-size: 20px;
      transition: background-color 0.3s ease, transform 0.2s;
    }

    .ver-detalle-btn:hover, .eliminar-btn:hover {
      background-color: #ff4081;
      transform: scale(1.05);
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="content">
      <h1>Bienvenidos al Mundo Mágico de Barbie</h1>
      <p>✨ ¡Explora un mundo lleno de sueños, aventuras y personajes inolvidables! ✨</p>
    </div>
  </div>

  <div class="container">
    <!-- Contenedor de botones -->
    <div class="botones">
      <a href="registro.php" title="Registrate">Registrar personaje</a>
      <a href="panel.php" title="Ver estadísticas">Panel de estadísticas</a>
    </div>

    <!-- Tabla de participantes -->
    <table>
      <thead>
        <tr>
          <th>Foto</th>
          <th>Nombre</th>
          <th>Edad</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Incluir el archivo donde está definida la función listar_registros()
          include 'componentes.php';
          include 'clases.php';
          $datos = listar_registros(); // Ejecutar la función antes del foreach
        ?>

        <?php 
        foreach($datos as $Personaje) {
            echo "
            <tr>
                <td><img src='{$Personaje->foto}' alt='{$Personaje->nombre}'></td>
                <td>{$Personaje->nombre} {$Personaje->apellido}</td>
                <td>{$Personaje->edad()}</td>
                <td>
                  <a href='detalles.php?codigo={$Personaje->identificacion}' class='ver-detalle-btn'>Editar Personaje</a>
                  <a href='eliminar.php?codigo={$Personaje->identificacion}' class='eliminar-btn' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este personaje?\")'>Eliminar Personaje</a>
                </td>
            </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
