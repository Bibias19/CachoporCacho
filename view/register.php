<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="logo-Photoroom (1).png">
        </div>
        <div class="form">
            <form id="registerForm" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastro</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="full_name">Nome Completo</label>
                        <input id="full_name" type="text" name="full_name" placeholder="Digite seu nome completo" required>
                    </div>

                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="telefone">Telefone</label>
                        <input id="telefone" type="tel" name="telefone" placeholder="(xx) xxxx-xxxx" required>
                    </div>

                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>

                    <div class="input-box">
                        <label for="confirmar_senha">Confirme sua senha</label>
                        <input id="confirmar_senha" type="password" name="confirmar_senha" placeholder="Digite sua senha novamente" required>
                    </div>
                </div>

                <div class="login-button">
                    <button type="submit">Cadastrar</button>
                    <button type="button" onclick="window.location.href='login.php'">Voltar para Login</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate password confirmation
            const senha = document.getElementById('senha').value;
            const confirmarSenha = document.getElementById('confirmar_senha').value;
            
            if (senha !== confirmarSenha) {
                alert('As senhas não coincidem!');
                return;
            }
            
            const formData = new FormData(this);
            
            fetch('../controller/cadastroController.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Cadastro realizado com sucesso!');
                    window.location.href = "login.php";
                } else {
                    alert(data.message || 'Erro ao fazer cadastro');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao fazer cadastro');
            });
        });
    </script>
</body>
</html> 