<?php 
include '../includes/header.php'; 
include '../api/fetch_data.php'; 
include '../config.php'; // Para la clave de API

$result = null;
$error = "";
$weatherIcon = "";
$weatherBg = "bg-light";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["city"])) {
    $city = htmlspecialchars($_POST["city"]);
    $apiKey = $apiKeys["weather"]; // Asegúrate de definir tu clave en config.php
    $url = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . ",DO&appid=" . $apiKey . "&units=metric&lang=es";
    
    $result = fetchData($url);

    if (!$result || !isset($result["weather"])) {
        $error = "No se pudo obtener la información del clima.";
    } else {
        $weatherIcon = "https://openweathermap.org/img/wn/" . $result["weather"][0]["icon"] . "@2x.png";
        $description = ucfirst($result["weather"][0]["description"]);
        $temperature = round($result["main"]["temp"], 1);
        
        // Cambiar fondo según el clima
        if (strpos($description, 'lluvia') !== false) {
            $weatherBg = "bg-info text-white";
        } elseif (strpos($description, 'nube') !== false) {
            $weatherBg = "bg-secondary text-white";
        } elseif (strpos($description, 'sol') !== false || strpos($description, 'despejado') !== false) {
            $weatherBg = "bg-warning text-dark";
        }
    }
}
?>

<div class="container mt-4">
    <h2 class="text-center">Clima en República Dominicana</h2>
    <form method="POST" class="text-center">
        <input type="text" name="city" class="form-control w-50 d-inline" placeholder="Ingresa una ciudad" required>
        <button type="submit" class="btn btn-primary">Consultar</button>
    </form>

    <?php if ($result && isset($result["weather"])): ?>
        <div class="alert mt-3 text-center <?php echo $weatherBg; ?>">
            <h4><?php echo ucfirst($result["name"]); ?></h4>
            <img src="<?php echo $weatherIcon; ?>" alt="Ícono del clima">
            <p><?php echo $description; ?></p>
            <h2><?php echo $temperature; ?>°C</h2>
        </div>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-warning text-center mt-3"><?php echo $error; ?></div>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
