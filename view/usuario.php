<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Recuperar Senha</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="logo-Photoroom (1).png">
        </div>
        <div class="form">
            <form id="recoveryForm" method="POST">
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

                <div class="login-button">
                    <button type="submit">Enviar Código</button>
                    <button type="button" onclick="window.location.href='login.php'">Voltar para Login</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('recoveryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('../controller/recEmailController.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "codigo.php";
                } else {
                    alert(data.message || 'Erro ao processar solicitação');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao processar solicitação');
            });
        });
    </script>
</body>
</html>
