<?php
global $site_options;
$site_options = get_option('site_options');
// var_dump($site_options);
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
    <title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="Cache-Control" content="public">
    <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri());?>/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/animate.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/main.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/fancybox/jquery.fancybox.css">
    <?php wp_head(); ?>
    </head>
    <body <?php if(is_home()): ?>class="preload"<?php endif; ?>>
    <!-- scroll to top -->
    <!-- <div class="top_anchor">&#9650;</div> -->
    <!-- scroll to top -->
    <div class="offset-lvl"></div>
    <?php if(is_home()): ?>
    <div class="preloader-main">
        <a class="logo preloader-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri());?>/images/logo.png" alt="DINADIS logo"></a>
        <div class="loaderblock">
            <div class="loadercouner">
                <span class="num">0</span>%
            </div>
            <div class="loaderline"></div>
        </div>
    </div>
    <?php endif; ?>
    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri());?>/images/logo.png" alt="DINADIS logo"></a>
  
    <div class="right_menu">
        <a href="<?php home_url(); ?>about-ukraine" class="right_item ukraine"><span><?=get_option('menu_ukraine');?></span></a>
        <a href="<?php home_url(); ?>offers-news" class="right_item news"><span><?=get_option('menu_news');?></span></a>
        <a href="<?php home_url(); ?>exhibitions" class="right_item exhibitions"><span><?=get_option('menu_exhib');?></span></a>
        <a href="<?php home_url(); ?>careers" class="right_item vacancies"><span><?=get_option('menu_careers');?></span></a>
    </div>

    <div class="menu_box down">
        <div class="menu_main">
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#about"><?=get_option('menu_about');?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#services"><?=get_option('menu_services');?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#contacts"><?=get_option('menu_contacts');?></a></li>
            </ul>
        </div>
    </div>
    <?php
            wp_nav_menu( array(
              // 'theme_location'  => '',
              'menu'            => 'language_menu', 
              'container'       => 'div', 
              'container_class' => 'menu_box',
              // 'container_id'    => '',
              'menu_class'      => 'language_menu', 
              // 'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => '__return_empty_string', //чтобы ничего не выводилось, если меню нет
              // 'before'          => '',
              // 'after'           => '',
              // 'link_before'     => '',
              // 'link_after'      => '',
              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth'           => 2,
              // 'walker'          => '',
            ) );
    ?>

    <div class="languages">
        <!-- <div class="cur_lang">RU</div> -->
        <!-- <ul>
            <li>RU</li>
            <li>EN</li>
            <li>UA</li>
        </ul> -->
        <?php
            wp_nav_menu( array(
              'theme_location'  => 'header-menu',
              'menu'            => 'language_menu', 
              'container'       => 'false', 
              // 'container_class' => 'language_menu', 
              // 'container_id'    => '',
              // 'menu_class'      => 'language_menu', 
              // 'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => '__return_empty_string', //чтобы ничего не выводилось, если меню нет
              // 'before'          => '',
              // 'after'           => '',
              // 'link_before'     => '',
              // 'link_after'      => '',
              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth'           => 2,
              // 'walker'          => '',
            ) );
        ?>
    </div>

    <div class="scroll_down">
        <div class="title"><?=get_option('scroll');?></div>
        <!--<div class="scroll_icon"></div>   -->
        <i class="fa fa-angle-down mainp-angle-down"></i>
    </div>