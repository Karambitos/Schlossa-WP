<?php

/*

Template name: Home-front

*/ ?>
<?php get_header(); ?>
<main>
    <?php if ( have_rows( 'page_fields' ) ): ?>
        <?php while ( have_rows( 'page_fields' ) ) : the_row(); ?>
            <?php get_template_part( 'parts/'.get_row_layout() ); ?>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php get_template_part( 'parts/text-picture' ); ?>
    <?php get_template_part( 'parts/center-text-section' ); ?>
    <?php get_template_part( 'parts/banner' ); ?>
    <?php get_template_part( 'parts/general-text' ); ?>
    <?php get_template_part( 'parts/accordion' ); ?>
    <?php get_template_part( 'parts/slider-left' ); ?>
    <?php get_template_part( 'parts/form' ); ?>
</main>
<?php get_footer(); ?>
