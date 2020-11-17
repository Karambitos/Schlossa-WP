<?php
$mode = get_sub_field( 'mode' );
$nav = get_sub_field( 's_navigation' );
if ( have_rows( 's_slide' ) ) : ?>
    <section id="slider<?php echo get_row_index();?>" class="slider">
        <div class="swiper-container__<?php echo $mode;?>" <?php echo ($mode == 'left') ? 'dir="rtl"' : ''; ?> >
            <div class="swiper-wrapper">
                <?php while ( have_rows( 's_slide' ) ) : the_row();
                    $text = get_sub_field( 's_s_text' );
                    $image = get_sub_field( 's_s_image' );
                    $date = get_sub_field('date');?>

                    <div class="swiper-slide" <?php echo ($image) ? "style=\"background-image: url('$image')\"" : ''; ?>>
                        <?php echo ($text) ? "<p class=\"swiper-text\">$text</p>" : ''; ?>
                        <?php echo ($date) ? "<span class=\"date\">$date</span>" : ''; ?>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php echo ($nav) ? '<div class="swiper-button-next"></div><div class="swiper-button-prev"></div>' : ''; ?>
        </div>
    </section>
<?php endif; ?>
