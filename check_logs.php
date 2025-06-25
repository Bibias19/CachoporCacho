<?php
// Verificar onde estão os logs de erro do PHP
echo "=== CONFIGURAÇÃO DE LOGS DO PHP ===\n";
echo "error_log: " . ini_get('error_log') . "\n";
echo "log_errors: " . (ini_get('log_errors') ? 'ON' : 'OFF') . "\n";
echo "display_errors: " . (ini_get('display_errors') ? 'ON' : 'OFF') . "\n";

// Verificar se existe arquivo de log padrão
$log_file = ini_get('error_log');
if ($log_file && file_exists($log_file)) {
    echo "\n=== ÚLTIMAS LINHAS DO LOG ===\n";
    $lines = file($log_file);
    $last_lines = array_slice($lines, -20); // Últimas 20 linhas
    foreach ($last_lines as $line) {
        echo $line;
    }
} else {
    echo "\nArquivo de log não encontrado ou não configurado.\n";
}

// Testar se conseguimos escrever no log
error_log("TESTE - Verificando se conseguimos escrever no log");
echo "\nTeste de log enviado. Verifique se apareceu acima.\n";
?> 