<?php
require_once '../config/database.php';

class CadastroModel {
    
    public static function emailExiste($pdo, $email) {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }

    public static function cadastrar($pdo, $full_name, $email, $telefone, $senha) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        try {
            $pdo->beginTransaction();

            // 1. Inserir na tabela 'pessoa'
            $stmt = $pdo->prepare("INSERT INTO pessoa (full_name, email, telefone) VALUES (?, ?, ?)");
            $stmt->execute([$full_name, $email, $telefone]);
            $pessoa_id = $pdo->lastInsertId();

            // 2. Inserir na tabela 'usuario'
            $stmt = $pdo->prepare("INSERT INTO usuario (email, senha, id_pessoa) VALUES (?, ?, ?)");
            $stmt->execute([$email, $senhaHash, $pessoa_id]);
            $user_id = $pdo->lastInsertId();

            $pdo->commit();
            return true;
        } catch (PDOException $e) {
            $pdo->rollBack();
            // Em um ambiente de produção, seria bom logar o erro.
            // error_log($e->getMessage());
            return false;
        }
    }
}
?>
