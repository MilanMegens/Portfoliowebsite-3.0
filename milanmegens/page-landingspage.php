<?php /* Template Name: Landingspage */ ?>

<?php get_header('landingspage'); ?>

<!--  / content container \ -->

<div class="herobox small centered">
    <div class="content">
		<?php
			if ( function_exists('yoast_breadcrumb') ) {
    			echo '<div class="breadcrumbs">';
					yoast_breadcrumb( '<p>','</p>' );
				echo '</div>';
			}
		?>
    	<h1><?php the_title(); ?></h1>
    </div>

        	<div class="image">
        	<img src="<?php echo get_the_post_thumbnail_url(get_the_id(), 'large'); ?>" alt="<?php the_title(); ?>">
    	</div>
	
</div>


<main id="contentCntr">
	

	
	<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
			the_post(); 
			
			the_content();

			} // end while
		} // end if
	?>


</main>
<?php get_footer('landingspage'); ?>