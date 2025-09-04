<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="senhastyle.css">
    <title>Redefinir Senha</title>
</head>

<body>
    <div class="container">
        <div class="form-image" style="color:white !important;">
            <img src="logo-Photoroom (1).png" alt="Logo">
        </div>
        <div class="form">
            <form id="resetPasswordForm">
                <div class="form-header">
                    <div class="title">
                        <h1>Nova Senha</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="nova_senha">Nova Senha</label>
                        <input id="nova_senha" type="password" name="nova_senha" placeholder="Digite sua nova senha" required minlength="6">
                    </div>

                    <div class="input-box">
                        <label for="confirmar_senha">Confirme sua nova senha</label>
                        <input id="confirmar_senha" type="password" name="confirmar_senha" placeholder="Digite sua nova senha novamente" required minlength="6">
                    </div>
                </div>

                <div id="error-message" style="color: red; text-align: center; margin-bottom: 10px;"></div>
                <div id="success-message" style="color: green; text-align: center; margin-bottom: 10px;"></div>

                <div class="continue-button">
                    <button type="submit">Redefinir Senha</button>
                </div>
            </form>
        </div>
    </div>

    <script>
       
        fetch('../controller/checkRecoverySession.php')
        .then(response => response.json())
        .then(data => {
            if (!data.authorized) {
                window.location.href = 'nova_senha.php';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            window.location.href = 'nova_senha.php';
        });

        document.getElementById('resetPasswordForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nova_senha = document.getElementById('nova_senha').value;
            const confirmar_senha = document.getElementById('confirmar_senha').value;
            const errorMessage = document.getElementById('error-message');
            const successMessage = document.getElementById('success-message');

            errorMessage.textContent = '';
            successMessage.textContent = '';

            if (nova_senha.length < 6) {
                errorMessage.textContent = 'A senha deve ter pelo menos 6 caracteres.';
                return;
            }

            if (nova_senha !== confirmar_senha) {
                errorMessage.textContent = 'As senhas não coincidem.';
                return;
            }

            fetch('../controller/recSenhaController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `nova_senha=${encodeURIComponent(nova_senha)}&confirmar_senha=${encodeURIComponent(confirmar_senha)}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    successMessage.textContent = 'Senha atualizada com sucesso! Redirecionando...';
                    setTimeout(() => {
                        window.location.href = 'login.php';
                    }, 2000);
                } else {
                    errorMessage.textContent = data.message || 'Erro ao atualizar a senha.';
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