<?php
/**
 * Testimonials Section
 *
 * @package KIDazzle
 */

$testimonials = array(
    array(
        'quote' => 'KIDazzle has been incredible for our daughter. The teachers are so nurturing and the curriculum is amazing. She\'s learned so much!',
        'author' => 'Sarah M.',
        'role' => 'Parent of 4-year-old',
        'rating' => 5,
    ),
    array(
        'quote' => 'Best decision we made for our kids. The facility is clean, safe, and the staff truly cares about each child\'s development.',
        'author' => 'Michael & Jessica T.',
        'role' => 'Parents of 2',
        'rating' => 5,
    ),
    array(
        'quote' => 'My son was shy when he started. Now he\'s confident, makes friends easily, and can\'t wait to go to school every day!',
        'author' => 'Amanda R.',
        'role' => 'Parent of 3-year-old',
        'rating' => 5,
    ),
);
?>

<section class="testimonials section-padding">
    <div class="container-site">
        <!-- Section Header -->
        <div class="section-header text-center">
            <span class="section-label">Testimonials</span>
            <h2 class="section-title">What Families Say</h2>
            <p class="section-description">
                Hear from the families who've experienced the KIDazzle difference.
            </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="testimonials-grid">
            <?php foreach ($testimonials as $testimonial) : ?>
                <div class="testimonial-card card">
                    <!-- Rating -->
                    <div class="testimonial-rating">
                        <?php for ($i = 0; $i < $testimonial['rating']; $i++) : ?>
                            <i data-lucide="star" class="star"></i>
                        <?php endfor; ?>
                    </div>

                    <!-- Quote -->
                    <blockquote class="testimonial-quote">
                        "<?php echo esc_html($testimonial['quote']); ?>"
                    </blockquote>

                    <!-- Author -->
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <?php echo esc_html(substr($testimonial['author'], 0, 1)); ?>
                        </div>
                        <div>
                            <p class="author-name"><?php echo esc_html($testimonial['author']); ?></p>
                            <p class="author-role"><?php echo esc_html($testimonial['role']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.testimonials {
    background: hsl(var(--color-background));
}

.testimonials-grid {
    display: grid;
    gap: 2rem;
}

@media (min-width: 768px) {
    .testimonials-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.testimonial-card {
    padding: 2rem;
    border-radius: 1rem;
    transition: box-shadow 0.3s ease;
}

.testimonial-card:hover {
    box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.12);
}

.testimonial-rating {
    display: flex;
    gap: 0.25rem;
    margin-bottom: 1rem;
}

.testimonial-rating .star {
    width: 1.25rem;
    height: 1.25rem;
    fill: hsl(var(--color-secondary));
    color: hsl(var(--color-secondary));
}

.testimonial-quote {
    color: hsl(var(--color-foreground));
    line-height: 1.7;
    margin-bottom: 1.5rem;
    font-style: normal;
}

.testimonial-author {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.author-avatar {
    width: 3rem;
    height: 3rem;
    border-radius: 50%;
    background: linear-gradient(135deg, hsl(var(--color-primary)), hsl(var(--color-primary-light)));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.125rem;
}

.author-name {
    font-weight: 600;
    color: hsl(var(--color-foreground));
}

.author-role {
    font-size: 0.875rem;
    color: hsl(var(--color-muted-foreground));
}
</style>
