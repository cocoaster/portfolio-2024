document.addEventListener('DOMContentLoaded', function() {
    let currentIndex = 0;
    const slides = document.querySelectorAll('.slider-item');
    const totalSlides = slides.length;

    // Masquer toutes les diapositives
    function hideAllSlides() {
        slides.forEach((slide) => {
            slide.style.display = 'none'; // Cache toutes les slides
            
            const image = slide.querySelector('img');
            if (image) {
                image.style.opacity = 0; // Réinitialise l'opacité
                image.style.transform = 'scale(1)'; // Réinitialise la taille
                image.style.animation = ''; // Supprime l'animation active
            }

            // Réinitialise l'animation de fondu pour les textes
            const fadeInTexts = slide.querySelectorAll('.fade-in-text');
            fadeInTexts.forEach((text) => {
                text.classList.remove('show'); // Réinitialise l'animation de fondu
                text.style.opacity = 0; // Réinitialise l'opacité
            });
        });
    }

    // Afficher la diapositive active
    function showSlide(index) {
        hideAllSlides(); // Masquer toutes les slides avant d'afficher la suivante
        slides[index].style.display = 'flex'; // Affiche la slide active

        // Ajouter l'animation de zoom et fondu à l'image de la slide
        const image = slides[index].querySelector('img');
        if (image) {
            setTimeout(() => {
                image.style.animation = 'zoomFadeIn 2s ease forwards'; // Appliquer l'animation
                image.style.opacity = 1; // Remet l'opacité à 1
            }, 200); // Petit délai de 200ms pour l'image
        }

        // Ajouter l'animation de fondu aux textes (titre, contenu, bouton)
        const fadeInTexts = slides[index].querySelectorAll('.fade-in-text');
        fadeInTexts.forEach((text, i) => {
            setTimeout(() => {
                text.classList.add('show'); // Appliquer l'animation de fondu
                text.style.opacity = 1; // Remet l'opacité à 1
            }, (i + 1) * 300); // Délai progressif pour chaque texte
        });
    }

    // Passer à la slide suivante
    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides; // Incrémentation et boucle
        showSlide(currentIndex);
    }

    // Passer à la slide précédente (facultatif)
    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides; // Décrémentation et boucle
        showSlide(currentIndex);
    }

    // Afficher la première slide au chargement
    showSlide(currentIndex);

    // Automatiser le défilement toutes les 8 secondes
    setInterval(nextSlide, 8000); // Change de slide toutes les 8 secondes

    // Si tu utilises des boutons de navigation
    const nextButton = document.querySelector('#nextSlide');
    const prevButton = document.querySelector('#prevSlide');

    if (nextButton) {
        nextButton.addEventListener('click', nextSlide);
    }

    if (prevButton) {
        prevButton.addEventListener('click', prevSlide);
    }
});
