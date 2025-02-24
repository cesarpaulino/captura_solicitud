<?php
// Conexión a la base de datos (ajusta con tus datos)
require './conexion.php';

// Configuración de paginación
$registros_por_pagina = 25; // Cuántos registros mostrar por página
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1; // Página actual
$offset = ($pagina - 1) * $registros_por_pagina; // Calcular el OFFSET

// Consulta para obtener los registros de la página actual
$sql = "SELECT * FROM registros ORDER BY id LIMIT $registros_por_pagina OFFSET $offset";
$resultado = $conexion->query($sql);

// Consulta para contar el total de registros
$total_registros = $conexion->query("SELECT COUNT(*) as total FROM registros")->fetch(PDO::FETCH_ASSOC)['total'];
$total_paginas = ceil($total_registros / $registros_por_pagina); // Calcular total de páginas

?>
