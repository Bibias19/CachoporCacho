<?php
session_start();
require_once '../MODEL/marcaModel.php';
require_once '../config/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descicao = $_POST['decricao'] ?? '';

    try {
        $marca = marcaModel::cadastrar($pdo, $descicao);

        if ($marca) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar marca']);
        }
    } catch(PDOException $e) {
        error_log($e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Erro no servidor: ' . $e->getMessage()]);
    }
    exit;
}
?>