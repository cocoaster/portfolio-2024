<?php 
get_header();
?>

<div class="section-intro">
    <?php if ( pll_current_language() == 'fr' ) : ?>
        <h1>Projets de Développement Web</h1>
        <p>Découvrez certains des projets web sur lesquels j'ai travaillé, incluant des sites vitrine, et des solutions sur mesure. <br />Cliquez sur chaque projet pour voir plus de détails.</p>
    <?php elseif ( pll_current_language() == 'en' ) : ?>
        <h1>Web Development Projects</h1>
        <p>Discover some of the web projects I’ve worked on, including showcase sites and custom solutions. <br />Click on each project to see more details.</p>
    <?php elseif ( pll_current_language() == 'es' ) : ?>
        <h1>Proyectos de Desarrollo Web</h1>
        <p>Descubre algunos de los proyectos web en los que he trabajado, incluyendo sitios de presentación y soluciones personalizadas. <br />Haz clic en cada proyecto para ver más detalles.</p>
    <?php endif; ?>
</div>

<div class="slider-container">
    <?php get_template_part( 'template-parts/content', 'slides' ); ?>
</div>

<?php
get_footer();
?>

