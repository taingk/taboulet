<?php

//Création zones de menus
add_action('init', 'theme_menus');

function theme_menus() {
	register_nav_menu('main_menu', 'Menu Principal');
	register_nav_menu('footer_menu', 'Menu du pied de page');
}

//Création des zones de widgets
add_action('widgets_init', 'theme_widgets_zones');

function theme_widgets_zones() {
	register_sidebar();
	register_sidebar(array(
		'id' => 'footer_widgets',
		'name' => 'Pied de page',
		'description' => 'Ces widgets vont dans le pied de page'
	));
}

//Creation d'un widget simple
add_action('widgets_init', 'custom_simple_widget');

function custom_simple_widget(){
    register_widget('CustomWidget');
}

class CustomWidget extends WP_Widget{
    function __construct(){
        parent::__construct(false, "Widget Custom Link");
        $option = array(
            'classname' => 'custom-link-widget',
            'description' => 'Mon widget perso'
        );
        $this->WP_widget('custom-link-widget', 'Widget Custom Link', $options);
    }
    //Affichage en Front
    function widget(){
        echo'<h3>Coucou je suis un widget</h3>';
    }

    //Affichage en Back
    function form($d)
  {
    $default = array(
      'name' => 'Google',
      'url' => 'http://google.com'
    );
    $d = wp_parse_args($d, $default);
    echo '
    <p>
    <label for="'.$this->get_field_id('name').'"> Texte du lien:</label>
    <input id="'.$this->get_field_id('name').'" name="'.$this->get_field_name(
      'name').'" value="'.$d['name'].'" type="text"/>
    </p>
    <p>
    <label for="'.$this->get_field_id('url').'"> URL du lien:</label>
    <input id="'.$this->get_field_id('url').'" name="'.$this->get_field_name(
      'url').'" value="'.$d['url'].'" type="text"/>
    </p>';
  }

  function update($new, $old)
  {
    return $new;
  }

}

add_shortcode('hello', 'hello_func');

function hello_func(){
    return '<h2>HELLO</h2>';
}


//add style.css
function wpdocs_theme_name_scripts(){
  wp_enqueue_style('style.css', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'wpdocs_theme_name_scripts');



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
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
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



?>
