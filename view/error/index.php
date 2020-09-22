<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
    <?php require_once 'view/header.php'; ?>
    <div id="main" class="error center">
        <h1>Error al cargar el recurso</h1>
        <h2>Error: <?php echo $this->mensaje; ?> </h2>
    </div>
    <?php require_once 'view/footer.php'; ?>
</body>
</html>