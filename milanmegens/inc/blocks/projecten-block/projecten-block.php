<?php
    $classes = ( ! empty( $block['className'] ) ) ? 
        sprintf( 'projecten-block %s', $block['className'] ) : 
        'projecten-block';

    $id = '' . $block['id'];
?>

<div id="<?php echo esc_attr( $id ) ?>" class="<?php echo esc_attr( $classes ); ?>">
    <?php $projecten_link = get_field('projecten_link'); ?>
    <?php if ($projecten_link): ?>
        <div class="projecten" onclick="window.location.href='<?php echo esc_url($projecten_link['url']); ?>'">
            <h1><?php echo get_field('projecten_titel'); ?></h1>
            <p><?php echo get_field('projecten_functie'); ?></p>
        </div>
    <?php endif; ?>
</div>