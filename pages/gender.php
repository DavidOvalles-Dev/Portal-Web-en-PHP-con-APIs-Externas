<?php 
include '../includes/header.php'; 
include '../api/fetch_data.php';

$result = null;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"])) {
    $name = htmlspecialchars($_POST["name"]);
    $url = "https://api.genderize.io/?name=" . urlencode($name);
    $result = fetchData($url);

    if (!$result || !isset($result["gender"])) {
        $error = "No se pudo determinar el género.";
    }
}
?>

<div class="container mt-4">
    <h2 class="text-center">Predicción de Género</h2>
    <form method="POST" class="text-center">
        <input type="text" name="name" class="form-control w-50 d-inline" placeholder="Ingresa un nombre" required>
        <button type="submit" class="btn btn-primary">Predecir</button>
    </form>

    <?php if ($result && isset($result["gender"])): ?>
        <div class="alert mt-3 text-center <?php echo ($result['gender'] == 'male') ? 'alert-primary' : 'alert-danger'; ?>">
            <p>Nombre: <strong><?php echo ucfirst($result["name"]); ?></strong></p>
            <p>Género: <strong><?php echo ucfirst($result["gender"]); ?></strong></p>
            <p>Precisión: <?php echo ($result["probability"] * 100) . "%"; ?></p>
        </div>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-warning text-center mt-3"><?php echo $error; ?></div>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
