<footer class="footer">
    <?php if ( have_rows( 'adresses', 'option' ) ) :?>
        <div id="contact" class="footer__contacts">
            <?php while ( have_rows( 'adresses', 'option' ) ) : the_row();
                echo ($address_title = get_sub_field( 'title' ) ) ? "<h2>$address_title</h2>" : '';
                echo ($address_address = get_sub_field( 'address' ) ) ? "<address>$address_address</address>" : '';
                $address_phone = get_sub_field( 'phone' );
                $address_email = get_sub_field( 'email' );
                $address_website = get_sub_field( 'website' );
                if($address_phone || $address_email || $address_website): ?>
                    <ul>
                        <?php echo ($address_phone) ? "<li><span class=\"icon icon-phone\"></span><a href=\"tel:".preg_replace("/[^0-9+]/", "", $address_phone)."\" title=\"phone\">$address_phone</a></li>" : ''; ?>
                        <?php echo ($address_email) ? "<li><span class=\"icon icon-mail\"></span><a href=\"mailto:$address_email\" title=\"mail address\">$address_email</a></li>" : ''; ?>
                        <?php echo ($address_website) ? "<li><span class=\"icon icon-globe\"></span><a href=\"".$address_website['url']."\" target=\"".$address_website['target']."\" title=\"".$address_website['title']."\">".$address_website['title']."</a></li>" : ''; ?>
                    </ul>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif;
    echo ($map = get_field('map', 'option')) ? "<div class=\"googleMaps\">$map</div>" : ''; ?>
    <div class="footer-container">
        <?php wp_nav_menu([
            'theme_location'    => 'footer',
            'container'         => 'div',
            'container_class'   => 'footer-navbar',
            'menu_class'        => 'nav-list',
            'add_li_class'      => 'nav-item'
        ]); ?>
        <?php if($social_links = get_field('social_links', 'options')): ?>
            <div class="footer__social">
                <ul class="social">
                    <?php foreach ($social_links as $social_link): ?>
                        <li><a href="<?php echo ($social_link['link']) ? $social_link['link'] : '#'; ?>" target="_blank" title="<?php echo $social_link['social'];?>" class="icon icon-<?php echo $social_link['social'];?>"></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <!-- /.header__contacts -->
    </div>
    <span class="up icon icon-down"></span>
</footer>

<?php wp_footer(); ?>
</div>
</body>
</html>
