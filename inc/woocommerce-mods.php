<?php 
/*** WOOCOMMERCE ***/ 

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

remove_action('woocommerce_sidebar','woocommerce_get_sidebar');

// add container & row class

function open_container_row_class(){
    echo '<div class="container">';
    echo '  <div class="row">';
}

add_action('woocommerce_before_main_content','open_container_row_class',5);

function close_container_row_class(){
    echo '  </div>';
    echo '</div>';
}

add_action('woocommerce_after_main_content','close_container_row_class',5);





 function load_sidebar_layout(){
    if(is_shop()){
        //product list

        function open_product_col_grid(){
            echo '<div class="col-sm-9">';
        }

        add_action('woocommerce_before_main_content','open_product_col_grid',6);

        function close_product_col_grid(){
            echo '</div">';
        }

        add_action('woocommerce_after_main_content','close_product_col_grid',7);

        //sidebar

        function open_sidebar_col_grid(){
            echo '<div class="col-sm-3">';
        }

        add_action('woocommerce_after_main_content','open_sidebar_col_grid',8);

        add_action('woocommerce_after_main_content','woocommerce_get_sidebar',9);

        function close_sidebar_col_grid(){
            echo '</div>';
        }

        add_action('woocommerce_after_main_content','close_sidebar_col_grid',10);
    }
}

add_action('template_redirect','load_sidebar_layout'); 

function toggle_title($val){
    $val = false;
    return $val;
}
add_filter('woocommerce_show_page_title','toggle_title');

add_action('woocommerce_after_shop_loop_item_title','the_excerpt', 1);