<?php 
// Exemple PHP pour le slider avec des projets
$args = array(
    'post_type' => 'slides',
    'posts_per_page' => -1,
    'lang' => pll_current_language(), // Affiche uniquement les slides dans la langue actuelle
);

$slides_query = new WP_Query( $args );

if ( $slides_query->have_posts() ) : ?>
    <div class="custom-slider">
        <?php while ( $slides_query->have_posts() ) : $slides_query->the_post(); ?>
            <div class="slider-item">
                <div class="slider-text">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_content(); ?></p>

                    <?php 
                    $project_link = get_post_meta( get_the_ID(), 'slide_link', true );
                    if ( $project_link ) : ?>
                        <a href="<?php echo esc_url( $project_link ); ?>" class="custom-button" target="_blank">
                            <?php 
                            // Affiche le texte du bouton en fonction de la langue active
                            if ( pll_current_language() == 'fr' ) {
                                echo 'Voir le projet';
                            } elseif ( pll_current_language() == 'en' ) {
                                echo 'View Project';
                            } elseif ( pll_current_language() == 'es' ) {
                                echo 'Ver el proyecto';
                            }
                            ?>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="slider-image">
                    <?php 
                    $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                    if ( $thumbnail_url ) : ?>
                        <img src="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php the_title_attribute(); ?>" class="zoom-fade-image">
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php wp_reset_postdata(); ?>
<?php else : ?>
    <p>
        <?php 
        // Texte "Aucun projet trouvé" traduit directement dans le code
        if ( pll_current_language() == 'fr' ) {
            echo 'Aucun projet trouvé.';
        } elseif ( pll_current_language() == 'en' ) {
            echo 'No projects found.';
        } elseif ( pll_current_language() == 'es' ) {
            echo 'No se encontraron proyectos.';
        }
        ?>
    </p>
<?php endif; ?>
