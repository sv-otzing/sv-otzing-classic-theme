document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM geladen");

  const gallery = document.getElementById("newsGallery");
  const dotsContainer = document.getElementById("carouselDots");

  console.log("Galerie gefunden mit", cards.length, "Karten");

  cards.forEach((_, index) => {
    const dot = document.createElement("div");
    dot.classList.add("carousel-dot");
    if (index === 0) dot.classList.add("active");
    dotsContainer.appendChild(dot);
  });

  const dots = dotsContainer.querySelectorAll(".carousel-dot");

  gallery.addEventListener("scroll", () => {
    const scrollLeft = gallery.scrollLeft;
    const cardWidth = gallery.offsetWidth;
    const currentIndex = Math.round(scrollLeft / cardWidth);

    dots.forEach((dot, i) => {
      dot.classList.toggle("active", i === currentIndex);
    });
  });
});


document.addEventListener('DOMContentLoaded', function () {
  new Swiper('.swiper', {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      768: {
        slidesPerView: 1,
        spaceBetween: 30
      }
    }
  });
});
