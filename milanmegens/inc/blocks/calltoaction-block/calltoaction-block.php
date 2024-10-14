<?php
    $classes = ( ! empty( $block['className'] ) ) ?
        sprintf( 'calltoaction-block %s', $block['className'] ) :
        'calltoaction-block';

    $id = '' . $block['id'];

?>

<div id="<?php echo esc_attr( $id ) ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="calltoaction"><?php
        if(get_field('custom_call_to_action')){
			$header_cta = get_field('custom_call_to_action');
			echo '<a class="button" href="'.$header_cta['url'].'">'.$header_cta['title'].'</a>';
		}?>
    </div>
</div>