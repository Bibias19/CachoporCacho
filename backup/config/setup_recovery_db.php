<?php
require_once 'database.php';

try {
    // Create pessoa table
    $pdo->exec("CREATE TABLE IF NOT EXISTS pessoa (
        pessoaID INT(11) NOT NULL AUTO_INCREMENT,
        full_name VARCHAR(100) COLLATE utf8mb4_general_ci NOT NULL,
        email VARCHAR(200) COLLATE utf8mb4_general_ci NOT NULL,
        telefone VARCHAR(20) COLLATE utf8mb4_general_ci NOT NULL,
        PRIMARY KEY (pessoaID)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");

    // Create usuario table
    $pdo->exec("CREATE TABLE IF NOT EXISTS usuario (
        id_usuario INT(11) NOT NULL AUTO_INCREMENT,
        email VARCHAR(130) COLLATE utf8mb4_general_ci NOT NULL,
        senha VARCHAR(255) COLLATE utf8mb4_general_ci NOT NULL,
        id_pessoa INT(11) NOT NULL,
        PRIMARY KEY (id_usuario),
        FOREIGN KEY (id_pessoa) REFERENCES pessoa(pessoaID)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");

    // Create codigo table
    $pdo->exec("CREATE TABLE IF NOT EXISTS codigo (
        id_code INT(11) NOT NULL AUTO_INCREMENT,
        lido TINYINT(1) NOT NULL DEFAULT 0,
        id_usuario INT(11) NOT NULL,
        code VARCHAR(255) COLLATE utf8mb4_general_ci NOT NULL,
        email VARCHAR(255) COLLATE utf8mb4_general_ci NOT NULL,
        PRIMARY KEY (id_code),
        FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");

    // Create recovery_codes table
    $pdo->exec("CREATE TABLE IF NOT EXISTS recovery_codes (
        id INT(11) NOT NULL AUTO_INCREMENT,
        email VARCHAR(255) COLLATE utf8mb4_general_ci NOT NULL,
        code VARCHAR(255) COLLATE utf8mb4_general_ci NOT NULL,
        used TINYINT(1) NOT NULL DEFAULT 0,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");

    echo "All tables created successfully!";
} catch (PDOException $e) {
    die("Error creating tables: " . $e->getMessage());
}
?>