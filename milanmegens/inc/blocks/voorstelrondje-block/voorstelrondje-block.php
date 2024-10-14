<?php
    $classes = ( ! empty( $block['className'] ) ) ?
        sprintf( 'voorstelrondje-block %s', $block['className'] ) :
        'voorstelrondje-block';

    $id = '' . $block['id'];

?>

<div id="<?php echo esc_attr( $id ) ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="voorstelrondje">
        <?php if(get_field('voorstelrondje_beroep')){
                echo '<h2>' . '- ' . get_field('voorstelrondje_beroep') .'</h2>';
        }?>

        <?php if(get_field('voorstelrondje_functie')){
                echo '<h1>'. get_field('voorstelrondje_functie') .'</h1>';
        }?>

        <?php if(get_field('voorstelrondje_beschrijving')){
                echo '<p>'. get_field('voorstelrondje_beschrijving') .'</p>';
        }?>

        <div class="socials">
            <h3>Socials</h3>
            <div class="icons"><?php
                if( get_field('voorstelrondje_linkedin') ):?>
                    <a href="<?php echo get_field('voorstelrondje_linkedin'); ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.png" alt="Linkedin Logo">
                    </a>
                <?php endif;

                if( get_field('voorstelrondje_github') ):?>
                    <a href="<?php echo get_field('voorstelrondje_github'); ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/github.png" alt="GitHub Logo">
                    </a>
                <?php endif;

                if( get_field('voorstelrondje_instagram') ):?>
                    <a href="<?php echo get_field('voorstelrondje_instagram'); ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="Instagram Logo">
                    </a>
                <?php endif;

                if( get_field('voorstelrondje_email') ):?>
                    <a href="mailto:<?php echo esc_attr( get_field('voorstelrondje_email') ); ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.png" alt="Email Logo">
                    </a>
                <?php endif; ?>
            </div><!-- Einde icons div -->
        </div><!-- Einde socials div -->
    </div><!-- Einde voorstelrondje div -->
</div>
