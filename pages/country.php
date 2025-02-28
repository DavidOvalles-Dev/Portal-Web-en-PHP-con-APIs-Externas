<?php 
include '../includes/header.php'; 
include '../api/fetch_data.php';

$result = null;
$error = "";
$countryData = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["country"])) {
    $country = urlencode(htmlspecialchars($_POST["country"]));
    $url = "https://restcountries.com/v3.1/name/{$country}";

    $result = fetchData($url);

    if (!$result || !is_array($result)) {
        $error = "No se encontró información para el país ingresado.";
    } else {
        $data = $result[0]; // Tomamos el primer resultado
        $countryData = [
            "name" => $data["name"]["common"] ?? "Desconocido",
            "flag" => $data["flags"]["png"] ?? "",
            "capital" => $data["capital"][0] ?? "No disponible",
            "population" => number_format($data["population"] ?? 0),
            "currency" => isset($data["currencies"]) ? array_values($data["currencies"])[0]["name"] : "No disponible"
        ];
    }
}
?>

<div class="container mt-4">
    <h2 class="text-center">Información de un País</h2>
    <form method="POST" class="text-center">
        <input type="text" name="country" class="form-control w-50 d-inline" placeholder="Ingresa un país" required>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <?php if (!empty($countryData)): ?>
        <div class="card mt-3 mx-auto" style="max-width: 400px;">
            <img src="<?php echo $countryData["flag"]; ?>" class="card-img-top" alt="Bandera">
            <div class="card-body text-center">
                <h5 class="card-title"><?php echo $countryData["name"]; ?></h5>
                <p class="card-text"><strong>Capital:</strong> <?php echo $countryData["capital"]; ?></p>
                <p class="card-text"><strong>Población:</strong> <?php echo $countryData["population"]; ?></p>
                <p class="card-text"><strong>Moneda:</strong> <?php echo $countryData["currency"]; ?></p>
            </div>
        </div>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-warning text-center mt-3"><?php echo $error; ?></div>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
