<!DOCTYPE html>
<html>
	<head>
		<meta charset=<?php bloginfo('charset') ?>>
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<title>
			<?php bloginfo('name') ?>
		</title>

    <!-- <style class="style/css">
    .bg {
    background-image: url('https://groupe1.bistouline.fr/wp-content/uploads/sites/42/2018/02/cropped-food-background-food-concept-with-various-tasty-fresh-ingredients-for-cooking-italian-food-ingredients-view-from-above-with-copy-space_1220-1365.jpg');
    background-position: center;
    background-size: cover;
    height: 200px;
}
    </style> -->

		<?php wp_head(); ?>


	</head>
<body>
	<div class="bg">
		<div class="container">
			<nav class="navbar">
			    <div class="navbar-header">
			      <a href="#" class="title">Taboulet</a>
			    </div>
			    <div class="menu">
				    <ul>
				      <li><a href="#">Title 1</a></li>
				      <li><a href="#">Title 2</a></li>
				    </ul>			    				    	
			    </div>
			</nav>					
		</div>
	</div>
<h1><?php bloginfo('name'); ?></h1>
<h2><?php bloginfo('description'); ?></h2>

<?php 
//Affichage du menu
wp_nav_menu(array(
	'theme_location' => 'main_menu'
));
?>