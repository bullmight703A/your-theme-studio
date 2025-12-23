<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="KIDazzle Academy">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <!-- Utility Bar -->
    <div class="utility-bar">
        <div class="container-site">
            <div class="utility-bar__inner">
                <div class="utility-bar__left">
                    <a href="tel:<?php echo esc_attr(get_theme_mod('kidazzle_phone', '1-800-KIDAZZLE')); ?>" class="utility-bar__link">
                        <i data-lucide="phone" class="icon-sm"></i>
                        <span><?php echo esc_html(get_theme_mod('kidazzle_phone', '1-800-KIDAZZLE')); ?></span>
                    </a>
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('kidazzle_email', 'hello@kidazzle.com')); ?>" class="utility-bar__link utility-bar__link--desktop">
                        <i data-lucide="mail" class="icon-sm"></i>
                        <span><?php echo esc_html(get_theme_mod('kidazzle_email', 'hello@kidazzle.com')); ?></span>
                    </a>
                </div>
                <div class="utility-bar__right">
                    <div class="utility-bar__hours">
                        <i data-lucide="clock" class="icon-sm"></i>
                        <span><?php echo esc_html(get_theme_mod('kidazzle_hours', 'Mon-Fri: 6:30am - 6:30pm')); ?></span>
                    </div>
                    <a href="#" class="utility-bar__portal">Parent Portal</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header id="masthead" class="site-header">
        <div class="container-site">
            <nav class="header-nav">
                <!-- Logo -->
                <div class="site-branding">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo-text">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/kidazzle-logo.png'); ?>" alt="<?php bloginfo('name'); ?>" class="logo-image">
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Desktop Navigation -->
                <div class="nav-menu nav-menu--desktop">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav-list',
                        'container'      => false,
                        'fallback_cb'    => 'kidazzle_fallback_menu',
                    ));
                    ?>
                </div>

                <!-- CTA Button -->
                <div class="header-cta header-cta--desktop">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary">Book a Tour</a>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" aria-label="Toggle menu" aria-expanded="false">
                    <i data-lucide="menu" class="menu-icon"></i>
                    <i data-lucide="x" class="close-icon hidden"></i>
                </button>
            </nav>

            <!-- Mobile Navigation -->
            <div class="mobile-menu hidden">
                <div class="mobile-menu__inner">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'mobile-nav-list',
                        'container'      => false,
                        'fallback_cb'    => 'kidazzle_fallback_menu',
                    ));
                    ?>
                    <div class="mobile-menu__cta">
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary btn-full">Book a Tour</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main id="primary" class="site-main">

<?php
/**
 * Fallback menu if no menu is set
 */
function kidazzle_fallback_menu() {
    ?>
    <ul class="nav-list">
        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
        <li><a href="<?php echo esc_url(home_url('/programs')); ?>">Programs</a></li>
        <li><a href="<?php echo esc_url(home_url('/about')); ?>">About</a></li>
        <li><a href="<?php echo esc_url(home_url('/locations')); ?>">Locations</a></li>
        <li><a href="<?php echo esc_url(home_url('/resources')); ?>">Resources</a></li>
        <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
    </ul>
    <?php
}
?>
