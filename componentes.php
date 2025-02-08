<?php

// Guardar datos en un archivo
function guardar_datos($codigo, $datos) {
    $directorio = __DIR__ . "/datos"; // Ruta de la carpeta 'datos'
    $ruta = $directorio . "/" . $codigo . ".dat"; // Ruta absoluta del archivo

    // Verificar si la carpeta 'datos' existe, si no, crearla
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true); // Crea la carpeta con permisos adecuados
    }

    $contenido = serialize($datos);
    file_put_contents($ruta, $contenido);
}

// Cargar datos desde un archivo
function cargar_datos($codigo) {
    $ruta = __DIR__ . "/datos/" . $codigo . ".dat"; // Ruta absoluta
    
    if (!file_exists($ruta)) {
        return false;
    }
    
    $datos = file_get_contents($ruta);
    return unserialize($datos);
}

function listar_registros(){
    $registros = [];
    $archivos = scandir("datos");
    foreach($archivos as $archivo){
      if(!is_file("datos/".$archivo)){ // Corrected condition
        continue;
      }
      $datos = cargar_datos(str_replace(".dat", "", $archivo));
      $registros[] = $datos;
    }
    return $registros;
  }
  error_reporting(E_ALL & ~E_DEPRECATED);

  function eliminar_personaje($codigo) {
    $ruta = __DIR__ . "/datos/" . $codigo . ".dat"; // Ruta del archivo del personaje

    // Verificar si el archivo existe
    if (file_exists($ruta)) {
        unlink($ruta); // Elimina el archivo
        return true; // Si se eliminó correctamente
    } else {
        return false; // Si no se encontró el archivo
    }
}


?>