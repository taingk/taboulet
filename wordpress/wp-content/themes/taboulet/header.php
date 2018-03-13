<!DOCTYPE html>
<html>
	<head>
		<meta charset=<?php bloginfo('charset') ?>>
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<title>
			<?php bloginfo('name') ?>
		</title>
		<?php wp_head(); ?>

		<style type="text/css">

			body {
				margin: 0;
				padding: 0;
				box-sizing: border-box;

			}
			
			nav {
				height: 200px;
				background-image: url('https://s3.amazonaws.com/tce-live2/media/cache/media/76374c18-1a40-49ff-938a-c8dab85dacec_thumbnail_600_600.jpg');
				background-position: center;
				background-size: cover;
			}

			.container a {
				text-decoration: none;
				color: white;
				font-family: 'Pacifico', cursive;
			}

			.container {	
			    width: 75%;
			    margin: 0 auto;
			}

			.container a span {
				font-size: x-large;
			}


		</style>
	</head>
<body>
	<nav>
		<div class="container">
			<div class="logo">
				<a href="<?php bloginfo('url') ?>">
					<span><?php bloginfo('name') ?></span>
				</a>				
			</div>
			<div class="menu">
				<ul>
					<li>sss</li>
				</ul>				
			</div>
		</div>
	</nav>

<h1><?php bloginfo('name'); ?></h1>
<h2><?php bloginfo('description'); ?></h2>

<?php 
//Affichage du menu
wp_nav_menu(array(
	'theme_location' => 'main_menu'
));
?>