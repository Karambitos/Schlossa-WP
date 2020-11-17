<?php
$text = get_sub_field( 'f_text_before_form' );
$f_form = get_sub_field( 'f_form' )[0]; ?>
<section id="form<?php echo get_row_index();?>" class="text-container form-section">
    <div class="container">
        <div class="text-box">
           <?php echo apply_filters('wysiwyg_heaing_primary_color', $text); ?>
        </div>
        <?php echo do_shortcode("[contact-form-7 id=\"$f_form\"]"); ?>
    </div>
</section>

