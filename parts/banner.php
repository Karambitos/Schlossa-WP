<?php
$image = get_sub_field( 'b_banner_image' );
$text = get_sub_field( 'text' );
$btn = get_sub_field( 'button' ); ?>
<section id="banner<?php echo get_row_index();?>" class="banner" <?php echo ($image) ? "style=\"background-image: url('$image')\"": '';?>>
    <div class="container">
        <?php echo ($btn) ? "<a href='".$btn['url']."' title=\"link\" class=\"button section-btn\" target='".$btn['target']."'><span class='title'>".$btn['title']."</span><span class='bg'></span></a>" : ''; ?>
    </div>
    <?php echo ($text) ? "<div class=\"banner--hover\"><div class=\"banner--text\">$text</div></div>" : ''; ?>
</section>
