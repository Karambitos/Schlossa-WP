<?php
$text = get_sub_field( 'twp_text' );
$btn = get_sub_field('twp_button');
$image = get_sub_field( 'image' );?>
<section id="text-picture<?php echo get_row_index();?>" class="text-picture-container">
    <div class="inner-box">
        <div class="text-container">
            <?php echo ($text) ? apply_filters('wysiwyg_heaing_primary_color', $text) : '';
            echo ($btn) ? "<a href='".$btn['url']."' title=\"link\" class=\"button\" target='".$btn['target']."'>".$btn['title']."</a>" : ''; ?>
        </div>
    </div>
    <div class="picture-box">
        <?php echo ($image) ? "<img src=\"".$image['url']."\" alt=\"".$image['alt']."\">" : '';?>
    </div>
</section>
