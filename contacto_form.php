<?php
include 'comentarios_crud.php';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $comentario = $_POST['comentario'];

    createComment($nombre, $email, $asunto, $comentario);

    echo "Formulario enviado correctamente.";
}
?>
