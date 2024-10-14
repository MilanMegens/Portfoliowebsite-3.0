<?php
    $classes = ( ! empty( $block['className'] ) ) ?
        sprintf( 'customkoptekst-block %s', $block['className'] ) :
        'customkoptekst-block';

    $id = '' . $block['id'];

?>

<div id="<?php echo esc_attr( $id ) ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="customkoptekst">
        <?php
            $tekst = get_field('customkoptekst_tekst');
            $pixels = get_field('customkoptekst_pixels');
            $vetgedrukt = get_field('customkoptekst_vetgedrukt');

            $is_vetgedrukt = ($vetgedrukt) ? 'font-weight: bold;' : '';

            if ($tekst && $pixels) : ?>
                <h1 style="font-size: <?php echo esc_attr($pixels); ?>px; <?php echo esc_attr($is_vetgedrukt); ?>">
                    <?php echo esc_html($tekst); ?>
                </h1>
        <?php endif; ?>
    </div>
</div>
