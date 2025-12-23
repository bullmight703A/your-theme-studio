<?php
/**
 * 404 Error Page Template
 *
 * @package KIDazzle
 */

get_header();
?>

<section class="page-hero bg-gradient-soft">
    <div class="container-site text-center">
        <h1>Page Not Found</h1>
        <p class="hero-desc">Oops! The page you're looking for doesn't exist.</p>
    </div>
</section>

<section class="section-padding">
    <div class="container-site text-center">
        <div class="error-404-content">
            <div class="error-emoji">🔍</div>
            <h2>Let's Get You Back on Track</h2>
            <p class="text-muted mb-8">The page you requested may have been moved or doesn't exist. Here are some helpful links:</p>
            
            <div class="error-links">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg">
                    <i data-lucide="home"></i>
                    Back to Home
                </a>
                <a href="<?php echo esc_url(home_url('/programs')); ?>" class="btn btn-outline btn-lg">
                    View Programs
                </a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline btn-lg">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>

<style>
.error-404-content {
    max-width: 600px;
    margin: 0 auto;
}

.error-emoji {
    font-size: 5rem;
    margin-bottom: 1.5rem;
}

.error-links {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
    margin-top: 2rem;
}
</style>

<?php get_footer(); ?>
