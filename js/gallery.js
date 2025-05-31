  document.addEventListener("DOMContentLoaded", function () {
    console.log("🚀 DOM geladen");

    const gallery = document.getElementById("newsGallery");
    const dotsContainer = document.getElementById("carouselDots");

    // Logging zur Fehlersuche
    if (!gallery) {
      console.error("❌ #newsGallery nicht gefunden");
      return;
    }
    if (!dotsContainer) {
      console.error("❌ #carouselDots nicht gefunden");
      return;
    }

    const cards = gallery.querySelectorAll(".news-card");
    if (cards.length === 0) {
      console.error("❌ Keine .news-card Elemente gefunden");
      return;
    }

    console.log("✅ Galerie gefunden mit", cards.length, "Karten");

    // Dots erzeugen
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
