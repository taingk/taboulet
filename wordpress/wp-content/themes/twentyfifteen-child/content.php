<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	<?php
	
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$backgroundClass = " background: url('$url'); background-repeat: no-repeat; background-size: cover; background-position: center center;";
	strlen($url) !== 0 ? $color = "color: white; text-shadow: 1px 1px 12px #555;" : $color = "color: black;";

	if (is_home()) : ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="max-width: calc(4/12*100%); flex: 0 0 calc(4/12*100%); height: 350px; margin: 0 7%; <?php if (strlen($url) !== 0) echo $backgroundClass ?>">
	<?php else : ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="flex: 1; max-width: calc(10/12*100%); flex: 0 0 calc(10/12*100%);">
		<?php if (has_post_thumbnail()) : ?>
			<header class="entry-header row align-center">
		<?php else : ?>
			<header class="entry-header row align-center padding-top">
		<?php endif;
	endif;

	if ( is_single() ) :
		echo '<div class="col-xxs-4">';
			twentyfifteen_post_thumbnail();
		echo '</div>';

		if (has_post_thumbnail()) :
			the_title( '<h1 class="entry-title text-left col-xxs-8">', '</h1>' );
		else:
			the_title( '<h1 class="entry-title text-center col-xxs-12">', '</h1>' );
		endif;
	else :
		the_title( sprintf( '<h2 class="entry-title text-center col-xxs-12"><a href="%s" rel="bookmark" style="' . $color . '">', esc_url( get_permalink() ) ), '</a></h2>' );
	endif;
	
	?>
	</header><!-- .entry-header -->

	<?php echo '<hr style="width: 80%">'; ?>

	<div class="entry-content row">

		<?php
				
			if ( is_single() ) :

				if ( get_post_meta( get_the_ID(), '_ingredient_crea', true ) !== "" ) :

					$sIngredient = get_post_meta( get_the_ID(), '_ingredient_crea', true );
					$aIngredients = explode(',', $sIngredient);
					$sQuantite = get_post_meta( get_the_ID(), '_quantite_crea', true );
					$aQuantites = explode(',', $sQuantite);
					$aListes = [];
	
					for ($i = 0; $i < count($aIngredients); $i++) :
						$aListes[$aIngredients[$i]] = $aQuantites[$i];
					endfor;
	
					echo '<aside class="col-xxs-12 col-lg-4">';
					echo '<p><strong>Ingrédients :</strong></p>';
	
					foreach ($aListes as $sIngredient => $sValue) :
						echo sprintf('<p>%s de %s</p>',
						$sValue,
						$sIngredient);
					endforeach;
		
					echo '</aside>';
	
				endif;

			echo '<article class="col-xxs-12 col-lg-8">';
			echo '<p><strong>Temps total de préparation	 : ' . get_post_meta( get_the_ID(), '_temps_total_crea', true ) . '</strong></p>';
			echo '<p><strong>Préparation :</strong></p>';

			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			echo '</article>';	

			else: 

				echo sprintf('<i class="margin-auto desc" style="' . $color . '">%s</i>',
				get_post_meta( get_the_ID(), '_description_crea', true ));

			endif;

		?>

	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
