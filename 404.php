<?php get_header(); ?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<div class="img">
        <?php 
        if (get_theme_mod('header_image')) { ?>
        <img src="<?php echo esc_url(get_theme_mod('header_image')); ?>" alt="">
        <?php } ?>
</div>      
<h1 class="error" > 
    عذراً، لم يتم العثور على نتائج.
</h1>
</article>
<?php get_footer(); ?>