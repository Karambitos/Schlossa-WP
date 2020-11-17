<!doctype html>
<html lang="<?php echo get_locale(); ?>">
<head>
    <title><?php echo wp_get_document_title(); ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
<div class="fixed-box">
    <header class="header">
        <div class="header__logo">
            <a href="<?php echo home_url(); ?>" title="branding">
                <?php echo ($brand_logo = get_field('logo', 'options')) ? "<img src=\"$brand_logo\" alt=\"".get_bloginfo( 'name' )."\">" : '' ?>
            </a>
        </div>
        <div class="bar-container">
            <?php wp_nav_menu([
                'theme_location'    => 'primary',
                'container'         => 'nav',
                'container_class'   => 'navbar',
                'menu_class'        => 'navbar__nav',
            ]); ?>
            <?php if($social_links = get_field('social_links', 'options')): ?>
                <div class="header__social">
                    <ul class="social">
                        <?php foreach ($social_links as $social_link): ?>
                            <li><a href="<?php echo ($social_link['link']) ? $social_link['link'] : '#'; ?>" target="_blank" "title="<?php echo $social_link['social'];?>" class="icon icon-<?php echo $social_link['social'];?>"></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <!-- /.header__contacts -->
        </div>
        <div class="overflow-menu"></div>
        <div class="spinner">
            <span class="spinner-line diagonal part-1"></span>
            <span class="spinner-line horizontal"></span>
            <span class="spinner-line diagonal part-2"></span>
        </div><!-- /.spinner -->
    </header>
</div>


