<?php
//Include header.php
get_header();

//The loop
while (have_posts()){
	the_post();
	the_title();
	the_excerpt();
	the_content();
}
//Include footer.php
get_footer();

?>
