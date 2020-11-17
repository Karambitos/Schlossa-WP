<?php

namespace RST;

use RST\Base\Rest\Rest;
use RST\Gutenberg\Guten\Guten;
use RST\Base\Singleton;

/**
 * Core theme class
 *
 * @package RST
 * @method static Theme getInstance()
 * @var Theme $instance
 */
final class Theme extends Singleton
{

    /** @var Rest $rest REST API instance */
    public $rest;

    /** @var Guten $gutenberg Gutenberg service instance */
    public $gutenberg;

    /**
     * Core constructor.
     */
    protected function __construct()
    {
        parent::__construct();

        $this->rest = Rest::getInstance();
        $this->gutenberg = Guten::getInstance();

        add_action('init', [$this, 'themeSetup']);

        add_action('after_setup_theme', [$this, 'registerNavMenus']);
        add_filter('nav_menu_css_class', [$this, 'add_additional_class_on_li'], 1, 3);

        add_action('widgets_init', [$this, 'registerSidebars']);
        add_action('widgets_init', [$this, 'unregisterDefaultWidgets'], 1);
        add_filter('wysiwyg_heaing_primary_color', [$this, 'wysiwygHeaingPrimaryColor']);
        add_filter('nav_menu_meta_box_object', [$this, 'schlossa_add_menu_meta_box'], 10, 1);
    }

    /**
     * Setup theme
     *
     * @package     WordPress
     * @subpackage  RST v3
     * @since       3.0.0
     * @author      Luke Kortunov
     */
    public function themeSetup()
    {
        add_theme_support('menus');
        add_theme_support('widgets');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');

        # Example of image sizes:
        // add_image_size( 'post-thumbnail', 640, 999999, false );
        // add_image_size( 'post-thumbnail-cropped', 150, 150, [ 'center', 'center' ] );
    }

    /**
     * Register menus
     *
     * @package     WordPress
     * @subpackage  RST v3
     * @since       1.0.0
     * @author      Luke Kortunov
     */
    public function registerNavMenus()
    {

        $menus = [
            'primary'   => esc_html__('Primary', 'rst'),
            'footer'    => esc_html__('Footer', 'rst')
        ];

        register_nav_menus($menus);

    }

    public function add_additional_class_on_li($classes, $item, $args){
        if(isset($args->add_li_class)) {
            $classes[] = $args->add_li_class;
        }
        return $classes;
    }

    /**
     * Unregister default WordPress widgets
     *
     * Uncomment default WP widgets, that you wish to unset
     */
    function unregisterDefaultWidgets()
    {

        // unregister_widget('WP_Widget_Pages');
        // unregister_widget('WP_Widget_Calendar');
        // unregister_widget('WP_Widget_Links');
        // unregister_widget('WP_Widget_Meta');
        // unregister_widget('WP_Widget_Archives');
        // unregister_widget('WP_Widget_Search');
        // unregister_widget('WP_Widget_Recent_Posts');
        // unregister_widget('WP_Widget_Categories');
        // unregister_widget('WP_Widget_Recent_Comments');
        // unregister_widget('WP_Widget_RSS');
        // unregister_widget('WP_Widget_Text');
        // unregister_widget('WP_Widget_Tag_Cloud');
        // unregister_widget('WP_Widget_Media_Audio');
        // unregister_widget('WP_Widget_Media_Video');
        // unregister_widget('WP_Widget_Media_Image');

    }


    /**
     * Register sidebars
     */
    public function registerSidebars()
    {

        # Example of sidebar registration
        // register_sidebar( [
        //     'name'          => sprintf( __( 'Example sidebar', TEXTDOMAIN ) ),
        //     'id'            => "example",
        //     'description'   => '',
        //     'class'         => '',
        //     'before_widget' => '<li id="%1$s" class="widget %2$s">',
        //     'after_widget'  => "</li>\n",
        //     'before_title'  => '<h2 class="widgettitle">',
        //     'after_title'   => "</h2>\n",
        // ] );

    }

    /**
     * Filter adds primary color to headings
     */
    public function wysiwygHeaingPrimaryColor($content){

        $content = preg_replace_callback( '/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function( $matches ) {
            if ( ! stripos( $matches[0], 'class=' ) ) :
                $matches[0] = $matches[1] . $matches[2] . ' class="text-title__primary-color">' . $matches[3] . $matches[4];
            endif;
            return $matches[0];
        }, $content );
        return $content;
    }

    function schlossa_add_menu_meta_box( $object ) {
        add_meta_box( 'schlossa-menu-metabox', __( 'Pages sections' ), 'schlossa_menu_meta_box', 'nav-menus', 'side', 'default' );
        return $object;
    }

}
