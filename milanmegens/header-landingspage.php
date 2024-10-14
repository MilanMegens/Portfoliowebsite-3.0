<!DOCTYPE html>
<html>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MGT9BN2');</script>
<!-- End Google Tag Manager -->
	<?php echo get_field('header_scripts', 'options'); ?>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MGT9BN2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php echo get_field('header_scripts_body', 'options'); ?>
	<div id="wrapper">
		<div id="mainCntr">
			<header id="headerCntr" class="centered">
				<?php
					if(function_exists('the_custom_logo')){
						$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	echo '<img src="'.$image[0].'" alt="NetRom Software"/>';
					}
				?>
				
				<?php
					$nav = get_field('navigation_links', 'option');
					
					if($nav){
						echo '<nav class="menuBox">';
							/*echo '<ul class="nav_columns">';
								foreach($nav as $nav_item){
									echo '<li class="nav_column">';
										if($nav_item['submenu'] === false && is_array($nav_item['link'])){

											echo '<a href="'.$nav_item['link']['url'].'">'.$nav_item['link']['title'].'</a>';
										}elseif($nav_item['submenu']){

											$submenu_width = 80 + (292 * count($nav_item['submenu_columns']));
											echo '<a class="submenu_title" href="#">'.$nav_item['submenu_title'].'</a>';
											echo '<ul class="submenu_columns" style="width:'.$submenu_width.'px;">';
												$show_title = true;
												foreach($nav_item['submenu_columns'] as $nav_item_col){
														$column_width = number_format(100 / count($nav_item['submenu_columns']), 2);
													echo '<li style="width: '.$column_width.'%">';
													if($nav_item_col['promotion'] === false){
														echo '<ul>';
															foreach($nav_item_col['submenu_links'] as $sub_nav_link){
																if($show_title){
																
																	echo '<li class="submenu_title"><strong>';
																		if($nav_item['submenu_title_url']){
																			echo '<a href="'.$nav_item['submenu_title_url'].'">';
																		}
																		echo $nav_item['submenu_title'];
																		if($nav_item['submenu_title_url']){
																			echo '</a>';
																		}
																	echo '</strong></li>';
																	$show_title = false;																
																}
																echo '<li>';
																	echo '<a href="'.$sub_nav_link['submenu_links']['url'].'">'.$sub_nav_link['submenu_links']['title'].'</a>';
																echo '</li>';
															}
														echo '</ul>';
													}else{
														echo '<a href="'.$nav_item_col['promotion_link']['url'].'" class="card-service">';
															echo '<div class="image">';
																echo '<img src="'.wp_get_attachment_image_url( $nav_item_col['promotion_image'], 'medium' ).'" alt="">';
																echo '<div class="text">'.$nav_item_col['promotion_link']['title'].'<i class="ph ph-arrow-right"></i></div>';
															echo '</div>';
														echo '</a>';
													}
												echo '</li>';												
											}
											echo '</ul>';
										}
									echo '</li>';
								}
							echo '</ul>';*/
						echo '</nav>';
					}
				?>
				

				<ul class="menu-btn">
				<?php 
					$blog     = msls_blog_collection()->get_current_blog();
					$language = $blog->get_language(); // en_US
					$alpha2   = $blog->get_alpha2(); // en
				?>
					<li><a class="lang" href="javascript:void(0)"><?php echo $alpha2; ?></a>
					<ul>
					<li><strong>
					
					<?php if($alpha2 == 'nl'){
						echo 'Talen';
						}else{
							echo 'Languages';
						}
					?>
					
					</strong></li>
					<?php echo do_shortcode('[sc_msls]'); ?>
					</ul>
					</li>
					<!--<li><a class="search js-search-field" href="#"><i class="ph ph-magnifying-glass"></i></a></li>-->
					<?php
						if(get_field('call_to_action', 'options') && 1 > 2){
							$link = get_field('call_to_action', 'options');
							$link_target = $link['target'] ? $link['target'] : '_self';

							echo '<li>';
								echo '<a class="button" href="'.$link['url'].'" target="'.$link_target.'">'.$link['title'].'</a>';
							echo '</li>';
						}
					?>
				</ul>

				<!--<a class="mobileMenu js-toggle-mobile" href="#"><span>Menu</span></a> -->
			</header>
			<!--  \ header container / -->

			
			<!--  / content container \ -->
			<main id="contentCntr">

			<div class="searchBox">
			    <div class="form-field">
			        <form id="searchForm" action="<?php echo get_site_url(); ?>" method="GET">
			            <input type="search" name="s" placeholder="Zoeken...">
			            <button type="submit"><i class="ph ph-magnifying-glass"></i></button>
			            <a href="#" class="close js-close-search"><i class="icon-xmark"></i></a>
			        </form>
			    </div>
			</div>