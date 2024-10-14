<?php
    $classes = ( ! empty( $block['className'] ) ) ?
        sprintf( 'overmij-block %s', $block['className'] ) :
        'overmij-block';

    $id = '' . $block['id'];

?>

<div id="<?php echo esc_attr( $id ) ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="overmij">
        <?php if(get_field('overmij_titel')){
            echo '<h1>' . get_field('overmij_titel') .'</h1>';
        }?>

        <?php if(get_field('overmij_tekst')){
            echo '<p>'. get_field('overmij_tekst') .'</p>';
        }?>

        <?php
            $file = get_field('overmij_cta');
            if( $file ): ?>
                <a href="<?php echo $file['url']; ?>" class="knop">Download CV-Milan.pdf</a>
            <?php endif; ?>
    </div>
</div>
