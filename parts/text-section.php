<?php
$text = get_sub_field( 'st_text' );
$mode = get_sub_field('ts_mode');
$nomargin = get_sub_field( 'ts_without_margin' );
$section_classes = "text-container";
$container_classes = '';
$text_box_classes = "text-box";
switch ($mode) {
    case 'small' :
        $section_classes .= " text-container--small mAuto";
        $container_classes = "text-container--box";
        $text_box_classes .= " text-box__left";
        break;
    case 'center' :
        $section_classes .= " text-container--center";
        $container_classes = "container";
        $text_box_classes .= " text-box__center";
        break;
    case 'half_size' :
        $section_classes .= " text-container--half-size";
        $container_classes = "container";
        break;
    default :
        $section_classes .= " mAuto";
        $container_classes = "text-container--box";
        $text_box_classes .= " text-box__left";

}
if($nomargin){
    $section_classes .= " nomargin";
}
$primary = get_sub_field( 'ts_headings_with_primary_color' );?>
<section id="text-section<?php echo get_row_index();?>" class="<?php echo $section_classes; ?>">
    <div class="<?php echo $container_classes; ?>">
        <div class="<?php echo $text_box_classes; ?>">
            <?php echo ($primary) ? apply_filters('wysiwyg_heaing_primary_color', $text) : $text; ?>
        </div>
    </div>
</section>
