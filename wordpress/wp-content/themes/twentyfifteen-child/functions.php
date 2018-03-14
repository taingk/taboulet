<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

/*
* On utilise une fonction pour créer notre custom post type 'Séries TV'
*/

function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Recette', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Recette', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Recette'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Toutes les recettes'),
		'view_item'           => __( 'Voir les recettes'),
		'add_new_item'        => __( 'Ajouter une nouvelle recette'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer la recette'),
		'update_item'         => __( 'Modifier la recette'),
		'search_items'        => __( 'Rechercher une recette'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);

	// On peut définir ici d'autres options pour notre custom post type

	$args = array(
		'label'               => __( 'Recette'),
		'description'         => __( 'Toutes nos meilleures recettes'),
		'labels'              => $labels,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		/*
		* Différentes options supplémentaires
		*/
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'recette'),

	);

	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'recette', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );

add_action('add_meta_boxes','init_metabox');
function init_metabox(){
  add_meta_box('id_ma_meta', 'Les ingredients', 'ma_meta_function', 'recette', 'normal');
  add_meta_box('id_ma_meta2', 'Les ingredients', 'ma_meta_function', 'recette', 'normal');
}

function ma_meta_function($post){
  $ingredient = get_post_meta($post->ID,'_ingredient_crea',true);
	$quantite = get_post_meta($post->ID,'_quantite_crea',true);
  echo '<label for="ingredient_meta">Ingredient : </label>';
  echo '<input id="ingredient_meta" type="text" name="ingredient" value="'.$ingredient.'" />';
	echo '<label for="quantite_meta">Quantité : </label>';
	echo '<input id="quantite_meta" type="text" name="quantite" value="'.$quantite.'" />';
}

add_action('save_post','save_metabox');

function save_metabox($post_id){
if(isset($_POST['ingredient']))
  update_post_meta($post_id, '_ingredient_crea', esc_html($_POST['ingredient']));
	update_post_meta($post_id, '_quantite_crea', esc_html($_POST['quantite']));
}