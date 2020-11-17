<?php

/**
 * Function, that require svg-file and return or print it
 *
 * @param string $filename - file name excluding file extension
 * @param bool $return - true == include file || false == return path
 * @param string $dir - if svg files directory not eq. "svg" - set target directory related to theme root
 *
 * @return string/void
 *
 * @since       1.0.0
 * @author      Luke Kortunov
 */
function svg($filename, $return = false, $content = true, $dir = 'assets/dist/svg')
{
    $dir = mb_substr($dir, 0, 1) == '/' ? mb_substr($dir, 1, mb_strlen($dir)) : $dir;
    $dir = mb_substr($dir, -1, 1) == '/' ? mb_substr($dir, 0, mb_strlen($dir) - 1) : $dir;
    $path = get_template_directory() . '/' . $dir . '/' . $filename . '.svg';
    if ($return == false) {
        @require $path;
    } else {
        if ($content = true) {
            return file_get_contents($path);
        } else {
            return $path;
        }
    }
}


add_filter('upload_mimes', 'allowUploadSVG');
add_filter('generate_rewrite_rules', 'taxonomySlugAsPostType');

/**
 * Allow SVG files upload
 * @param $types
 * @return mixed
 */
function allowUploadSVG($types)
{
    $types['svg'] = 'image/svg+xml';
    return $types;
}


/**
 * Fix custom taxonomy terms for custom post types
 * After filter taxonomy slug in url will be replaced with post type url
 * @author http://someweblog.com/wordpress-custom-taxonomy-with-same-slug-as-custom-post-type/
 * @param $wp_rewrite
 */
function taxonomySlugAsPostType($wp_rewrite)
{
    $rules = [];

    $taxonomies = get_taxonomies(['_builtin' => false], 'objects');
    $post_types = get_post_types(['public' => true, '_builtin' => false], 'names');

    foreach ($post_types as $post_type) {

        foreach ($taxonomies as $taxonomy) {

            if ($taxonomy->object_type[0] != $post_type) {
                continue;
            }

            $categories = get_categories([
                'type' => $post_type,
                'taxonomy' => $taxonomy->name,
                'hide_empty' => 0
            ]);

            foreach ($categories as $category) {
                $rules[$post_type . '/' . $category->slug . '/?$'] = 'index.php?' . $category->taxonomy . '=' . $category->slug;
            }

        }

    }

    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}


if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Schloss options',
        'menu_title'    => 'Schloss options',
        'menu_slug'     => 'schloss-options',
    ));
}

function schlossa_menu_meta_box(){

    global $nav_menu_selected_id;
    $walker = new Walker_Nav_Menu_Checklist();

    $current_tab = 'all';
    if ( isset( $_REQUEST['authorarchive-tab'] ) && 'admins' == $_REQUEST['authorarchive-tab'] ) {
        $current_tab = 'admins';
    }elseif ( isset( $_REQUEST['authorarchive-tab'] ) && 'all' == $_REQUEST['authorarchive-tab'] ) {
        $current_tab = 'all';
    }

    $pageSections = get_field('page_fields', get_option( 'page_on_front' ));
    $elements = [];
    /* set values to required item properties */
    foreach ( $pageSections as $id => $page ) {
        $title = $page['acf_fc_layout'];
        switch ($title):
            case 'hero':
                $title = $page['h_title'];
                break;
            case 'text-section':
                $title = substr(strip_tags($page['st_text']),0,15) . '...';
                break;
            case 'slider':
                $title = 'Slider ' . $page['mode'];
                break;
            case 'text-picture':
                $title = substr(strip_tags($page['twp_text']),0,15) . '...';
                break;
            case 'swiped-picture':
                $title = substr(strip_tags($page['sp_text']),0,15) . '...';
                break;
            case 'banner':
                $title = "Banner - " . substr(strip_tags($page['text']),0,15) . '...';
                break;
            case 'accordion':
                $title = 'Accordion';
                break;
            case 'form':
                $title = substr(strip_tags($page['f_text_before_form']),0,15) . '...';
                break;
        endswitch;
        $el['classes'] = array();
        $el['type'] = 'custom';
        $el['object_id'] = "object_id_".$page['acf_fc_layout'];
        $el['title'] = $title;
        $el['object'] = 'custom';
        $el['url'] = "#".$page['acf_fc_layout'].$id;
        $el['attr_title'] = "attr_title".$page['acf_fc_layout'];
        $elements[$id] = (object) $el;
    }
    $removed_args = array( 'action', 'customlink-tab', 'edit-menu-item', 'menu-item', 'page-tab', '_wpnonce' ); ?>
    <div id="authorarchive" class="categorydiv">
        <ul id="authorarchive-tabs" class="authorarchive-tabs add-menu-item-tabs">
            <li <?php echo ( 'all' == $current_tab ? ' class="tabs"' : '' ); ?>>
                <a class="nav-tab-link" data-type="tabs-panel-authorarchive-all" href="<?php if ( $nav_menu_selected_id ) echo esc_url( add_query_arg( 'authorarchive-tab', 'all', remove_query_arg( $removed_args ) ) ); ?>#tabs-panel-authorarchive-all">
                    <?php _e( 'View All' ); ?>
                </a>
            </li><!-- /.tabs -->
        </ul><div id="tabs-panel-authorarchive-all" class="tabs-panel tabs-panel-view-all <?php echo ( 'all' == $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive' ); ?>">
        <ul id="authorarchive-checklist-all" class="categorychecklist form-no-clear">
            <?php
            echo walk_nav_menu_tree( array_map('wp_setup_nav_menu_item', $elements), 0, (object) array( 'walker' => $walker) );
            ?>
        </ul>
    </div><!-- /.tabs-panel -->

    <div id="tabs-panel-authorarchive-admins" class="tabs-panel tabs-panel-view-admins <?php echo ( 'admins' == $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive' ); ?>">
        <ul id="authorarchive-checklist-admins" class="categorychecklist form-no-clear">
            <?php
            echo walk_nav_menu_tree( array_map('wp_setup_nav_menu_item', $elements), 0, (object) array( 'walker' => $walker) );
            ?>
        </ul>
    </div><!-- /.tabs-panel -->
        <p class="button-controls wp-clearfix">
	<span class="list-controls">
		<a href="<?php echo esc_url( add_query_arg( array( 'authorarchive-tab' => 'all', 'selectall' => 1, ), remove_query_arg( $removed_args ) )); ?>#authorarchive" class="select-all"><?php _e('Select All'); ?></a>
	</span>
            <span class="add-to-menu">
		<input type="submit"<?php wp_nav_menu_disabled_check( $nav_menu_selected_id ); ?> class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e('Add to Menu'); ?>" name="add-authorarchive-menu-item" id="submit-authorarchive" />
		<span class="spinner"></span>
	</span>
        </p>

    </div><!-- /.categorydiv -->
    <?php

}
