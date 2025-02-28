<?php 
include '../includes/header.php'; 
include '../api/fetch_data.php';

$result = null;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["country"])) {
    $country = htmlspecialchars($_POST["country"]);
    $url = "http://universities.hipolabs.com/search?country=" . urlencode($country);
    $result = fetchData($url);

    if (!$result || empty($result)) {
        $error = "No se encontraron universidades para este país.";
    }
}
?>

<div class="container mt-4">
    <h2 class="text-center">Universidades por País</h2>
    <form method="POST" class="text-center">
        <input type="text" name="country" class="form-control w-50 d-inline" placeholder="Ingresa un país en inglés" required>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <?php if ($result && !empty($result)): ?>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dominio</th>
                    <th>Web</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $uni): ?>
                    <tr>
                        <td><?php echo $uni["name"]; ?></td>
                        <td><?php echo $uni["domains"][0]; ?></td>
                        <td><a href="<?php echo $uni["web_pages"][0]; ?>" target="_blank">Visitar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-warning text-center mt-3"><?php echo $error; ?></div>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
