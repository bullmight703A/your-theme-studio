<?php
/**
 * Archive Template
 *
 * @package KIDazzle
 */

get_header();
?>

<section class="page-hero bg-gradient-soft">
    <div class="container-site text-center">
        <?php if (is_category()) : ?>
            <div class="badge badge-primary"><i data-lucide="folder"></i> Category</div>
            <h1><?php single_cat_title(); ?></h1>
            <?php if (category_description()) : ?>
                <p class="hero-desc"><?php echo category_description(); ?></p>
            <?php endif; ?>
        <?php elseif (is_tag()) : ?>
            <div class="badge badge-primary"><i data-lucide="tag"></i> Tag</div>
            <h1><?php single_tag_title(); ?></h1>
        <?php elseif (is_author()) : ?>
            <div class="badge badge-primary"><i data-lucide="user"></i> Author</div>
            <h1><?php the_author(); ?></h1>
        <?php elseif (is_date()) : ?>
            <div class="badge badge-primary"><i data-lucide="calendar"></i> Archive</div>
            <h1><?php 
                if (is_day()) {
                    echo get_the_date();
                } elseif (is_month()) {
                    echo get_the_date('F Y');
                } elseif (is_year()) {
                    echo get_the_date('Y');
                }
            ?></h1>
        <?php else : ?>
            <h1><?php the_archive_title(); ?></h1>
        <?php endif; ?>
    </div>
</section>

<section class="section-padding">
    <div class="container-site">
        <?php if (have_posts()) : ?>
            <div class="archive-grid grid grid-3">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('archive-card card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="archive-card__image">
                                <?php the_post_thumbnail('kidazzle-card'); ?>
                            </a>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>" class="archive-card__image archive-card__image--placeholder">
                                <i data-lucide="file-text"></i>
                            </a>
                        <?php endif; ?>
                        
                        <div class="archive-card__content p-4">
                            <span class="archive-card__date text-sm text-muted"><?php echo get_the_date(); ?></span>
                            <h2 class="archive-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p class="archive-card__excerpt text-muted">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm">
                                Read More <i data-lucide="arrow-right"></i>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="archive-pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '<i data-lucide="chevron-left"></i> Previous',
                    'next_text' => 'Next <i data-lucide="chevron-right"></i>',
                ));
                ?>
            </div>
        <?php else : ?>
            <div class="text-center">
                <div class="error-emoji">📭</div>
                <h2>No Posts Found</h2>
                <p class="text-muted">There are no posts in this category yet.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Back to Home</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
.archive-grid {
    margin-bottom: 3rem;
}

.archive-card {
    overflow: hidden;
    transition: all 0.3s ease;
}

.archive-card:hover {
    transform: translateY(-4px);
}

.archive-card__image {
    display: block;
    aspect-ratio: 16/9;
    overflow: hidden;
}

.archive-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.archive-card:hover .archive-card__image img {
    transform: scale(1.05);
}

.archive-card__image--placeholder {
    background: hsl(var(--color-muted));
    display: flex;
    align-items: center;
    justify-content: center;
}

.archive-card__image--placeholder i {
    width: 3rem;
    height: 3rem;
    color: hsl(var(--color-muted-foreground));
}

.archive-card__title {
    font-size: 1.125rem;
    margin: 0.5rem 0;
}

.archive-card__title a {
    color: inherit;
}

.archive-card__title a:hover {
    color: hsl(var(--color-primary));
}

.archive-card__excerpt {
    font-size: 0.875rem;
    margin-bottom: 1rem;
}

.archive-pagination {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
}

.archive-pagination .nav-links {
    display: flex;
    gap: 0.5rem;
}

.archive-pagination a,
.archive-pagination span {
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
    padding: 0.5rem 1rem;
    background: hsl(var(--color-card));
    border-radius: 0.5rem;
    font-size: 0.875rem;
}

.archive-pagination .current {
    background: hsl(var(--color-primary));
    color: white;
}

.error-emoji {
    font-size: 4rem;
    margin-bottom: 1rem;
}
</style>

<?php get_footer(); ?>
