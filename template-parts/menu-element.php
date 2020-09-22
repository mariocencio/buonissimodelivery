<nav class="nav navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="<?php echo network_home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri();?>/imgs/buonissimo_logo_2018.png" alt="<?php bloginfo('name'); ?>" border="0" class="img-fluid"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigazione" aria-controls="navigazione" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        
        <?php
            wp_nav_menu( array(
                'menu' => "Header Menu",
                'theme_location' => 'header-menu',
                'depth' => 14,
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'navigazione',
                'menu_class' => 'navbar-nav mr-auto',
                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                'walker' => new wp_bootstrap_navwalker())
            );
        ?>
    </div>
</nav>