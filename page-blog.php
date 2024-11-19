<?php
/* Template Name: Blog */
get_header();
?>

<div class="archive-content">
    <?php
    // Configuration de la requête pour afficher les articles dans la langue courante
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 10,
        'lang' => pll_current_language() // Filtrer par langue active
    );
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
            // Afficher chaque article
            ?>
            <div class="post-item">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php the_excerpt(); ?></p>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>' . __( 'Aucun article trouvé', 'textdomain' ) . '</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>
