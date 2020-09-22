<?php
/*************************************/
//Abilito funzionalità aggiuntive tema
/*************************************/


function tema_setup(){
    if(function_exists('add_theme_support')){
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        add_theme_support('widgets');
        add_theme_support('title-tag');
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'widgets'));    
    
        add_theme_support('woocommerce', array(
            "thumbnail_image_width" => 150,
            "single_image_width" => 300,
            "product_grid" => array(
                "default_columns" => 10,
                "min_columns" => 2,
                "max_columns" => 3
            ),
        ));
    }


    //Aggiungo dimensioni immagini 
    //add_image_size( 'thumb-400x400', 400, 400, true, array('center') ); // (cropped)
    //add_image_size( 'thumb-770x546', 770, 546, true, array('center') ); // (cropped)
    //add_image_size( 'gallery-image', 9999, 1150, false ); // (cropped)
   
    // Registro menu personalizzati
    register_nav_menus( array(
            'header-menu'   => 'Header Menu',
            'footer-menu' => 'Footer Menu',
        )
    );

    //add_filter('show_admin_bar', '__return_false');
}
add_action('after_setup_theme', 'tema_setup');

/*************************************/
//Carico script .js e foglio di stile
/*************************************/
function carica_scripts_tema() {
    if (!is_admin()) {
        //Style
        //wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/bootstrap-4.3.1-dist/css/bootstrap.min.css');
        wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/bootstrap-4.1.3-dist/css/bootstrap.min.css');
        wp_enqueue_style( 'hamburger-style', get_template_directory_uri() . '/css/hamburgers.min.css' );
        wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/css/slick.css' );
        wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/css/slick-theme.css' );
        //wp_enqueue_style( 'scrollbar-style', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.min.css');
        //wp_enqueue_style( 'fancybox-style', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
        
        wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css');
        

        //Register Script
        //wp_register_script( 'popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'),'1.14.7',true);

        wp_register_script('bootstrap-js', get_template_directory_uri() . '/bootstrap-4.1.3-dist/js/bootstrap.min.js', array('jquery'), '1.0', true );
        //wp_register_script('autohidingnavbar-js', get_template_directory_uri() . '/js/jquery.bootstrap-autohidingnavbar.js', array('jquery'), '1.0', true );
        //wp_register_script('imgloaded-js', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '1.0', true );
        //wp_register_script('hoverint-js', get_template_directory_uri() . '/js/jquery.hoverIntent.min.js', array(), '1.8.1', true );
        //wp_register_script('lazy-js', get_template_directory_uri() . '/js/jquery.lazy.min.js', array(), '1.0', true );
        //wp_register_script('scrollmagic-js', get_template_directory_uri() . '/js/ScrollMagic.min.js', array(), '2.0.7', true );
        //wp_register_script('debugIndicators-js', get_template_directory_uri() . '/js/debug.addIndicators.min.js', array(), '2.0.7', true );
        //wp_register_script('scrollbar-js', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js', array(), '3.1.5', true );
        //wp_register_script('fancybox-js', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), '1.8.1', true );
        wp_register_script('slick-js', get_template_directory_uri() . '/js/slick.js', array(), '1.8.1', true );
        //wp_register_script('masonry-js', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), '1.0', true );
        //wp_register_script('vimeo-js', 'https://player.vimeo.com/api/player.js', array(), '1.0', true );
        wp_register_script('engine-js', get_template_directory_uri() . '/js/engine.js', array(), '1.0', true );
        

        //Enqueue Script
        //wp_enqueue_script('popper-js');
        wp_enqueue_script('bootstrap-js');
        //wp_enqueue_script('autohidingnavbar-js');
        //wp_enqueue_script('imgloaded-js');
        //wp_enqueue_script('hoverint-js');
        //wp_enqueue_script('lazy-js');
        //wp_enqueue_script('scrollmagic-js');
        //wp_enqueue_script('debugIndicators-js');
        //wp_enqueue_script('scrollbar-js');
        //wp_enqueue_script('fancybox-js');
        wp_enqueue_script('slick-js');
        //wp_enqueue_script('masonry-js');
        //wp_enqueue_script('vimeo-js');
        wp_enqueue_script('engine-js');
    }   
}

add_action('wp_enqueue_scripts', 'carica_scripts_tema');



/*************************************/
/************ NAVIGAZIONE ************/
/*************************************/
require_once('inc/wp_bootstrap_navwalker.php');

/*************************************/
/*************** ACF *****************/
/*************************************/
// Creo pagina Opzioni
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();
    
}

/*************************************/
/********** BREADCRUMBS **************/
/*************************************/

require_once('inc/breadcrumbs.php');

/*************************************/
/********** WOOCOMMERCE **************/
/*************************************/

require_once('inc/woocommerce-mods.php');

/***********************************/
/***** search form shortcode *******/
/***********************************/

function wpbsearchform( $form ) {
 
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div id="search">
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    <div class="search-close">X</div>
    </div>
    </form>';
 
    return $form;
}
 
add_shortcode('wpbsearch', 'wpbsearchform');

/************************************/
/******* Limit Excerpt **************/
/************************************/

function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/***********************************/
/****** Social Share widget ********/
/***********************************/

                  
/**
 * Register our sidebars and widgetized areas.
 *
 */
function social_widget_init() {

    register_sidebar( array(
        'name'          => 'Social Share Widget',
        'id'            => 'social_share',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

}
add_action( 'widgets_init', 'social_widget_init' );

function translate_widget_init() {

    register_sidebar( array(
        'name'          => 'Language selector Widget',
        'id'            => 'lang_share',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

}
add_action( 'widgets_init', 'translate_widget_init' );

/********************************/
/****** ACF GMAPS API KEY *******/
/********************************/

function my_acf_google_map_api( $api ){
    
    $api['key'] = '';
    
    return $api;
    
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


// Aggiorno il CSS nell’area amministratore
function admin_style() {
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
    }
    // Esegue la funzione admin_style() all’azione admin_enqueue_scripts di WP
    add_action('admin_enqueue_scripts', 'admin_style');

add_filter( 'wpml_custom_field_original_data', '__return_null' );

/*** Parse Video Url ***/
function determineVideoUrlType($url) {


    $yt_rx = '/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/';
    $has_match_youtube = preg_match($yt_rx, $url, $yt_matches);


    $vm_rx = '/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([‌​0-9]{6,11})[?]?.*/';
    $has_match_vimeo = preg_match($vm_rx, $url, $vm_matches);


    //Then we want the video id which is:
    if($has_match_youtube) {
        $video_id = $yt_matches[5]; 
        $type = 'youtube';
    }
    elseif($has_match_vimeo) {
        $video_id = $vm_matches[5];
        $type = 'vimeo';
    }
    else {
        $video_id = 0;
        $type = 'none';
    }


    $data['video_id'] = $video_id;
    $data['video_type'] = $type;

    return $data;

}

