<?php 
include '../includes/header.php'; 
include '../api/fetch_data.php';

$result = null;
$error = "";
$conversion = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["amount"])) {
    $amount = floatval($_POST["amount"]);
    $url = "https://api.exchangerate-api.com/v4/latest/USD";
    $result = fetchData($url);

    if (!$result || !isset($result["rates"])) {
        $error = "No se pudo obtener la tasa de cambio.";
    } else {
        $conversion = [
            "DOP" => round($amount * $result["rates"]["DOP"], 2),
            "EUR" => round($amount * $result["rates"]["EUR"], 2),
            "GBP" => round($amount * $result["rates"]["GBP"], 2),
            "JPY" => round($amount * $result["rates"]["JPY"], 2)
        ];
    }
}
?>

<div class="container mt-4">
    <h2 class="text-center">Conversión de Monedas</h2>
    <form method="POST" class="text-center">
        <input type="number" step="0.01" name="amount" class="form-control w-50 d-inline" placeholder="Monto en USD" required>
        <button type="submit" class="btn btn-primary">Convertir</button>
    </form>

    <?php if (!empty($conversion)): ?>
        <div class="alert mt-3 text-center alert-info">
            <p><strong><?php echo number_format($_POST["amount"], 2); ?> USD</strong> equivale a:</p>
            <ul class="list-group">
                <li class="list-group-item">🇩🇴 <?php echo $conversion["DOP"]; ?> DOP</li>
                <li class="list-group-item">🇪🇺 <?php echo $conversion["EUR"]; ?> EUR</li>
                <li class="list-group-item">🇬🇧 <?php echo $conversion["GBP"]; ?> GBP</li>
                <li class="list-group-item">🇯🇵 <?php echo $conversion["JPY"]; ?> JPY</li>
            </ul>
        </div>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-warning text-center mt-3"><?php echo $error; ?></div>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
