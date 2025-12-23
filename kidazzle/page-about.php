<?php
/**
 * Template Name: About Page
 */
get_header();
?>

<section class="page-hero bg-gradient-soft">
    <div class="container-site text-center">
        <div class="badge badge-primary"><i data-lucide="heart"></i> Our Story</div>
        <h1>Building Bright Futures <span class="text-primary">Since 2008</span></h1>
        <p class="hero-desc">At KIDazzle Academy, we believe every child is unique and capable of amazing things.</p>
    </div>
</section>

<section class="section-padding">
    <div class="container-site">
        <div class="grid grid-2">
            <div>
                <h2>Our <span class="text-secondary">Mission</span></h2>
                <p>To provide exceptional early childhood education that nurtures the whole child while partnering with families to create a strong foundation for lifelong success.</p>
                <ul class="check-list">
                    <li><i data-lucide="check-circle-2"></i> Child-centered learning approach</li>
                    <li><i data-lucide="check-circle-2"></i> Research-based curriculum</li>
                    <li><i data-lucide="check-circle-2"></i> Highly qualified educators</li>
                    <li><i data-lucide="check-circle-2"></i> Safe and nurturing environment</li>
                </ul>
            </div>
            <div class="visual-box">
                <div class="emoji-display">🌟</div>
                <p>Excellence in Care</p>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/home/cta-section'); ?>
<?php get_footer(); ?>
