<?php
class AuthModel {
    public static function autenticar($pdo, $email, $senha) {
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return ($usuario && password_verify($senha, $usuario['senha'])) ? $usuario : false;
    }
}
?>