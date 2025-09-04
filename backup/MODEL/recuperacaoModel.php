<?php
require_once '../config/conexao_recovery.php';

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
            
            error_log("Código gerado para $email: $codigo");
            return $codigo;
        } catch (PDOException $e) {
            error_log("Erro ao gerar código: " . $e->getMessage());
            return false;
        }
    }

    public static function verificarCodigo($pdo_recovery, $email, $codigo) {
        try {
            error_log("Tentando verificar código para $email: $codigo");
            
            // Primeiro, vamos ver se existe algum código para este email
            $stmt = $pdo_recovery->prepare("SELECT * FROM recovery_codes WHERE email = ? ORDER BY created_at DESC LIMIT 1");
            $stmt->execute([$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$result) {
                error_log("Nenhum código encontrado para o email: $email");
                return false;
            }
            
            error_log("Código encontrado no banco: " . $result['code']);
            
            // Comparar os códigos de forma mais flexível
            if (trim($result['code']) === trim($codigo)) {
                error_log("Código válido encontrado!");
                return $result['id'];
            }
            
            error_log("Código inválido. Esperado: " . $result['code'] . ", Recebido: " . $codigo);
            return false;
        } catch (PDOException $e) {
            error_log("Erro na verificação do código: " . $e->getMessage());
            return false;
        }
    }

    public static function marcarCodigoComoUsado($pdo_recovery, $id) {
        try {
            error_log("Marcando código $id como usado");
            $stmt = $pdo_recovery->prepare("UPDATE recovery_codes SET used = 1 WHERE id = ?");
            $result = $stmt->execute([$id]);
            error_log("Código marcado como usado: " . ($result ? "sim" : "não"));
            return $result;
        } catch (PDOException $e) {
            error_log("Erro ao marcar código como usado: " . $e->getMessage());
            return false;
        }
    }

    public static function atualizarSenha($pdo, $pdo_recovery, $email, $novaSenha) {
        try {
            error_log("Tentando atualizar senha para o email: $email");
            $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE usuario SET senha = ? WHERE email = ?");
            $result = $stmt->execute([$senhaHash, $email]);
            error_log("Senha atualizada: " . ($result ? "sim" : "não"));
            return $result;
        } catch (PDOException $e) {
            error_log("Erro ao atualizar senha: " . $e->getMessage());
            return false;
        }
    }

    // Função auxiliar para debug
    public static function debugRecoveryCodes($pdo_recovery, $email) {
        try {
            $stmt = $pdo_recovery->prepare("SELECT * FROM recovery_codes WHERE email = ? ORDER BY created_at DESC");
            $stmt->execute([$email]);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            error_log("Códigos encontrados para $email:");
            foreach ($results as $row) {
                error_log(json_encode($row));
            }
        } catch (PDOException $e) {
            error_log("Erro ao debugar códigos: " . $e->getMessage());
        }
    }
}
?>