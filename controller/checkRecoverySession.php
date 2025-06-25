<?php
session_start();
header('Content-Type: application/json');

$authorized = isset($_SESSION['recovery_email']) && isset($_SESSION['recovery_code_verified']) && $_SESSION['recovery_code_verified'] === true;

echo json_encode([
    'authorized' => $authorized
]);
?> 