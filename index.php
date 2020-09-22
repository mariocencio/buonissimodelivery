<?php get_header(); ?>
<?php if (have_posts()): 
    while(have_posts()) : the_post(); ?>

    <h1 class="red"><?php the_title(); ?></h1>
    <h2>Test</h2>
    <p>Ho aggiunto un paragrafo</p>
    <?php the_content(); ?>

<?php
	// end main loop 

	endwhile;

	endif;

?>

<?php get_footer(); ?>