<?php
$host = 'localhost';
$dbname = 'pi';
$user = 'root';
$pass = '';

try {
    $pdo_recovery = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo_recovery->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados de recuperação: " . $e->getMessage());
}
?>