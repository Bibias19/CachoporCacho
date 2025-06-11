<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
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
                        <button type="button" onclick="login()">Login</button>       
                        <button type="button" onclick="senha()">Recuperar senha</button>
                       
                    </div>
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