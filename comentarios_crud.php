<?php
require 'db_config.php';

function createComment($nombre, $email, $asunto, $comentario) {
    global $pdo;
    $sql = "INSERT INTO contacto (fecha, correo, nombre, asunto, comentario) 
            VALUES (NOW(), :email, :nombre, :asunto, :comentario)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':asunto', $asunto);
    $stmt->bindParam(':comentario', $comentario);
    $stmt->execute();
}

function readComments() {
    global $pdo;
    $sql = "SELECT * FROM contacto ORDER BY fecha DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function countComments() {
    global $pdo;
    $sql = "SELECT COUNT(*) as count FROM contacto";
    $stmt = $pdo->query($sql);
    return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
}

function deleteComment($id) {
    global $pdo;
    $sql = "DELETE FROM contacto WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
?>
