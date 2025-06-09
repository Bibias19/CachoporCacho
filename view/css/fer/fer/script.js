const form = document.getElementById('some-form')
form.addEventListener('submit', e => {
e.preventDefault()
})

function entrar() {
    var email = document.getElementById("email");
    var senha = document.getElementById("senha");

    var emailStore = localStorage.getItem('email');
    var senhaStore = localStorage.getItem('senha');

    if (emailStore == email.value && senhaStore == senha.value) {
        alert("Login realizado com sucesso!");
        

        setTimeout(function() {
            window.location.href = "Assinatura/Assinatura.html"; 
        }, 2000);
        
    } else {
        alert("Usuário ou senha incorretos!");
    }
}
function registrar(){

    var email = document.getElementById("email");
    var senha = document.getElementById("password")
    var confirm_senha = document.getElementById("confirm_password")


    if(senha.value == confirm_senha.value){
        localStorage.setItem('email', email.value);
        localStorage.setItem('senha', senha.value);
        alert("Usuario cadastrado com sucesso!");
                setTimeout(function() {
            window.location.href = "index-login.html"; 
        }, 2000);

    }else{
        alert("Senhas não conferem!");
    }

    
}