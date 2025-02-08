<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Estadísticas (Dashboard) - Mundo Mágico de Barbie</title>
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
      width: 80%;
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

    .estadisticas-table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }

    .estadisticas-table th,
    .estadisticas-table td {
      padding: 12px;
      text-align: center;
      border: 1px solid #ff1493; /* Rosa Barbie */
    }

    .estadisticas-table th {
      background-color: #ff1493; /* Rosa fuerte */
      color: black; /* Cambio de color de letra a negro */
    }

    .estadisticas-table td {
      background-color: #fff0f5; /* Rosa claro */
      color: black; /* Cambio de color de letra a negro */
    }

    .grafico-container {
      margin-top: 30px;
      display: flex;
      justify-content: space-between;
    }

    .grafico {
      width: 48%;
      height: 300px;
      background-color: #ff69b4; /* Rosa más suave */
      border-radius: 10px;
    }

    .boton-volver-container {
      text-align: center; /* Centra el contenido dentro del contenedor */
      margin-top: 50px;
    }

    .boton-volver {
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
  </style>
</head>
<body>
<?php
include 'componentes.php';
include 'clases.php';

$datos = listar_registros(); // Ejecutar la función antes del foreach

// Obtener los datos de los participantes
?>

<div class="container">
  <h2>📊 Panel de Estadísticas (Dashboard)</h2>
  <p>✨ Visualiza todas las estadísticas de los personajes y profesiones en el Mundo Mágico de Barbie. ✨</p>
  
  <table class="estadisticas-table">
    <thead>
      <tr>
        <th>Estadística</th>
        <th>Valor</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Cantidad total de guerreros registrados:</td>
        <td><?= count($datos) ?></td>
      </tr>
      <tr>
        <td>Cantidad total de profesiones registradas</td>
        <td>12</td>
      </tr>
      <tr>
        <td>Promedio de profesiones por personaje</td>
        <td>1.2</td>
      </tr>
      <tr>
        <td>Edad promedio de los personajes</td>
        <td>23 años</td>
      </tr>
      <tr>
        <td>Distribución de personajes según su categoría de profesión</td>
        <td>50% Profesora, 30% Médico, 20% Ingeniera</td>
      </tr>
      <tr>
        <td>Nivel de experiencia más común entre los personajes</td>
        <td>Intermedio</td>
      </tr>
      <tr>
        <td>Profesión con el salario más alto</td>
        <td>Profesora (30,000 USD)</td>
      </tr>
      <tr>
        <td>Profesión con el salario más bajo</td>
        <td>Ingeniera (18,000 USD)</td>
      </tr>
      <tr>
        <td>Salario promedio en el Mundo Barbie</td>
        <td>25,000 USD</td>
      </tr>
      <tr>
        <td>Personaje con el salario más alto</td>
        <td>Barbie Profesora (50,000 USD)</td>
      </tr>
    </tbody>
  </table>

  <div class="grafico-container">
    <div class="grafico">
      <canvas id="graficoBarras"></canvas>
    </div>
    <div class="grafico">
      <canvas id="graficoPastel"></canvas>
    </div>
  </div>

  <!-- Contenedor para centrar el botón -->
  <div class="boton-volver-container">
    <a href="index.php" class="boton-volver">⬅️ Volver al Inicio</a>
  </div>
</div>

<!-- Agregar Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Gráfico de Barras
  var ctxBarras = document.getElementById('graficoBarras').getContext('2d');
  var graficoBarras = new Chart(ctxBarras, {
    type: 'bar',
    data: {
      labels: ['Profesora', 'Médico', 'Ingeniera'],
      datasets: [{
        label: 'Número de Personajes',
        data: [50, 30, 20],
        backgroundColor: ['#ff1493', '#ff69b4', '#ff8c00'],
        borderColor: ['#ff1493', '#ff69b4', '#ff8c00'],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        tooltip: {
          enabled: true,
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // Gráfico de Pastel
  var ctxPastel = document.getElementById('graficoPastel').getContext('2d');
  var graficoPastel = new Chart(ctxPastel, {
    type: 'pie',
    data: {
      labels: ['Profesora', 'Médico', 'Ingeniera'],
      datasets: [{
        label: 'Distribución por Profesión',
        data: [50, 30, 20],
        backgroundColor: ['#ff1493', '#ff69b4', '#ff8c00'],
        borderColor: ['#ff1493', '#ff69b4', '#ff8c00'],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        tooltip: {
          enabled: true,
        }
      }
    }
  });
</script>

</body>
</html>
