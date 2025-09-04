<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Painel de Indicadores</title>
<link rel="stylesheet" href="paineladmmarca.css">
</head>
<body>
<div class="container">
<aside class="sidebar">
<div class="logo">
<img src="logo-Photoroom (1).png" alt="Logo">
</div>
<nav>
<ul>
<li class="active">INDICADORES</li>
<li>CATEGORIA</li>
<li>MARCA</li>
<li>PRODUTO</li>
<li>VIDEOS</li>
<li>BANNERS</li>
<li>FOTOS</li>
</ul>
</nav>
</aside>
 
    <main class="main-content">
<header>
<h1>Bem vindo, X</h1>
<p>Olá, aqui você pode gerenciar suas marcas.</p>
</header>


    <div>
                <form action="">
 
                    <label for="categoria"> Descrição </label>
                    <input type="text" name="descricao">
                    <button> Salvar </button>
                </form>
            </div>
 
      <section class="tables">
<div class="table">
<h3>MARCAS</h3>
<table>
<thead>
<tr>
<th>Marca</th>
<th>Ações</th>
<th>Ações</th>

</tr>
</thead>
<tbody>

<tr><td><a href="#">Seda</a></td><td><button>Excluir</button></td><td><button>Editar</button></td></tr>
<tr><td><a href="#">Salon line</a></td><td><button>Excluir</button></td><td><button>Editar</button></td></tr>
<tr><td><a href="#">Juba</a></td><td><button>Excluir</button></td><td><button>Editar</button></td></tr>
<tr><td><a href="#">Soul Power</a></td><td><button>Excluir</button></td><td><button>Editar</button></td></tr>
<tr><td><a href="#">Deva Curl</a></td><td><button>Excluir</button></td><td><button>Editar</button></td></tr>
<tr><td><a href="#">Yamasterol</a></td><td><button>Excluir</button></td><td><button>Editar</button></td></tr>
</tbody>
</table>
</div>
</section>
</main>
</div>

<script>
  document.querySelectorAll('button').forEach(button => {
    if(button.textContent === "Excluir"){
      button.addEventListener('click', function() {
        const row = this.closest('tr');
        row.remove();
      });
    }
  });

  document.querySelectorAll('button').forEach(button => {
    if(button.textContent === "Editar"){
      button.addEventListener('click', function() {
        const row = this.closest('tr');
        const cellMarca = row.querySelector('td a');
        const novoNome = prompt('Editar nome da marca:', cellMarca.textContent);
        if(novoNome){
          cellMarca.textContent = novoNome;
        }
      });
    }
  });
</script>

</body>
</html>
