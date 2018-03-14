<?php 
	//Affichage de la zone de widget du pied de page
	dynamic_sidebar('footer_widgets');
	//Affichage du menu
	wp_footer();
?>
<footer>
	<div style="text-align:center; padding: 20px; color:white; font-family: 'Open Sans', sans-serif">
		<h2>Pied de page</h2>
		<?php wp_nav_menu(array('theme_location' => 'footer_menu'));?>
	</div>
</footer>
</body>
</html>