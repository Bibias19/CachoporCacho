<?php
require_once 'config/conexao_recovery.php';

echo "=== VERIFICANDO TABELA RECOVERY_CODES ===\n";

try {
    // Verificar estrutura atual
    $stmt = $pdo_recovery->query("DESCRIBE recovery_codes");
    echo "Estrutura atual:\n";
    $columns = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "- {$row['Field']}: {$row['Type']}\n";
        $columns[] = $row['Field'];
    }
    
    // Verificar se a coluna 'used' existe
    if (!in_array('used', $columns)) {
        echo "\nAdicionando coluna 'used'...\n";
        $sql = "ALTER TABLE recovery_codes ADD COLUMN used TINYINT(1) NOT NULL DEFAULT 0";
        $pdo_recovery->exec($sql);
        echo "Coluna 'used' adicionada com sucesso!\n";
    } else {
        echo "\nColuna 'used' já existe.\n";
    }
    
    // Verificar se a coluna 'code' existe
    if (!in_array('code', $columns)) {
        echo "\nAdicionando coluna 'code'...\n";
        $sql = "ALTER TABLE recovery_codes ADD COLUMN code VARCHAR(255) NOT NULL";
        $pdo_recovery->exec($sql);
        echo "Coluna 'code' adicionada com sucesso!\n";
    } else {
        echo "\nColuna 'code' já existe.\n";
    }
    
    // Limpar códigos antigos
    echo "\nLimpando códigos antigos...\n";
    $sql = "DELETE FROM recovery_codes WHERE created_at < NOW() - INTERVAL 1 HOUR";
    $pdo_recovery->exec($sql);
    echo "Códigos antigos removidos.\n";
    
    echo "\n=== TABELA PRONTA PARA USO ===\n";
    
} catch (PDOException $e) {
    echo "ERRO: " . $e->getMessage() . "\n";
}
?> 