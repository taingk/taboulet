<?php

get_header();

 while (have_posts()){
   the_post();
   the_title();
   the_excerpt();
   the_content();
 }

//Affichage 
dynamic_sidebar();

get_footer();

?>