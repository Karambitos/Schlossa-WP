<?php
$bg_img = get_sub_field( 'h_background_image' );
$title = get_sub_field( 'h_title' );
$text = get_sub_field( 'h_text' );
$btn = get_sub_field( 'h_button' ); ?>
<section id="hero<?php echo get_row_index();?>" class="hero" <?php echo ($bg_img) ? "style=\"background-image: url('$bg_img')\"": '';?>>
    <div class="container">
        <div class="hero__title">
            <?php echo ($title) ? "<h2 class=\"h1\">$title</h2>" : '';
            echo ($text) ? "$text" : '';
            echo ($btn) ? "<a href='".$btn['url']."' title=\"link\" class=\"button section-btn anchor\" target='".$btn['target']."'><span class='title'>".$btn['title']."</span><span class='bg'></span></a>" : ''; ?>
        </div>
    </div>
</section>
