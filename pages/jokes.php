<?php 
include '../includes/header.php'; 
include '../api/fetch_data.php';

$result = null;
$error = "";
$joke = [];

$url = "https://official-joke-api.appspot.com/random_joke";
$result = fetchData($url);

if (!$result || !isset($result["setup"], $result["punchline"])) {
    $error = "No se pudo obtener un chiste en este momento.";
} else {
    $joke = [
        "setup" => $result["setup"],
        "punchline" => $result["punchline"]
    ];
}
?>

<div class="container mt-4 text-center">
    <h2>Generador de Chistes</h2>

    <?php if (!empty($joke)): ?>
        <div class="card mx-auto mt-3" style="max-width: 500px;">
            <div class="card-body">
                <h5 class="card-title">😂 Aquí tienes un chiste:</h5>
                <p class="card-text"><strong><?php echo $joke["setup"]; ?></strong></p>
                <p class="card-text text-muted"><?php echo $joke["punchline"]; ?></p>
                <a href="jokes.php" class="btn btn-primary">Otro chiste</a>
            </div>
        </div>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-warning"><?php echo $error; ?></div>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
