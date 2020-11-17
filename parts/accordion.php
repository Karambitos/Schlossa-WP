<?php
$text = get_sub_field( 'text' ); ?>
<section id="accordion<?php echo get_row_index();?>" class="accordion">
    <div class="text-container text-container--center nomargin">
        <div class="accordion-container">
            <div class="text-box__center">
                <?php echo ($text) ? "$text" : ''; ?>
            </div>
        </div>
        <span class="icon icon-down accordion-btn"></span>
    </div>
</section>
