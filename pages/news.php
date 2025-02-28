<?php 
include '../includes/header.php'; 
include '../api/fetch_data.php';

$result = null;
$error = "";
$defaultSite = "https://techcrunch.com"; // Sitio por defecto

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["site"])) {
    $site = rtrim(htmlspecialchars($_POST["site"]), '/');
    $url = $site . "/wp-json/wp/v2/posts?per_page=3&_fields=title,excerpt,link";
    $result = fetchData($url);

    if (!$result || !is_array($result)) {
        $error = "No se pudieron obtener noticias del sitio seleccionado.";
    }
}
?>

<div class="container mt-4">
    <h2 class="text-center">Últimas Noticias</h2>
    <form method="POST" class="text-center">
        <input type="text" name="site" class="form-control w-50 d-inline" placeholder="URL de WordPress (Ej: https://techcrunch.com)" required>
        <button type="submit" class="btn btn-primary">Obtener Noticias</button>
    </form>

    <?php if ($result && is_array($result)): ?>
        <div class="row mt-3">
            <?php foreach ($result as $news): ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $news["title"]["rendered"]; ?></h5>
                            <p class="card-text"><?php echo strip_tags($news["excerpt"]["rendered"]); ?></p>
                            <a href="<?php echo $news["link"]; ?>" class="btn btn-primary" target="_blank">Leer más</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-warning text-center mt-3"><?php echo $error; ?></div>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
