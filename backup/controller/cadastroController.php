<?php
session_start();
require_once '../config/database.php';
require_once '../MODEL/cadastroModel.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $confirmar_senha = $_POST['confirmar_senha'] ?? '';

    // Validações
    if (empty($full_name) || empty($email) || empty($telefone) || empty($senha)) {
        echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios.']);
        exit;
    }

    if ($senha !== $confirmar_senha) {
        echo json_encode(['success' => false, 'message' => 'As senhas não coincidem!']);
        exit;
    }
    
    if (CadastroModel::emailExiste($pdo, $email)) {
        echo json_encode(['success' => false, 'message' => 'Este e-mail já está cadastrado.']);
        exit;
    }

    if (CadastroModel::cadastrar($pdo, $full_name, $email, $telefone, $senha)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao realizar o cadastro. Tente novamente.']);
    }
    exit;
}
?>