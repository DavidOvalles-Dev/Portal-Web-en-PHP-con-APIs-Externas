<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Portal%20Web%20en%20PHP%20con%20APIs%20Externas/assets/css/styles.css">
</head>
<body>

<?php
    // Obtener la ruta base automáticamente
    $base_url = "/Portal%20Web%20en%20PHP%20con%20APIs%20Externas";
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= $base_url ?>/index.php">Portal PHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/pages/gender.php">Predicción de Género</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/pages/age.php">Predicción de Edad</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/pages/universities.php">Universidades</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/pages/weather.php">Clima</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/pages/pokemon.php">Pokémon</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/pages/news.php">Noticias</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/pages/currency.php">Conversión de Monedas</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/pages/images.php">Imágenes AI</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/pages/country.php">Datos de País</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/pages/jokes.php">Chistes</a></li>
            </ul>
        </div>
    </div>
</nav>
