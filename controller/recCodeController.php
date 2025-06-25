<?php
session_start();
require_once '../config/conexao_recovery.php';
require_once '../MODEL/recuperacaoModel.php';

header('Content-Type: application/json');

error_log("Iniciando verificação de código...");
error_log("Session data: " . json_encode($_SESSION));
error_log("POST data: " . json_encode($_POST));

if (!isset($_SESSION['recovery_email'])) {
    error_log("Email não encontrado na sessão");
    echo json_encode(['success' => false, 'message' => 'Sessão inválida. Por favor, inicie o processo novamente.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo'] ?? '';
    $email = $_SESSION['recovery_email'];

    error_log("Verificando código para email: $email");
    error_log("Código recebido: $codigo");

    if (empty($codigo)) {
        error_log("Código vazio");
        echo json_encode(['success' => false, 'message' => 'Por favor, insira o código.']);
        exit;
    }

    // Debug: mostrar todos os códigos para este email
    RecuperacaoModel::debugRecoveryCodes($pdo_recovery, $email);

    $id_codigo = RecuperacaoModel::verificarCodigo($pdo_recovery, $email, $codigo);

    if ($id_codigo) {
        error_log("Código válido encontrado com ID: $id_codigo");
        RecuperacaoModel::marcarCodigoComoUsado($pdo_recovery, $id_codigo);
        $_SESSION['recovery_code_verified'] = true;
        
        error_log("Session após verificação: " . json_encode($_SESSION));
        echo json_encode(['success' => true, 'redirect' => 'senha.php']);
    } else {
        error_log("Código inválido para o email: $email");
        echo json_encode(['success' => false, 'message' => 'Código inválido. Por favor, tente novamente.']);
    }
    exit;
}
?>