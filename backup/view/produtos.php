<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CACHO POR CACHO</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="produto.css">
    <link rel="stylesheet" href="main.css">
   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<nav class="navbar">
    <a class="navbar-brand" href="#">
      <img src="../img/logo-Photoroom.png" alt="Logo Cacho por Cacho">
      <span>Cacho por Cacho</span>
    </a>
    <ul class="navbar-nav">
      <li><a class="nav-link" href="index.php">Home</a></li>
      <li><a class="nav-link active" href="produtos.php">Produtos</a></li>
      <li><a class="nav-link" href="ondulados.php">Ondulados</a></li>
      <li><a class="nav-link" href="cacheados.php">Cacheados</a></li>
      <li><a class="nav-link" href="#">Crespos</a></li>
      <li><a class="nav-link" href="#">Em Transição</a></li>
    </ul>
    <div class="navbar-icons">
      <i class="fa fa-search"></i>
      <a href="login.php"><i class="fa fa-user"></i></a>
    </div>
  </nav>

   <div class="carousel-custom" id="carouselCustom">
    <div class="carousel-slide active">
      <img src="../img/banner7 (1).png" alt="Banner 1">
    </div>
    <div class="carousel-slide">
      <img src="../img/banner3.png" alt="Banner 2">
    </div>
    <div class="carousel-slide">
      <img src="../img/banner5 (3).png" alt="Banner 3">
    </div>
      <button class="carousel-arrow left" onclick="prevSlide()">&#10094;</button>
      <button class="carousel-arrow right" onclick="nextSlide()">&#10095;</button>
    </div>
   
  <section>
    <div class="produtos-container">
      <h2 class="produtos-titulo">SALON LINE</h2>
      <div class="produtos">
        <div class="produto-card">
          <img src="../img/cronograma.avif" alt="Kit para cachos">
          <div class="produto-info">
            <div class="produto-nome">Kit com 3 Cremes Para Pentear: Reconstrução, Nutrição e Brilho Salon Line</div>
            <a href="kitcreme.php" class="produto-link">vizualizar produto</a>
          </div>
        </div>

        <div class="produto-card">
          <img src="../img/creme salon line azul.avif" alt="Creme para pentear">
          <div class="produto-info">
            <div class="produto-nome">Creme Para Pentear Definição Natural 1kg</div>
            <a href="cremedefinicao.php" class="produto-link">vizualizar produto</a>
          </div>
        </div>

        <div class="produto-card">
          <img src="../img/creme de cheirinho.avif" alt="Kit cheirinho de açaí">
          <div class="produto-info">
            <div class="produto-nome">Kit Cheirinho de Açaí com Creme para Pentear e Gelatina</div>
            <a href="cremecheirinho.php" class="produto-link">vizualizar produto</a>
          </div>
        </div>
      </div>
    </div>

    <div class="produtos-container">
      <h2 class="produtos-titulo">SEDA</h2>
      <div class="produtos">
        <div class="produto-card">
          <img src="../img/seda verde.avif" alt="Cachos definidos">
          <div class="produto-info">
            <div class="produto-nome">Creme para Pentear Seda Cachos Definidos e Hidratados</div>
            <a href="sedaverde.php" class="produto-link">vizualizar produto</a>
          </div>
        </div>

        <div class="produto-card">
          <img src="../img/seda rosa.avif" alt="Cachos molhados">
          <div class="produto-info">
            <div class="produto-nome">Creme de Pentear Seda Luminous UV</div>
            <a href="sedarosa.php" class="produto-link">vizualizar produto</a>
          </div>
        </div>

        <div class="produto-card">
          <img src="../img/seda verde claro.avif" alt="Cachos naturais">
          <div class="produto-info">
            <div class="produto-nome">Creme para Pentear Seda Crescimento Saudável</div>
            <a href="sedaverdeclaro.php" class="produto-link">vizualizar produto</a>
          </div>
        </div>
      </div>
    </div>

    <div class="produtos-container">
      <h2 class="produtos-titulo">JUBA</h2>
      <div class="produtos">
        <div class="produto-card">
          <img src="../img/gelatina widi.jpg" alt="Cachos definidos">
          <div class="produto-info">
            <div class="produto-nome">Gelatina Widi Care Juba Fortalecedora Ativando a Juba 500g</div>
            <a href="jubalaranja.php" class="produto-link">vizualizar produto</a>
          </div>
        </div>

        <div class="produto-card">
          <img src="../img/kit widi.png" alt="Cachos molhados">
          <div class="produto-info">
            <div class="produto-nome">Kit Widi Care Juba - Encrespando + Finalizador Juba Blend</div>
            <a href="jubakit.php" class="produto-link">vizualizar produto</a>
          </div>
        </div>

        <div class="produto-card">
          <img src="../img/acidificante.png" alt="Cachos molhados">
          <div class="produto-info">
            <div class="produto-nome">Acidificante Acidificando A Juba 500ml</div>
            <a href="acidificante.php" class="produto-link">vizualizar produto</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="footer-content">
      <p>&copy; 2025 - Cacho por Cacho</p>
    </div>
  </footer>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      let currentSlide = 0;
      const slides = document.querySelectorAll('.carousel-custom .carousel-slide');
      const totalSlides = slides.length;
      let carouselInterval = null;

      function showSlide(index) {
        // Remove active class from all slides
        slides.forEach(slide => {
          slide.classList.remove('active');
        });
        
        // Add active class to current slide
        slides[index].classList.add('active');
        currentSlide = index;
      }

      function nextSlide() {
        let next = (currentSlide + 1) % totalSlides;
        showSlide(next);
      }

      function prevSlide() {
        let prev = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(prev);
      }

      // Set up click handlers for arrows
      document.querySelector('.carousel-arrow.left').addEventListener('click', function() {
        prevSlide();
        resetInterval();
      });

      document.querySelector('.carousel-arrow.right').addEventListener('click', function() {
        nextSlide();
        resetInterval();
      });

      function startAutoPlay() {
        carouselInterval = setInterval(nextSlide, 5000);
      }

      function resetInterval() {
        clearInterval(carouselInterval);
        startAutoPlay();
      }

      // Initialize
      showSlide(0);
      startAutoPlay();
    });
    </script>

     <style>
        .navbar {
            background: #9CD1E9!important;
        }
        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:hover {
            color: #fff !important;
        }
        .products-section h2,
        .produtos-titulo {
            color: #9CD1E9 !important;
        }
        .card-title {
            color: #9CD1E9 !important;
        }
        .btn {
            background:#9CD1E9 !important;
        }
        .btn:hover {
            background:#9CD1E9 !important;
        }
        .card-img-top {
            height: 400px !important; 
            object-fit: cover; 
            width: 100% !important;
        }
        
        .carousel-slide img {
            height: 500px !important; 
            object-fit: cover;
            width: 100% !important;
        }
        
        .card {
            margin-bottom: 30px;
        }
    </style>
</body>
</html>
