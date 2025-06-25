<?php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['recovery_email'])) {
    header('Location: usuario.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="códigostyle.css">
    <title>Verificação de Código</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="logo-Photoroom (1).png" alt="Logo">
        </div>
        <div class="form">
            <form id="codeVerificationForm">
                <div class="form-header">
                    <div class="title">
                        <h1>Verificação de Código</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="codigo">Digite o código recebido</label>
                        <input id="codigo" type="text" name="codigo" placeholder="Digite o código de 6 dígitos" required maxlength="6" pattern="[0-9]{6}">
                    </div>
                </div>

                <div id="error-message" style="color: red; text-align: center; margin-bottom: 10px;"></div>

                <div class="continue-button">
                    <button type="submit">Verificar Código</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('codeVerificationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const codigo = document.getElementById('codigo').value;
            const errorMessage = document.getElementById('error-message');

            if (!/^\d{6}$/.test(codigo)) {
                errorMessage.textContent = 'O código deve conter exatamente 6 dígitos.';
                return;
            }

            fetch('../controller/recCodeController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `codigo=${encodeURIComponent(codigo)}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect || 'senha.php';
                } else {
                    errorMessage.textContent = data.message || 'Código inválido.';
                }
            })
            .catch(error => {
                errorMessage.textContent = 'Erro ao processar a solicitação.';
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>