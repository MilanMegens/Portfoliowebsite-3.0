<?php get_header(); ?>

<!--  / content container \ -->
<main id="contentCntr" class="">
	
	
	<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
			the_post(); 
			
			the_content();

			} // end while
		} // end if
	?>

	
</main>

<?php get_footer(); ?>