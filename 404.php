<?php

/**
 * 404 template
 *
 * @package     WordPress
 * @subpackage  RST v3
 * @since       1.0.0
 */

?>

<?php

/**
 * Include header.php or require header-xxx.php for custom page
 *
 * @link        https://codex.wordpress.org/Function_Reference/get_header
 * @link        https://wp-kama.ru/functuion/get_header
 */
get_header();

?>

<div class="error-container">
    <section class="content">
        <span class="error-title">404</span>
        <p class="error-subtitle">Ooops! Page not Found</p>
    </section>
</div>

<?php # TODO: code here ?>



<?php

/**
 * Include footer.php or require footer-xxx.php for custom page
 *
 * @link        https://codex.wordpress.org/Function_Reference/get_footer
 * @link        https://wp-kama.ru/functuion/get_footer
 */
get_footer();

?>
