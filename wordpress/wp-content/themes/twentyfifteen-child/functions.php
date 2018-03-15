<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
add_action('init', 'wpm_custom_post_type');
add_action('add_meta_boxes','init_metabox');
add_action('save_post','save_metabox');
add_action('pre_get_posts', 'add_my_post_types_to_query');

function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Recettes', 'Post Type General Name'),
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
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		/*
		* Différentes options supplémentaires
		*/
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'recette'),
		'taxonomies'  		  => array( 'category' ),
	);

	register_post_type( 'recette', $args );
}

function init_metabox() {
	add_meta_box('id_description', 'Description de la recette (ce texte s\'affichera dans les aperçus de recette)', 'meta_description_function', 'recette', 'normal');
	add_meta_box('id_ingredients', 'Liste d\'ingrédients (à séparer par des virgules, à inscrire dans le même ordre que la liste de quantités)', 'meta_ingredients_function', 'recette', 'normal');
	add_meta_box('id_quantites', 'Liste de quantités (à séparer par des virgules, à inscrire dans le même ordre que la liste d\'ingrédients)', 'meta_quantites_function', 'recette', 'normal');
	add_meta_box('id_temps_total', 'Temps total de préparation', 'meta_temps_total_function', 'recette', 'normal');
}

function meta_ingredients_function($post) {
	$ingredient = get_post_meta($post->ID,'_ingredient_crea',true);

	echo '<textarea id="ingredient_meta" name="ingredient" style="width: 100%; resize: none;">'.$ingredient.'</textarea>';
}

function meta_quantites_function($post) {
	$quantite = get_post_meta($post->ID,'_quantite_crea',true);

	echo '<textarea id="quantite_meta" name="quantite" style="width: 100%; resize: none;">'.$quantite.'</textarea>';
}

function meta_description_function($post) {
	$description = get_post_meta($post->ID,'_description_crea',true);

	echo '<textarea id="description_meta" name="description" style="width: 100%; resize: none;">'.$description.'</textarea>';
}

function meta_temps_total_function($post) {
	$temps_total = get_post_meta($post->ID,'_temps_total_crea',true);

	echo '<textarea id="temps_total_meta" name="temps_total" style="width: 100%; resize: none;">'.$temps_total.'</textarea>';
}

function save_metabox($post_id) {
	if (isset($_POST['ingredient']) && isset($_POST['quantite']) && isset($_POST['description'])) {
		update_post_meta($post_id, '_ingredient_crea', esc_html($_POST['ingredient']));
		update_post_meta($post_id, '_quantite_crea', esc_html($_POST['quantite']));
		update_post_meta($post_id, '_description_crea', esc_html($_POST['description']));
		update_post_meta($post_id, '_temps_total_crea', esc_html($_POST['temps_total']));
	}
}

// Show posts of 'post', 'page' and 'movie' post types on home page
function add_my_post_types_to_query( $query ) {
	if ( is_home() && $query->is_main_query() )
	  	$query->set( 'post_type', 'recette' );
	return $query;
}
