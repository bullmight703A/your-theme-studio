<?php
/**
 * The main template file
 *
 * @package KIDazzle
 */

get_header();
?>

<?php if (is_front_page()) : ?>
    <?php get_template_part('template-parts/home/hero'); ?>
    <?php get_template_part('template-parts/home/value-props'); ?>
    <?php get_template_part('template-parts/home/growth-journey'); ?>
    <?php get_template_part('template-parts/home/testimonials'); ?>
    <?php get_template_part('template-parts/home/cta-section'); ?>
<?php else : ?>
    <div class="container-site section-padding">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php esc_html_e('No posts found.', 'kidazzle'); ?></p>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php
get_footer();
