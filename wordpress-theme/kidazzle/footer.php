    </main><!-- #primary -->

    <!-- Footer -->
    <footer id="colophon" class="site-footer">
        <div class="footer-main">
            <div class="container-site">
                <div class="footer-grid">
                    <!-- Brand Column -->
                    <div class="footer-column footer-column--brand">
                        <?php if (has_custom_logo()) : ?>
                            <div class="footer-logo">
                                <?php the_custom_logo(); ?>
                            </div>
                        <?php else : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo-text">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/kidazzle-logo.png'); ?>" alt="<?php bloginfo('name'); ?>" class="logo-image footer-logo-img">
                            </a>
                        <?php endif; ?>
                        <p class="footer-tagline">
                            Nurturing young minds through play-based learning and exceptional care since 2008.
                        </p>
                        <div class="footer-social">
                            <?php if (get_theme_mod('kidazzle_facebook')) : ?>
                                <a href="<?php echo esc_url(get_theme_mod('kidazzle_facebook')); ?>" class="social-link" aria-label="Facebook">
                                    <i data-lucide="facebook"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (get_theme_mod('kidazzle_instagram')) : ?>
                                <a href="<?php echo esc_url(get_theme_mod('kidazzle_instagram')); ?>" class="social-link" aria-label="Instagram">
                                    <i data-lucide="instagram"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (get_theme_mod('kidazzle_twitter')) : ?>
                                <a href="<?php echo esc_url(get_theme_mod('kidazzle_twitter')); ?>" class="social-link" aria-label="Twitter">
                                    <i data-lucide="twitter"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (get_theme_mod('kidazzle_youtube')) : ?>
                                <a href="<?php echo esc_url(get_theme_mod('kidazzle_youtube')); ?>" class="social-link" aria-label="YouTube">
                                    <i data-lucide="youtube"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="footer-column">
                        <h3 class="footer-title">Quick Links</h3>
                        <ul class="footer-links">
                            <li><a href="<?php echo esc_url(home_url('/programs')); ?>">Our Programs</a></li>
                            <li><a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a></li>
                            <li><a href="<?php echo esc_url(home_url('/locations')); ?>">Find a Location</a></li>
                            <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Book a Tour</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="footer-column">
                        <h3 class="footer-title">Corporate Office</h3>
                        <ul class="footer-contact">
                            <li>
                                <i data-lucide="map-pin" class="footer-icon"></i>
                                <span>123 Learning Lane<br>Suite 100<br>Atlanta, GA 30309</span>
                            </li>
                            <li>
                                <a href="tel:<?php echo esc_attr(get_theme_mod('kidazzle_phone', '1-800-KIDAZZLE')); ?>">
                                    <i data-lucide="phone" class="footer-icon"></i>
                                    <span><?php echo esc_html(get_theme_mod('kidazzle_phone', '1-800-KIDAZZLE')); ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:<?php echo esc_attr(get_theme_mod('kidazzle_email', 'info@kidazzle.com')); ?>">
                                    <i data-lucide="mail" class="footer-icon"></i>
                                    <span><?php echo esc_html(get_theme_mod('kidazzle_email', 'info@kidazzle.com')); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Trust Badges -->
                    <div class="footer-column">
                        <h3 class="footer-title">Quality Rated</h3>
                        <div class="footer-badges">
                            <div class="footer-badge">
                                <i data-lucide="award" class="badge-icon"></i>
                                <div>
                                    <p class="badge-title">Quality Rated</p>
                                    <p class="badge-subtitle">3-Star Excellence</p>
                                </div>
                            </div>
                            <div class="footer-badge">
                                <i data-lucide="award" class="badge-icon"></i>
                                <div>
                                    <p class="badge-title">NAEYC Accredited</p>
                                    <p class="badge-subtitle">National Recognition</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="footer-bottom">
            <div class="container-site">
                <div class="footer-bottom__inner">
                    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
                    <div class="footer-legal">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                        <a href="#">Accessibility</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>
</body>
</html>
