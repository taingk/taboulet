<?php

//Creation zones de menus
add_action('init', 'theme_menus');

function theme_menus() {
    register_nav_menu('main_menu', 'Menu Principal');
    register_nav_menu('footer_menu', 'Menu du pied de page');
}

// Création des sones de widgets
add_action('widgets_init', 'theme_widgets_zones');

function theme_widgets_zones() {
    register_sidebar();
    register_sidebar(array(
        'id' => 'footer_widgets',
        'name' => 'Pied de page',
        
    ));
}