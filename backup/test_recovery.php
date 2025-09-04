<?php
require_once 'config/conexao_recovery.php';
require_once 'config/database.php';

// Incluir o model diretamente sem usar require_once
class RecuperacaoModel {

    public static function gerarCodigo($pdo_recovery, $email) {
        try {
            // Limpar códigos antigos deste email
            $stmt = $pdo_recovery->prepare("DELETE FROM recovery_codes WHERE email = ?");
            $stmt->execute([$email]);
            
            // Gerar novo código
            $codigo = rand(100000, 999999);
            
            // Inserir novo código
            $stmt = $pdo_recovery->prepare("INSERT INTO recovery_codes (email, code, used) VALUES (?, ?, 0)");
            $stmt->execute([$email, $codigo]);
            
            return $codigo;
        } catch (PDOException $e) {
            error_log("Erro ao gerar código: " . $e->getMessage());
            return false;
        }
    }

    public static function verificarCodigo($pdo_recovery, $email, $codigo) {
        try {
            // Buscar o código mais recente para este email
            $stmt = $pdo_recovery->prepare("SELECT id FROM recovery_codes WHERE email = ? AND code = ? AND used = 0 ORDER BY created_at DESC LIMIT 1");
            $stmt->execute([$email, $codigo]);
            $result = $stmt->fetch();
            
            return $result ? $result['id'] : false;
        } catch (PDOException $e) {
            error_log("Erro na verificação do código: " . $e->getMessage());
            return false;
        }
    }

    public static function marcarCodigoComoUsado($pdo_recovery, $id) {
        try {
            $stmt = $pdo_recovery->prepare("UPDATE recovery_codes SET used = 1 WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            error_log("Erro ao marcar código como usado: " . $e->getMessage());
            return false;
        }
    }
}

echo "=== TESTE DO SISTEMA DE RECUPERAÇÃO ===\n";

// 1. Testar geração de código
$email_teste = "teste@teste.com";
echo "1. Gerando código para: $email_teste\n";

$codigo = RecuperacaoModel::gerarCodigo($pdo_recovery, $email_teste);
if ($codigo) {
    echo "   ✓ Código gerado: $codigo\n";
} else {
    echo "   ✗ Erro ao gerar código\n";
    exit;
}

// 2. Verificar se o código foi salvo no banco
echo "2. Verificando se o código foi salvo...\n";
$stmt = $pdo_recovery->prepare("SELECT * FROM recovery_codes WHERE email = ? ORDER BY created_at DESC LIMIT 1");
$stmt->execute([$email_teste]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    echo "   ✓ Código encontrado no banco: {$result['code']}\n";
    echo "   ✓ Status: " . ($result['used'] == 0 ? 'Não usado' : 'Usado') . "\n";
} else {
    echo "   ✗ Código não encontrado no banco\n";
    exit;
}

// 3. Testar verificação do código
echo "3. Testando verificação do código...\n";
$id_codigo = RecuperacaoModel::verificarCodigo($pdo_recovery, $email_teste, $codigo);
if ($id_codigo) {
    echo "   ✓ Código verificado com sucesso (ID: $id_codigo)\n";
} else {
    echo "   ✗ Erro na verificação do código\n";
    exit;
}

// 4. Testar marcação como usado
echo "4. Testando marcação como usado...\n";
if (RecuperacaoModel::marcarCodigoComoUsado($pdo_recovery, $id_codigo)) {
    echo "   ✓ Código marcado como usado\n";
} else {
    echo "   ✗ Erro ao marcar código como usado\n";
}

// 5. Verificar se não pode ser usado novamente
echo "5. Verificando se o código não pode ser usado novamente...\n";
$id_codigo2 = RecuperacaoModel::verificarCodigo($pdo_recovery, $email_teste, $codigo);
if (!$id_codigo2) {
    echo "   ✓ Código não pode ser usado novamente (correto)\n";
} else {
    echo "   ✗ Código ainda pode ser usado (erro)\n";
}

echo "\n=== TESTE CONCLUÍDO ===\n";
echo "Se todos os testes passaram, o sistema está funcionando!\n";
?> 