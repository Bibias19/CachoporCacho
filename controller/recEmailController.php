<?php
session_start();
require_once '../config/conexao_recovery.php';
require_once '../config/database.php';
require_once '../MODEL/recuperacaoModel.php';

header('Content-Type: application/json');

error_log("Iniciando processo de recuperação de senha...");
error_log("POST data: " . json_encode($_POST));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';

    error_log("Email recebido: $email");

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        error_log("Email inválido: $email");
        echo json_encode(['success' => false, 'message' => 'Por favor, insira um e-mail válido.']);
        exit;
    }

    // Verificar se o email existe na tabela de usuários
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        $emailExists = $stmt->fetchColumn() > 0;
        
        error_log("Email existe no banco? " . ($emailExists ? "Sim" : "Não"));
        
        if (!$emailExists) {
            error_log("Email não encontrado: $email");
            echo json_encode(['success' => false, 'message' => 'E-mail não encontrado no sistema.']);
            exit;
        }
    } catch (PDOException $e) {
        error_log("Erro ao verificar email: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Erro ao verificar e-mail.']);
        exit;
    }

    // Limpar códigos antigos e gerar novo código
    $codigo = RecuperacaoModel::gerarCodigo($pdo_recovery, $email);

    if ($codigo) {
        error_log("Novo código gerado com sucesso: $codigo");
        $_SESSION['recovery_email'] = $email;
        $_SESSION['recovery_code_sent'] = true;
        
        error_log("Session após gerar código: " . json_encode($_SESSION));
        
        // Debug: verificar códigos no banco
        RecuperacaoModel::debugRecoveryCodes($pdo_recovery, $email);
        
        echo json_encode([
            'success' => true,
            'message' => 'Código enviado com sucesso! Por favor, verifique seu email.',
            'debug_code' => $codigo // Apenas para teste
        ]);
    } else {
        error_log("Erro ao gerar código para: $email");
        echo json_encode(['success' => false, 'message' => 'Erro ao gerar o código.']);
    }
    exit;
}
?>