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





?>