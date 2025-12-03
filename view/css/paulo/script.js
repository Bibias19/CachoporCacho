document.addEventListener('DOMContentLoaded', function() {
    // Navbar toggle for mobile
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarMenu = document.querySelector('.navbar-menu');
    
    navbarToggler.addEventListener('click', function() {
      navbarMenu.classList.toggle('active');
    });
  
    // Carousel functionality
    const carousel = document.querySelector('.carousel');
    const carouselItems = document.querySelectorAll('.carousel-item');
    const prevBtn = document.querySelector('.carousel-control.prev');
    const nextBtn = document.querySelector('.carousel-control.next');
    const dotsContainer = document.querySelector('.carousel-dots');
    
    let currentIndex = 0;
    const totalItems = carouselItems.length;
    
    // Create dots
    carouselItems.forEach((_, index) => {
      const dot = document.createElement('div');
      dot.classList.add('carousel-dot');
      if (index === 0) dot.classList.add('active');
      dot.addEventListener('click', () => goToSlide(index));
      dotsContainer.appendChild(dot);
    });
    
    // Update carousel position
    function updateCarousel() {
      carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
      
      // Update dots
      document.querySelectorAll('.carousel-dot').forEach((dot, index) => {
        dot.classList.toggle('active', index === currentIndex);
      });
    }
    
    // Go to specific slide
    function goToSlide(index) {
      currentIndex = index;
      updateCarousel();
    }
    
    // Next slide
    function nextSlide() {
      currentIndex = (currentIndex + 1) % totalItems;
      updateCarousel();
    }
    
    // Previous slide
    function prevSlide() {
      currentIndex = (currentIndex - 1 + totalItems) % totalItems;
      updateCarousel();
    }
    
    // Event listeners
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
    
    // Auto slide (optional)
    let autoSlide = setInterval(nextSlide, 5000);
    
    // Pause on hover
    carousel.addEventListener('mouseenter', () => clearInterval(autoSlide));
    carousel.addEventListener('mouseleave', () => {
      autoSlide = setInterval(nextSlide, 5000);
    });
  
    // Product slider navigation
    const productSlider = document.querySelector('.products-slider');
    const productPrevBtn = document.querySelector('.prev-btn');
    const productNextBtn = document.querySelector('.next-btn');
    
    productPrevBtn.addEventListener('click', () => {
      productSlider.scrollBy({ left: -300, behavior: 'smooth' });
    });
    
    productNextBtn.addEventListener('click', () => {
      productSlider.scrollBy({ left: 300, behavior: 'smooth' });
    });
  });