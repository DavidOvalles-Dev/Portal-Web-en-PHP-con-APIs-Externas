<?php 
include '../includes/header.php'; 
include '../api/fetch_data.php';

$result = null;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"])) {
    $name = htmlspecialchars($_POST["name"]);
    $url = "https://api.agify.io/?name=" . urlencode($name);
    $result = fetchData($url);

    if (!$result || !isset($result["age"])) {
        $error = "No se pudo determinar la edad.";
    }
}

function getAgeCategory($age) {
    if ($age < 18) {
        return ["Joven (👶)", "child.png"];
    } elseif ($age < 60) {
        return ["Adulto (🧑)", "adult.png"];
    } else {
        return ["Anciano (👴)", "old.png"];
    }
}
?>

<div class="container mt-4">
    <h2 class="text-center">Predicción de Edad</h2>
    <form method="POST" class="text-center">
        <input type="text" name="name" class="form-control w-50 d-inline" placeholder="Ingresa un nombre" required>
        <button type="submit" class="btn btn-primary">Predecir</button>
    </form>

    <?php if ($result && isset($result["age"])): 
        list($category, $image) = getAgeCategory($result["age"]);
    ?>
        <div class="alert mt-3 text-center alert-info">
            <p>Nombre: <strong><?php echo ucfirst($result["name"]); ?></strong></p>
            <p>Edad Estimada: <strong><?php echo $result["age"]; ?> años</strong></p>
            <p>Categoría: <strong><?php echo $category; ?></strong></p>
            <img src="../assets/img/<?php echo $image; ?>" alt="Categoría de edad" width="100">
        </div>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-warning text-center mt-3"><?php echo $error; ?></div>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
