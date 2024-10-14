<?php
    $classes = ( ! empty( $block['className'] ) ) ? 
        sprintf( 'vaardigheden-block %s', $block['className'] ) : 
        'vaardigheden-block';

    $id = '' . $block['id'];
?>

<div id="<?php echo esc_attr( $id ) ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="vaardigheden">
        <?php if( have_rows('vaardigheden_vaardigheden') ): ?>
            <div class="grid-container">
                <?php while( have_rows('vaardigheden_vaardigheden') ): the_row(); 
                    $titel = get_sub_field('vaardigheden_titel');
                    $afbeelding = get_sub_field('vaardigheden_afbeelding');
                ?>
                    <div class="grid-item">
                        <?php if( $afbeelding ): ?>
                            <img src="<?php echo esc_url($afbeelding['url']); ?>" alt="<?php echo esc_attr($afbeelding['alt']); ?>" class="vaardigheden-afbeelding">
                        <?php endif; ?>
                        <?php if( $titel ): ?>
                            <h3><?php echo esc_html($titel); ?></h3>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>