<!DOCTYPE html>
<html>
	<head>
		<?php wp_head(); ?>
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	</head>
	<body>
	<header>
		<div class="container">
			<nav>
				<div class="navbarBrand">
					<span><a href="">Taboulet</a></span>
				</div>
				<div class="navbarMenu">
					<ul>
						<li><a href="">Lien 1</a></li>
						<li><a href="">Lien 2</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</header>

	<h1><?php bloginfo('name'); ?></h1>
	<h2><?php bloginfo('description'); ?></h2>

<?php 
//Affichage du menu
wp_nav_menu(array(
	'theme_location' => 'main_menu'
));
?>