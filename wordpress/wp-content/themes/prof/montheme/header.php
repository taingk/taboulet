<!DOCTYPE html>
<html>
	<head>
		<?php wp_head(); ?>
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	</head>
	<body>
	<header>
		<div class="header" style="height: 100%; background-color: #0000004a;">
			<div class="container" style="height: 100%">
				<nav style="height:45px">
					<div class="navbarBrand">
						<span><a href=""><?php bloginfo('name'); ?></a></span>
					</div>
					<div class="navbarMenu">
						<ul>
							<li><a href=""><?php wp_nav_menu(array('theme_location' => 'main_menu')); ?></a></li>
						</ul>
					</div>
				</nav>
				<div class="description" style="height: calc(100% - 45px); position:relative;">
					<div class="span" style="position:absolute; top:50%; left:50%; transform: translateX(-50%) translateY(-50%);">
						<h1><?php bloginfo('description'); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</header>

	<h1></h1>
	<h2></h2>

