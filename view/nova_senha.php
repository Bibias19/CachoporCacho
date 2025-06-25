<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="senhastyle.css">
    <title>Recuperar Senha</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="logo-Photoroom (1).png" alt="Logo">
        </div>
        <div class="form">
            <form id="emailForm">
                <div class="form-header">
                    <div class="title">
                        <h1>Recuperar Senha</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>
                </div>

                <div id="error-message" style="color: red; text-align: center; margin-bottom: 10px;"></div>
                <div id="success-message" style="color: green; text-align: center; margin-bottom: 10px;"></div>

                <div class="continue-button">
                    <button type="submit">Enviar Código</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('emailForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const errorMessage = document.getElementById('error-message');
            const successMessage = document.getElementById('success-message');

            // Reset messages
            errorMessage.textContent = '';
            successMessage.textContent = '';

            if (!email || !email.includes('@')) {
                errorMessage.textContent = 'Por favor, insira um e-mail válido.';
                return;
            }

            fetch('../controller/recEmailController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `email=${encodeURIComponent(email)}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    successMessage.textContent = 'Código enviado com sucesso! Redirecionando...';
                    setTimeout(() => {
                        window.location.href = 'codigo.php';
                    }, 2000);
                } else {
                    errorMessage.textContent = data.message || 'Erro ao enviar o código.';
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