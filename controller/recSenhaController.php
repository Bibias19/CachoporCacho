<?php
session_start();
require_once '../config/database.php';
require_once '../config/conexao_recovery.php';
require_once '../MODEL/recuperacaoModel.php';

header('Content-Type: application/json');

if (!isset($_SESSION['recovery_email']) || !isset($_SESSION['recovery_code_verified'])) {
    echo json_encode(['success' => false, 'message' => 'Acesso negado. Por favor, complete as etapas anteriores.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nova_senha = $_POST['nova_senha'] ?? '';
    $confirmar_senha = $_POST['confirmar_senha'] ?? '';
    $email = $_SESSION['recovery_email'];

    if (empty($nova_senha) || strlen($nova_senha) < 6) {
        echo json_encode(['success' => false, 'message' => 'A senha deve ter pelo menos 6 caracteres.']);
        exit;
    }

    if ($nova_senha !== $confirmar_senha) {
        echo json_encode(['success' => false, 'message' => 'As senhas não coincidem.']);
        exit;
    }

    if (RecuperacaoModel::atualizarSenha($pdo, $pdo_recovery, $email, $nova_senha)) {
        // Limpa a sessão de recuperação
        unset($_SESSION['recovery_email']);
        unset($_SESSION['recovery_code_verified']);

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar a senha.']);
    }
    exit;
}
?>