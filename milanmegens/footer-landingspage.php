<!--  / footer container \ -->
<footer id="footerCntr">
    <?php
        $footerContent = false;
    ?>
    <div class="footerBox centered">
        <div class="holder">
            <div class="column">
                    <?php
                        
					if(function_exists('the_custom_logo')){
						$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	echo '<img src="'.$image[0].'" alt="NetRom Software"/>';
					}
				
                    ?>
            </div>
            <?php
                if ($footerContent) {
                    foreach ($footerContent['footer_containers'] as $footerContainer) {
                        $footerContainerNaam = $footerContainer['container_naam'];
                        echo '<div class="column">';
                            echo '<div class="content">';
                                echo '<div class="title">'.$footerContainerNaam.'</div>';
                                echo '<ul>';
                                    foreach ($footerContainer['container_inhoud'] as $containerInhoud) {
                                        $containerInhoudUrl = $containerInhoud['inhoud_link']['url'];
                                        $containerInhoudTitle = $containerInhoud['inhoud_link']['title'];
                                        $containerInhoudTarget = $containerInhoud['inhoud_link']['target'] ? $containerInhoud['inhoud_link']['target'] : '_self';
                                        if ($containerInhoudTitle === 'E-mail') {
                                            $email = get_field('e-mail_address', 'option'); 
                                            echo '<li>';
                                                echo '<span class="f-items-title" style="width: 93px; display: inline-block; font-size:16px;">' . $containerInhoudTitle . '</span>';
                                                echo '<a href="mailto:'.$email.'" class="f-items2" style="color: #838b8b;">'.$email.'</a>';
                                            echo '</li>';
                                        } elseif ($containerInhoudTitle === 'Telefoon' || $containerInhoudTitle === 'Phone') {
                                            $phoneNumber = get_field('phone_number', 'option'); 
                                            echo '<li>';
                                                echo '<span class="f-items-title" style="width: 93px; display: inline-block; font-size:16px;">'. $containerInhoudTitle .' </span>';
                                                echo '<a href="tel:'.$phoneNumber.'" class="f-items2" style="color: #838b8b;">'.$phoneNumber.'</a>';
                                            echo '</li>';
                                        } elseif ($containerInhoudTitle === 'Linkedin') {
                                            $linkedinUrl = get_field('linkedin_profile_url', 'option'); 
                                            echo '<li>';
                                                echo '<span class="f-items-title" style="width: 93px; display: inline-block; font-size:16px;">LinkedIn</span>';
                                                echo '<a href="'.$linkedinUrl.'" class="f-items2" target="_blank">';
                                                    echo '<i class="ph ph-linkedin-logo" style="font-size: 20px; position: relative; top: 4px; color: #525110;"></i>';
                                                echo '</a>';
                                            echo '</li>';
                                        } else {
                                            echo '<li>';
                                                echo '<a href="'.$containerInhoudUrl.'" class="f-items2" target="'.esc_attr($containerInhoudTarget) . '">';
                                                    echo $containerInhoudTitle;
                                                echo '</a>';
                                            echo '</li>';
                                        }
                                    }
                                echo '</ul>';
                            echo '</div>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
        <div class="shape">
            <i class="icon-home-icon"></i>
        </div>
    </div>
    <div class="column" style="flex: 1; display: flex; flex-direction: column; align-items: left; justify-content: left; text-align: left; margin-left: auto; margin-right: auto;">
        <nav class="menuBox"> 
            <div class="shape">
                <i class="icon-home-icon"></i>
            </div>
            <div class="copyRight">
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: row; align-items: left; justify-content: left;">
                    <?php
                        // ACF-veld voor het copyright-jaar
                        $footer_copyright_menu_id = \BASEMATIC_THEME\Inc\Menus::get_instance()->get_menu_id('basematic_copyright_nav');
                        $footer_copyright_menu_items = wp_get_nav_menu_items($footer_copyright_menu_id);
                        if ($footer_copyright_menu_items && is_array($footer_copyright_menu_items)) {
                            foreach ($footer_copyright_menu_items as $menu_item) {
                                echo '<li style="margin-right: 20px;">';
                                    echo '<a href="' . esc_url($menu_item->url) . '" class="f-items">' . esc_html($menu_item->title) . '</a>';
                                echo '</li>';
                            }
                        }
                    ?>
                </ul>
            </div>
        </nav>     </div>
</footer>
                

</div>
<!--  \ main container / -->
</div>
<!--  \ wrapper / -->

<?php 
	if(get_field('sticky_cta')){
		$sticky_cta = get_field('sticky_cta'); 
		$sticky_cta_target = $sticky_cta['target'] ? $sticky_cta['target'] : '_self';
		echo '<div class="sticky_cta_container"><a class="sticky_cta" href="'.$sticky_cta['url'].'" target="'.$sticky_cta_target.'">'.$sticky_cta['title'].'</a></div>';
	}
?>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<?php wp_footer(); ?>
<?php echo get_field('footer_scripts', 'options'); ?>
<script src="<?php echo BASEMATIC_THEME_PATH.'/assets/scripts/swiffy-slider.min.js'; ?>"></script>
</body>
</html>
