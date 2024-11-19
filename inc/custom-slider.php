<?php
// Fonction pour enregistrer le Custom Post Type (CPT) "Slides"
function custom_post_type_slides() {

    // Les libellés (labels) pour les différentes parties de l'interface d'administration de WordPress
    $labels = array(
        'name'               => 'Slides', // Le nom pluriel du CPT (affiché dans le menu d'administration)
        'singular_name'      => 'Slide', // Le nom singulier pour un seul élément
        'menu_name'          => 'Slides', // Le nom affiché dans le menu de l'admin WordPress
        'name_admin_bar'     => 'Slide', // Le nom affiché dans la barre d'outils d'administration
        'add_new'            => 'Ajouter un nouveau', // Texte du bouton "Ajouter" dans l'administration
        'add_new_item'       => 'Ajouter un nouveau Slide', // Texte affiché lors de l'ajout d'un nouveau slide
        'new_item'           => 'Nouveau Slide', // Texte pour un nouvel élément
        'edit_item'          => 'Modifier le Slide', // Texte pour éditer un slide existant
        'view_item'          => 'Voir le Slide', // Texte pour afficher un slide
        'all_items'          => 'Tous les Slides', // Texte pour afficher tous les éléments dans l'administration
        'search_items'       => 'Rechercher un Slide', // Texte pour la barre de recherche dans l'administration
        'not_found'          => 'Aucun Slide trouvé', // Texte affiché lorsque aucun slide n'est trouvé
        'not_found_in_trash' => 'Aucun Slide trouvé dans la corbeille' // Texte affiché lorsque la corbeille est vide
    );

    // Les arguments (settings) qui définissent le comportement du CPT
    $args = array(
        'labels'             => $labels, // Utilise les labels définis ci-dessus
        'public'             => true, // Rendre le CPT public (visible sur le front-end)
        'publicly_queryable' => true, // Permettre que ce CPT soit inclus dans les requêtes front-end (comme dans un blog ou un slider)
        'show_ui'            => true, // Afficher l'interface d'administration pour ce CPT
        'show_in_menu'       => true, // Afficher dans le menu d'administration WordPress
        'query_var'          => true, // Permettre l'utilisation de query vars pour ce CPT (ex. : ?post_type=slides)
        'rewrite'            => array( 'slug' => 'slides' ), // Définir l'URL slug pour les slides (ex. : /slides/nom-du-slide)
        'capability_type'    => 'post', // Définit les capacités du CPT (similaire aux articles classiques)
        'has_archive'        => true, // Permettre un archive pour ce CPT (ex. : /slides/)
        'hierarchical'       => false, // Ne pas permettre de structure hiérarchique comme pour les pages (pas de parent/child)
        'menu_position'      => null, // Position du menu dans l'admin (null signifie qu'il sera à l'emplacement par défaut)
        'supports'           => array( 'title', 'editor', 'thumbnail' ), // Définir les fonctionnalités supportées (titre, éditeur de texte, image mise en avant)
        'menu_icon'          => 'dashicons-images-alt2' // Icône affichée dans le menu d'administration pour ce CPT (ici une icône d'image)
    );

    // Enregistrer le Custom Post Type en utilisant la fonction 'register_post_type'
    register_post_type( 'slides', $args );
}

// Ajouter l'action pour exécuter la fonction lors de l'initialisation de WordPress (hook 'init')
add_action( 'init', 'custom_post_type_slides' );
?>
