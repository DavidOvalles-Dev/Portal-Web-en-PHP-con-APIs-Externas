<?php 
include '../includes/header.php'; 
include '../api/fetch_data.php';

$result = null;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["pokemon"])) {
    $pokemon = strtolower(htmlspecialchars($_POST["pokemon"]));
    $url = "https://pokeapi.co/api/v2/pokemon/" . urlencode($pokemon);
    $result = fetchData($url);

    if (!$result || !isset($result["sprites"])) {
        $error = "No se encontró información para el Pokémon ingresado.";
    }
}
?>

<div class="container mt-4">
    <h2 class="text-center">Información de un Pokémon</h2>
    <form method="POST" class="text-center">
        <input type="text" name="pokemon" class="form-control w-50 d-inline" placeholder="Ingresa un Pokémon" required>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <?php if ($result && isset($result["sprites"])): ?>
        <div class="card mt-3 mx-auto" style="width: 18rem;">
            <img src="<?php echo $result["sprites"]["front_default"]; ?>" class="card-img-top" alt="Imagen de Pokémon">
            <div class="card-body text-center">
                <h5 class="card-title"><?php echo ucfirst($result["name"]); ?></h5>
                <p>Experiencia Base: <?php echo $result["base_experience"]; ?></p>
                <p>Habilidades:</p>
                <ul class="list-group">
                    <?php foreach ($result["abilities"] as $ability): ?>
                        <li class="list-group-item"><?php echo ucfirst($ability["ability"]["name"]); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-warning text-center mt-3"><?php echo $error; ?></div>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
