<?php
$image = get_sub_field( 'sp_image' );
$text = get_sub_field( 'sp_text' ); ?>
<section id="swiped-picture<?php echo get_row_index();?>" class="swiped-picture">
    <div class="picture-box js_picture">
        <?php echo ($image) ? "<img src=\"".$image['url']."\" alt=\"".$image['alt']."\">" : '';?>
        <span class="picture-btn"></span>
    </div>
    <div class="text-box js_text-box">
        <div class="text-box__inner-box">
            <?php echo ($text) ? "$text" : ''; ?>
        </div>
    </div>
</section>
