<?php
/**
 * Single Post Template
 *
 * @package KIDazzle
 */

get_header();
?>

<main class="site-main">
  <?php while (have_posts()) : the_post(); ?>
    
    <!-- Page Hero -->
    <section class="page-hero bg-gradient-soft">
      <div class="container-site">
        <nav class="page-hero__breadcrumb" aria-label="Breadcrumb">
          <a href="<?php echo home_url(); ?>">Home</a>
          <span class="separator">/</span>
          <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Blog</a>
          <span class="separator">/</span>
          <span><?php the_title(); ?></span>
        </nav>
        <h1 class="page-hero__title"><?php the_title(); ?></h1>
        <div class="post-meta">
          <span class="post-meta__date">
            <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <?php echo get_the_date(); ?>
          </span>
          <span class="post-meta__author">
            <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <?php the_author(); ?>
          </span>
          <?php if (has_category()) : ?>
            <span class="post-meta__category">
              <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
              </svg>
              <?php the_category(', '); ?>
            </span>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <!-- Post Content -->
    <section class="section-padding">
      <div class="container-site">
        <div class="post-layout">
          <!-- Main Content -->
          <article class="post-content">
            <?php if (has_post_thumbnail()) : ?>
              <div class="post-featured-image">
                <?php the_post_thumbnail('large', ['class' => 'featured-image']); ?>
              </div>
            <?php endif; ?>
            
            <div class="post-body prose">
              <?php the_content(); ?>
            </div>

            <?php if (has_tag()) : ?>
              <div class="post-tags">
                <span class="post-tags__label">Tags:</span>
                <?php the_tags('<span class="post-tags__list">', ', ', '</span>'); ?>
              </div>
            <?php endif; ?>

            <!-- Post Navigation -->
            <nav class="post-navigation">
              <div class="post-navigation__prev">
                <?php
                $prev_post = get_previous_post();
                if ($prev_post) :
                ?>
                  <span class="post-navigation__label">Previous Article</span>
                  <a href="<?php echo get_permalink($prev_post); ?>" class="post-navigation__link">
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    <?php echo get_the_title($prev_post); ?>
                  </a>
                <?php endif; ?>
              </div>
              <div class="post-navigation__next">
                <?php
                $next_post = get_next_post();
                if ($next_post) :
                ?>
                  <span class="post-navigation__label">Next Article</span>
                  <a href="<?php echo get_permalink($next_post); ?>" class="post-navigation__link">
                    <?php echo get_the_title($next_post); ?>
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                  </a>
                <?php endif; ?>
              </div>
            </nav>
          </article>

          <!-- Sidebar -->
          <aside class="post-sidebar">
            <!-- Author Box -->
            <div class="sidebar-widget author-box card">
              <div class="author-box__avatar">
                <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
              </div>
              <h3 class="author-box__name"><?php the_author(); ?></h3>
              <p class="author-box__bio"><?php the_author_meta('description'); ?></p>
            </div>

            <!-- Categories -->
            <div class="sidebar-widget card">
              <h3 class="sidebar-widget__title">Categories</h3>
              <ul class="sidebar-widget__list">
                <?php
                $categories = get_categories();
                foreach ($categories as $category) :
                ?>
                  <li>
                    <a href="<?php echo get_category_link($category->term_id); ?>">
                      <?php echo $category->name; ?>
                      <span class="count">(<?php echo $category->count; ?>)</span>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>

            <!-- Recent Posts -->
            <div class="sidebar-widget card">
              <h3 class="sidebar-widget__title">Recent Articles</h3>
              <ul class="sidebar-widget__posts">
                <?php
                $recent_posts = wp_get_recent_posts([
                  'numberposts' => 4,
                  'post_status' => 'publish',
                  'exclude' => get_the_ID()
                ]);
                foreach ($recent_posts as $post) :
                ?>
                  <li class="recent-post">
                    <?php if (has_post_thumbnail($post['ID'])) : ?>
                      <a href="<?php echo get_permalink($post['ID']); ?>" class="recent-post__image">
                        <?php echo get_the_post_thumbnail($post['ID'], 'thumbnail'); ?>
                      </a>
                    <?php endif; ?>
                    <div class="recent-post__content">
                      <a href="<?php echo get_permalink($post['ID']); ?>" class="recent-post__title">
                        <?php echo $post['post_title']; ?>
                      </a>
                      <span class="recent-post__date"><?php echo get_the_date('M j, Y', $post['ID']); ?></span>
                    </div>
                  </li>
                <?php endforeach; wp_reset_postdata(); ?>
              </ul>
            </div>

            <!-- Newsletter CTA -->
            <div class="sidebar-widget sidebar-cta card bg-gradient-primary">
              <h3 class="sidebar-cta__title">Stay Updated</h3>
              <p class="sidebar-cta__text">Get parenting tips and early education insights delivered to your inbox.</p>
              <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary">Subscribe</a>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <!-- Related Posts -->
    <?php
    $categories = get_the_category();
    if ($categories) :
      $category_ids = array_map(function($cat) { return $cat->term_id; }, $categories);
      $related_posts = new WP_Query([
        'category__in' => $category_ids,
        'post__not_in' => [get_the_ID()],
        'posts_per_page' => 3,
        'orderby' => 'rand'
      ]);
      
      if ($related_posts->have_posts()) :
    ?>
    <section class="related-posts-section bg-gradient-soft section-padding">
      <div class="container-site">
        <h2 class="related-posts__title text-center mb-8">Related Articles</h2>
        <div class="related-posts-grid grid grid-3">
          <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
            <article class="related-post card">
              <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" class="related-post__image">
                  <?php the_post_thumbnail('medium'); ?>
                </a>
              <?php endif; ?>
              <div class="related-post__content p-4">
                <span class="related-post__date text-sm text-muted"><?php echo get_the_date(); ?></span>
                <h3 class="related-post__title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="related-post__excerpt text-sm text-muted">
                  <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                </p>
              </div>
            </article>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
    <?php
      endif;
      wp_reset_postdata();
    endif;
    ?>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
