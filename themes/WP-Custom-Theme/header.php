<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
    <header class="header">
        <div class="shell">
            <div class="header__inner">
                <a href="<?php echo home_url( '/' ) ?>" class="logo">
                    <?php ct_include_fragment('svgs/logo' , []) ?>
                </a><!-- /.logo -->

                <div class="nav-trigger js-nav-trigger">
                    <span></span>

                    <span></span>
                    
                    <span></span>
                </div><!-- /.nav-trigger -->

                <div class="header__nav">
                    <div class="header__nav-inner">
                        <?php wp_nav_menu( [
                            'theme_location' => 'header_menu',
                            'container' => 'nav',
                            'container_class' => 'nav',
                        ] ); ?>

                        <?php wp_nav_menu( [
                            'theme_location' => 'language_menu',
                            'container' => 'nav',
                            'container_class' => 'nav',
                        ] ); ?>
                    </div><!-- /.header__nav-inner -->
                </div><!-- /.header__nav -->
            </div><!-- /.header__inner -->
        </div><!-- /.shell -->
    </header><!-- /.header -->

    <main class="main">

 