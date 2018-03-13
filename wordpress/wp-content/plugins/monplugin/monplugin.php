<?php
/*
Plugin Name: Mon Plugin
Plugin URI: http://monplugin.org
Description: Mon premier plugin wordpress
Author: Moi
Author URI: http://moi.com
Version: 0.1
License: CC
*/

add_action('wp_footer', 'Add_Text');


function Add_Text()
{
  echo "<p>Quand le pied de page est chargé, cette phrase de mon plugin va s'afficher !</p>";
}

class Mon_Plugin
{

  public function __construct()
  {
    include_once plugin_dir_path(__FILE__).'newsletter.php';
    register_activation_hook(__FILE__, array('Mon Plugin', 'install'));
  }

  public static function install()
  {
    global $wpdb;
    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ma_newsletter_list (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL);");
  }
}

new Mon_Plugin();
 ?>
