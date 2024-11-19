<?php
if ( pll_current_language() == 'fr' ) {
    $page_id = get_page_by_path( 'Mon Atelier Digital' ); // ID de la page des articles en français
} elseif ( pll_current_language() == 'es' ) {
    $page_id = get_page_by_path( 'Mi Taller Digital' ); // ID de la page des articles en espagnol
} elseif ( pll_current_language() == 'en' ) {
    $page_id = get_page_by_path( 'My Digital Studio' ); // ID de la page des articles en anglais
}

if ( isset( $page_id ) ) {
    wp_redirect( get_permalink( $page_id ) );
    exit;
}
?>

