<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="usuariostyle.css">
    <title>Cadastro</title>
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
                        <h1>Recuperação de senha!</h1>
 
                    </div>
                </div>
                <div class="input-group">
                   
                    <div class="input-box">  
                        <label for="email">Email</label>
                       <input id="email" type="email" name="email" placeholder="Digite seu email " required>
                       
                    </div>
                    <div class="login-button">
                        <button type="button" onclick="redirect()">confirmar</button>
                    </div>

            </form>
        </div>
    </div>
    <script>
        function redirect() {
            window.location.href = "codigo.php";
        }
    </script>
</body>
</html>
