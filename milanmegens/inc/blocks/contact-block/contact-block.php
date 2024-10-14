<?php
    $classes = ( ! empty( $block['className'] ) ) ? 
        sprintf( 'contact-block %s', $block['className'] ) : 
        'contact-block';

    $id = '' . $block['id'];
?>

<div id="<?php echo esc_attr( $id ) ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="contact">

        <!-- Mail blok -->
        <div class="box">
            <div class="tekst">
                <p>Je kan me hier op mailen</p>
                <?php 
                $contact_email = get_field('contact_email'); 

                if( !empty($contact_email) ) {
                    echo '<a href="mailto:' . esc_attr($contact_email) . '">' . esc_html($contact_email) . '</a>';
                }
                ?>
            </div><!-- Einde tekst div -->
            
            <div class="pijl">
                <?php echo '<a href="mailto:' . esc_attr($contact_email) . '" target="_blank"><i class="ph-light ph-caret-circle-right"></i></a>'; ?>
            </div><!-- Einde pijl div -->
        </div><!-- Einde box div -->

        <!-- Linkedin blok -->
        <div class="box">
            <div class="tekst">
                <p>Stuur me een berichtje op linkedin</p>
                <?php 
                $contact_linkedin = get_field('contact_linkedin'); 

                if( !empty($contact_linkedin) ) {
                    echo '<a href="' . esc_attr($contact_linkedin) . '">' . 'milanmegens2007' . '</a>';
                }
                ?>
            </div><!-- Einde tekst div -->
            
            <div class="pijl">
                <?php echo '<a href="' . esc_attr($contact_linkedin) . '" target="_blank"><i class="ph-light ph-caret-circle-right"></i></a>'; ?>
            </div><!-- Einde pijl div -->
        </div><!-- Einde box div -->

        <!-- Instagram blok -->
        <div class="box">
            <div class="tekst">
                <p>Volg me op instagram</p>
                <?php 
                $contact_instagram = get_field('contact_instagram'); 

                if( !empty($contact_instagram) ) {
                    echo '<a href="' . esc_attr($contact_instagram) . '">' . 'milanmegens' . '</a>';
                }
                ?>
            </div><!-- Einde tekst div -->
            
            <div class="pijl">
                <?php echo '<a href="' . esc_attr($contact_instagram) . '" target="_blank"><i class="ph-light ph-caret-circle-right"></i></a>'; ?>
            </div><!-- Einde pijl div -->
        </div><!-- Einde box div -->

        <!-- contactformulier blok -->
        <div class="box">
            <div class="tekst">
                <p>Of open het</p>
                <?php 
                $contact_instagram = get_field('contact_instagram'); 

                if( !empty($contact_instagram) ) {
                    echo '<a href="#" class="open-ninja-form">' . 'Contact formulier' . '</a>';
                }
                ?>
            </div><!-- Einde tekst div -->
            
            <div class="pijl">
                <?php echo '<a href="#" class="open-ninja-form" target="_blank"><i class="ph-light ph-caret-circle-right"></i></a>'; ?>
            </div><!-- Einde pijl div -->
        </div><!-- Einde box div -->


        <div id="ninja-form-popup" style="display:none;">
            <span id="close-popup" style="cursor:pointer; position:absolute; top:10px; right:10px; font-size:20px; font-weight:bold;">&times;</span>
            <?php echo do_shortcode( '[ninja_form id=1]' ); ?>
        </div>


    </div><!-- Einde contact div -->
</div>