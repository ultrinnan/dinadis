<?php
//хуки безопасности
require 'admin/security_hooks.php';

//кастомизация под клиента
require 'admin/view_customizations.php';
require 'admin/csv_parser.php';

//страница настроек сайта
require 'admin/site_fields.php';
require 'admin/language_fields.php';

add_theme_support('menus');
add_theme_support('post-thumbnails');

add_action( 'init', 'add_excerpts_to_pages' );

add_filter('post_gallery', 'shortcode_gallery', 10, 2);

function add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}
function mam_content_more_link_filter ($link,$link_text) {
     global $mam_global_fix_this_more_link;
     if ($mam_global_fix_this_more_link) {
          $link = $mam_global_fix_this_more_link;
     }
     return $link;
}

function shortcode_gallery($output, $atts){
     $atts = shortcode_atts(array(
         'ids' => ''
     ), $atts);
     $ids = explode(',', $atts['ids']);
     if(!$ids) return;

     $counter = 0;
     $first = 0;
     $qty = 0;
     $output = '';
     $output .= '<div id="wpgallery" class="carousel slide portfolio_slider" data-ride="carousel">';
     $output .= '<div class="carousel-inner" role="listbox">';
     foreach($ids as $id){
          $counter++;
          $qty++;
          if($counter == 1){
               if($first == 0){
                    $output .= '<div class="item active"><div class="wpgallery_slide">';
                    $first = 1;
               }
               else{
                    $output .= '<div class="item"><div class="wpgallery_slide">';
               }
          }

          $largeImage = wp_get_attachment_image_src($id, 'large');
          $fullImage = wp_get_attachment_image_src($id, 'full');

          $output .= '<a href="'.$fullImage[0].'" class="wp-customgallery" rel="wp-gallery">';
          $output .= '<img class="wp-customgallery-img" src="'.$largeImage[0].'" alt="'.get_post_field('post_excerpt', $id).'"/>';
          $output .= '</a>';

          if($counter == 3){
               $output .= '</div></div>';
               $counter = 0;
          }
     }
     if($counter != 0){
          $output .= '</div></div>';
     }
     $output .= '</div>';
     if($qty > 3){
          $lines = ceil($qty/3);
          $output .= '<ol class="carousel-indicators">';
          for ($x = 0; $x < $lines; $x++){
               if($x == 0){
                    $output .= '<li data-target="#wpgallery" data-slide-to="'.$x.'" class="active"></li>';
               }
               else{
                    $output .= '<li data-target="#wpgallery" data-slide-to="'.$x.'"></li>';
               }
          }
          $output .= '</ol>';
     }
     $output .= '</div>';
     return $output;
}

function shortcode_gallery_portfolio($output, $atts){
     $atts = shortcode_atts(array(
         'ids' => ''
     ), $atts);
     $ids = explode(',', $atts['ids']);
     if(!$ids) return;

     $counter = 0;
     $first = 0;
     $qty = 0;
     $output = '';
     $output .= '<div id="wpgallery_portfolio" class="carousel slide portfolio_slider" data-ride="carousel">';
     $output .= '<div class="carousel-inner min-h" role="listbox">';
     foreach($ids as $id){
          $counter++;
          $qty++;
          if($counter == 1){
               if($first == 0){
                    $output .= '<div class="item active"><div class="wpgallery_slide">';
                    $first = 1;
               }
               else{
                    $output .= '<div class="item"><div class="wpgallery_slide">';
               }
          }
          $largeImage = wp_get_attachment_image_src($id, 'large');
          $fullImage = wp_get_attachment_image_src($id, 'full');

          $output .= '<a href="'.$fullImage[0].'" class="wp-customgallery" rel="wp-gallery">';
          $output .= '<img class="wp-customgallery-img" src="'.$largeImage[0].'" alt="'.get_post_field('post_excerpt', $id).'"/>';
          $output .= '</a>';

          if($counter == 6){
               $output .= '</div></div>';
               $counter = 0;
          }
     }
     if($counter != 0){
          $output .= '</div></div>';
     }
     $output .= '</div>';
     if($qty > 6){
          $lines = ceil($qty/6);
          $output .= '<ol class="carousel-indicators">';
          for ($x = 0; $x < $lines; $x++){
               if($x == 0){
                    $output .= '<li data-target="#wpgallery_portfolio" data-slide-to="'.$x.'" class="active"></li>';
               }
               else{
                    $output .= '<li data-target="#wpgallery_portfolio" data-slide-to="'.$x.'"></li>';
               }
          }
          $output .= '</ol>';
     }
     $output .= '</div>';
     return $output;
}
