<?php
// Arquivo com funções para manipulação de dados

// Função para buscar todos os emails
function buscarEmails($pdo_recovery) {
    $sql = "SELECT * FROM recovery_codes ORDER BY created_at DESC";
    $stmt = $pdo_recovery->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarEmailPorId($pdo_recovery, $id) {
    $sql = "SELECT * FROM recovery_codes WHERE id = ?";
    $stmt = $pdo_recovery->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function marcarComoLido($pdo_recovery, $id) {
    $sql = "UPDATE recovery_codes SET used = 1 WHERE id = ?";
    $stmt = $pdo_recovery->prepare($sql);
    return $stmt->execute([$id]);
}

// Função para formatar a data
function formatarData($data) {
    $timestamp = strtotime($data);
    return date('d/m/Y', $timestamp);
}
?>