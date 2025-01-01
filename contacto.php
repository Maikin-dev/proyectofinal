<?php
include 'comentarios_crud.php';  

$comments = readComments();
$total_comments = countComments();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $asunto = $_POST['asunto'];
        $comentario = $_POST['comentario'];
        header("Location: contacto.php");
        exit;
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        deleteComment($id);
        header("Location: contacto.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="assets\style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Librería Online</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Libros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="autores.php">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="contacto.php">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="main-container">
    <h1>Contacto</h1>
    <form action="contacto_form.php" method="POST">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="asunto" class="form-label">Asunto</label>
            <input type="text" class="form-control" id="asunto" name="asunto" required>
        </div>
        <div class="mb-3">
            <label for="comentario" class="form-label">Comentario</label>
            <textarea class="form-control" id="comentario" name="comentario" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <h2 class="mt-5 mb-4">Lista de Comentarios</h2>
    <p>Comentarios registrados: <strong><?php echo $total_comments; ?></strong></p>
    <?php foreach ($comments as $comment): ?>
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title mb-0"><?php echo htmlspecialchars($comment['nombre']); ?></h5>
            <small><?php echo htmlspecialchars($comment['fecha']); ?></small>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Asunto:</strong> <?php echo htmlspecialchars($comment['asunto']); ?></p>
            <p class="card-text"><?php echo htmlspecialchars($comment['comentario']); ?></p>

            <form method="POST" class="mt-2">
                <input type="hidden" name="id" value="<?php echo $comment['id']; ?>">
                <input type="hidden" name="delete">
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        </div>
    </div> 
    <?php endforeach; ?>
</div>

</body>
</html>
