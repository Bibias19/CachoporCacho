<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cacho por Cacho - Cacheados</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .navbar {
            background: #9ce9a5 !important;
        }
        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:hover {
            color: #fff !important;
        }
        .products-section h2,
        .produtos-titulo {
            color: #9ce9a5 !important;
        }
        .card-title {
            color: #9ce9a5 !important;
        }
        .btn {
            background: #9ce9a5 !important;
        }
        .btn:hover {
            background: #9ce9a5 !important;
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
</head>
<body>
    <nav class="navbar" style="background: #9ce9a5;">
      <a class="navbar-brand" href="#">
        <img src="../img/logo-Photoroom.png" alt="Logo Cacho por Cacho">
        <span>Cacho por Cacho</span>
      </a>
      <ul class="navbar-nav">
        <li><a class="nav-link" href="index.php">Home</a></li>
        <li><a class="nav-link" href="produtos.php">Produtos</a></li>
        <li><a class="nav-link" href="ondulados.php">Ondulados</a></li>
        <li><a class="nav-link active" href="cacheados.php" style="color: #fff;">Cacheados</a></li>
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
   
   <section class="products-section">
    <div class="container">
      <h2 class="produtos-titulo" style="color: #9ce9a5;">Cabelos Cacheados</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <img src="../img/volumecachos3.jpeg" class="card-img-top" alt="Cachos 3B">
            <div class="card-body">
              <h4 class="card-title" style="color: #9ce9a5;">Curvatura: 3B</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="../img/cachos6.jpeg" class="card-img-top" alt="Cachos 3A">
            <div class="card-body">
              <h4 class="card-title" style="color: #9ce9a5;">Curvatura: 3A</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="../img/cachos2.jpeg" class="card-img-top" alt="Cachos 3A">
            <div class="card-body">
              <h4 class="card-title" style="color: #9ce9a5;">Curvatura: 3A</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 
    <section class="products-section">
    <div class="container">
      <h2 class="produtos-titulo" style="color: #9ce9a5;">Finalizações para Cabelos Cacheados</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <iframe width="100%" height="300" src="https://www.youtube.com/embed/B9BA7ajAWBw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <iframe width="100%" height="300" src="https://www.youtube.com/embed/-ao-lyvEVTw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <iframe width="100%" height="300" src="https://www.youtube.com/embed/SRvnQWFtxVg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
 
 
<section class="products-section">
 
    <div class="container">
      <h2 class="produtos-titulo" style="color: #9ce9a5;">Penteados para Cabelos Cacheados</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <iframe width="100%" height="300" src="https://www.youtube.com/embed/B1AnGfbDtQU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <iframe width="100%" height="300" src="https://www.youtube.com/embed/vLWNInla68c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <iframe width="100%" height="300" src="https://www.youtube.com/embed/p8Spu4yJ-i8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
 
   
  </section>
 
    <footer class="footer" style="background: #9ce9a5;">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Sobre Nós</h3>
                <p>Cacho por Cacho é seu guia definitivo para cuidados com cabelos cacheados, ondulados e crespos.</p>
            </div>
            <div class="footer-section">
                <h3>Links Úteis</h3>
                <a href="ondulados.php">Ondulados</a>
                <a href="cacheados.php">Cacheados</a>
                <a href="#">Crespos</a>
                <a href="#">Em Transição</a>
            </div>
            <div class="footer-section">
                <h3>Contato</h3>
                <p>Email: contato@cachoporcacho.com</p>
                <p>Telefone: (11) 99999-9999</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Cacho por Cacho. Todos os direitos reservados.</p>
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
</body>
</html>