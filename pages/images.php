<?php
$api_key = "TU_API_KEY_UNSPLASH"; // Reemplaza con tu API Key de Unsplash
$image_url = ""; // Variable para almacenar la URL de la imagen

// Verificar si el formulario fue enviado
if (isset($_GET['unsplash']) && !empty($_GET['unsplash'])) {
    $query = urlencode($_GET['unsplash']);
    
    // Llamada a la API de Unsplash
    $api_url = "https://api.unsplash.com/photos/random?query=$query&client_id=$api_key";
    
    $response = file_get_contents($api_url);
    
    if ($response !== false) {
        $data = json_decode($response, true);
        
        if (isset($data['urls']['regular'])) {
            $image_url = $data['urls']['regular']; // Obtener la URL de la imagen
        } else {
            $error = "No se encontraron imágenes para '$query'.";
        }
    } else {
        $error = "Error al conectar con la API de Unsplash.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Imágenes AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Generador de Imágenes AI</h2>
    <form method="GET" action="">
        <div class="mb-3">
            <label for="unsplash" class="form-label">Ingresa una palabra clave:</label>
            <input type="text" class="form-control" id="unsplash" name="unsplash" required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar Imagen</button>
    </form>

    <?php if (!empty($image_url)): ?>
        <div class="mt-4">
            <h4>Imagen Generada:</h4>
            <img src="<?= $image_url ?>" alt="Imagen de Unsplash" class="img-fluid">
        </div>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-danger mt-3"><?= $error ?></div>
    <?php endif; ?>
</div>

</body>
</html>
