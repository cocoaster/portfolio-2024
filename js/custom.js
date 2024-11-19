document.addEventListener('DOMContentLoaded', function () {
    // Sélectionner tous les éléments enfants du body sauf le header
    const elements = document.querySelectorAll('body > *:not(header)');

    // Fonction pour appliquer l'animation fade-in-up
    function fadeInOnScroll() {
        elements.forEach((element) => {
            const elementPosition = element.getBoundingClientRect();
            // Appliquer l'animation si l'élément est dans la fenêtre de vue
            if (elementPosition.top < window.innerHeight && elementPosition.bottom >= 0) {
                element.classList.add('show');
            }
        });
    }

    // Initialiser l'animation pour tous les éléments au chargement de la page
    elements.forEach((element) => {
        element.classList.add('fade-in-up');
    });

    // Appeler fadeInOnScroll immédiatement pour les éléments visibles dès le chargement
    fadeInOnScroll();

    // Appliquer l'animation au scroll
    window.addEventListener('scroll', fadeInOnScroll);
});
