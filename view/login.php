<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="index-login.php">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="logo-Photoroom (1).png">
        </div>
        <div class="form">
            <form id="loginForm" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Faça seu Login!</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                    </div>
                </div>

                <div class="login-button">
                    <button type="submit">Login</button>       
                      <button type="button" onclick="window.location.href='usuario.php'">recuperar senha</button>
                    <button type="button" onclick="window.location.href='register.php'">Criar conta</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('../controller/authController.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "index.php";
                } else {
                    alert(data.message || 'Erro ao fazer login');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao fazer login');
            });
        });

        function senha() {
        }
    </script>
</body>

</html>