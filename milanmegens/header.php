<!--
███╗░░░███╗██╗██╗░░░░░░█████╗░███╗░░██╗░█████╗░░██████╗░██████╗
████╗░████║██║██║░░░░░██╔══██╗████╗░██║██╔══██╗██╔════╝██╔════╝
██╔████╔██║██║██║░░░░░███████║██╔██╗██║██║░░██║╚█████╗░╚█████╗░
██║╚██╔╝██║██║██║░░░░░██╔══██║██║╚████║██║░░██║░╚═══██╗░╚═══██╗
██║░╚═╝░██║██║███████╗██║░░██║██║░╚███║╚█████╔╝██████╔╝██████╔╝
╚═╝░░░░░╚═╝╚═╝╚══════╝╚═╝░░╚═╝╚═╝░░╚══╝░╚════╝░╚═════╝░╚═════╝░
-->

<!DOCTYPE html>
<html lang="<?php echo get_locale(); ?>">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BJZKRJ19Y7"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-BJZKRJ19Y7');
    </script>
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
                <nav class="menuBox">
                    <?php
                        echo '<a href="https://milanmegens.test"><h1>{Milan Megens}</h1></a>';
                    ?>

                    <?php
                        wp_nav_menu(array(
                            'menu' => 'header menu',
                            'container' => false,
                            'menu_class' => 'nav_columns',
                        ));
                    ?>
                </nav>
                <a class="mobileMenu logo" href="https://milanmegens.test"><h1>{Milan Megens}</h1></a>
                <a class="mobileMenu js-toggle-mobile" href="#"><span>Menu</span></a>
            </header>