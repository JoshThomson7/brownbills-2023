<footer class="footer" role="contentinfo">

    <div class="max__width">

        <div class="footer-cols">

            <div class="footer-col footer-col--main">
                <div class="footer-menu footer-menu--company">

                    <figure>
                        <?php echo file_get_contents(FL1_PATH . '/img/logo.svg'); ?>
                    </figure>

                    <ul>
                        <li>10 Devonshire Square, London EC2M 4AE</li>
                        <li>St John's Innovation Centre, Cowley Rd, Milton, Cambridge CB4 0WS</li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Contact us</a></li>
                        <li class="social">
                            <a href="https://twitter.com/InsignisCash" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                            <a href="https://www.facebook.com/InsignisAM" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://uk.linkedin.com/company/insignis-cash-solutions" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <?php
            while (have_rows('footer_menus', 'options')) : the_row();

                $footer_menu = get_sub_field('footer_menu');
                $footer_menu_2 = get_sub_field('footer_menu_2');
            ?>
                <div class="footer-col">

                    <?php if ($footer_menu) : ?>
                        <div class="footer-menu">
                            <div class="footer-menu__heading">
                                <h5><?php echo $footer_menu->name; ?></h5>
                                <span class="menu-dropdown"><i class="fas fa-chevron-down"></i></span>
                            </div>
                            <div class="footer-menu__items">
                                <?php wp_nav_menu(array('menu' => $footer_menu->name, 'container' => false)); ?>
                            </div>
                        </div>
                    <?php endif; ?>



                    <?php if ($footer_menu_2) : ?>
                        <div class="footer-menu footer-menu--2">
                            <div class="footer-menu__heading">
                                <h5><?php echo $footer_menu_2->name; ?></h5>
                                <span class="menu-dropdown"><i class="fas fa-chevron-down"></i></span>
                            </div>
                            <div class="footer-menu__items">
                                <?php wp_nav_menu(array('menu' => $footer_menu_2->name, 'container' => false)); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

            <?php endwhile; ?>
        </div>

        <div class="footer-legal">
            <?php wp_nav_menu(array('menu' => 'Legal', 'container' => false)); ?>
        </div>

        <div class="subfooter">
            <div class="subfooter--left">
                <small>&copy;<?php date('Y'); ?> <?php bloginfo('name') ?>. Insignis Cash is a trading name of Insignis Asset Management Limited (Company number 09477376).<br />
                    Insignis Asset Management Limited is authorised and regulated by the Financial Conduct Authority (813442).</small>
            </div><!-- subfooter--left -->

            <div class="subfooter--right">
                <small><a href="http://www.fl1.digital" target="_blank">Powered by <?php echo file_get_contents(FL1_PATH . '/img/fl1-icon.svg'); ?> FL1 Digital</a></small>
            </div><!-- subfooter--left -->
        </div><!-- subfooter -->
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>
<script async type="text/javascript" src="https://static.klaviyo.com/onsite/js/klaviyo.js?company_id=RcRgdD"></script>
</body>

</html>