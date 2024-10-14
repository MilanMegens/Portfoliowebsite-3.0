<?php get_header(); ?>

<main id="contentCases" class="centered">
    <div class="grid-container">
        <?php
        $args = array(
            'post_type'      => 'case-study',
            'posts_per_page' => 9,
            'paged'           => get_query_var('paged', 1),
        );
        $query = new WP_Query( $args );

        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); 
                $image = get_field('case_studies_screenshot');
                ?>
                <div class="grid-item">
                    <?php if( $image ): ?>
                        <div class="case-study-image">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <h2>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <h3>
                        <a href="<?php the_permalink(); ?>">
                            <?php echo get_field('case_studies_wat_heb_je_gedaan'); ?>
                        </a>
                    </h3>
                    <div class="content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endwhile;
            // Paginering
            ?>
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'total' => $query->max_num_pages,
                    'prev_text' => '<',
                    'next_text' => '>',
                ));
                ?>
            </div>
            <?php
            wp_reset_postdata();
        else :
            echo '<p>No posts found</p>';
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>

<!-- Voeg CSS toe in het PHP-bestand -->
<style>
.grid-container { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.grid-item { transition: transform 0.5s ease; margin-bottom: 20px; }
.grid-item:hover { transform: translateY(-20px); }
.grid-item h2 a { color: #000; font-size: 40px; text-decoration: none; width: 100%; padding-bottom: 20px; border-bottom: 2px solid #000; }
.grid-item h3 a {  color: #000;  font-size: 25px;  text-decoration: none;  }
.case-study-image { margin-bottom: 15px; position: relative; height: 70%; overflow: hidden;}
.case-study-image a { display: block; height: 100%; width: 100%; }
.case-study-image img { width: 100%; height: 100%; object-fit: cover; object-position: center; }
.pagination { text-align: center; margin: 20px 0; grid-column: span 3; }
.pagination a { padding: 3px 15px; margin: 0 5px; border: 1px solid #000; border-radius: 5px; text-decoration: none; background-color: #fff; color: #000;transition: background-color 0.3s ease; }
.pagination a:hover {  background-color: transparent;  }
.pagination .current { background-color: #000; color: #fff; padding: 3px 15px; border-radius: 5px; }

@media only screen and (max-width: 768px) {
    .grid-container { grid-template-columns: repeat(1, 1fr); gap: 15px; }
    .pagination { grid-column: span 1; }
    .grid-item { margin-bottom: 20px; }
}

@media only screen and (max-width: 426px) {
    .grid-container { grid-template-columns: repeat(1, 1fr); gap: 25px; }
    .pagination { grid-column: span 1; }
    .grid-item { margin-bottom: 25px; }
    .grid-item h2 a { font-size: 30px; }
    .grid-item h3 a { font-size: 15px; }
}

</style>