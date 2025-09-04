<?php
class marcaModel {
    // public static function autenticar($pdo, $descricao) {
    //     $stmt = $pdo->prepare("SELECT * FROM marca WHERE email = ?");
    //     $stmt->execute([$email]);
    //     $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
    //     return ($usuario && password_verify($senha, $usuario['senha'])) ? $usuario : false;
    // }

    public static function cadastrar($pdo, $descricao) {
        $stmt = $pdo->prepare("INSERT INTO marca (descricao) VALUES (?)");
        return $stmt->execute([$descricao]);
    }
}
?>