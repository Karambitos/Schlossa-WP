<?php

/*

Template name: Home-front

*/ ?>
<?php get_header(); ?>
<main>
    <?php

    the_post();
    the_content();

    if ( have_rows( 'page_fields' ) ): ?>
        <?php while ( have_rows( 'page_fields' ) ) : the_row(); ?>
            <?php get_template_part( 'parts/'.get_row_layout() ); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
