<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index-login.html">
    <title>Formulário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="logo-Photoroom (1).png">
        </div>
        <div class="form">
            <form action="#">
                <div class="form-header">
                    <div class="title">
                        <h1>Nova senha</h1>
                    </div>
                </div>

                <div class="input-group">
        

                    <div class="input-box">
                        <label for="password">Nova Senha</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                    </div>


                    <div class="input-box">
                        <label for="confirmPassword">Confirme sua nova senha</label>
                        <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Digite sua senha novamente" required>
                    </div>

                </div>

                

                <div class="continue-button">
                    <button><a href="#">Login</a> </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function login() {
            window.location.href = "index-login.html"
        }
        </script>
</body>

</html>