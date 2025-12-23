<?php
/**
 * Value Props Section
 *
 * @package KIDazzle
 */

$values = array(
    array(
        'icon' => 'heart',
        'title' => 'Nurturing Care',
        'description' => 'Every child receives individual attention in a warm, loving environment that feels like a second home.',
    ),
    array(
        'icon' => 'book-open',
        'title' => 'Play-Based Learning',
        'description' => 'Our curriculum blends structured learning with creative play, fostering curiosity and a love for discovery.',
    ),
    array(
        'icon' => 'shield',
        'title' => 'Safe & Secure',
        'description' => 'State-of-the-art security systems and trained staff ensure your child\'s safety is always our top priority.',
    ),
    array(
        'icon' => 'users',
        'title' => 'Expert Teachers',
        'description' => 'Our educators are certified professionals passionate about early childhood development and education.',
    ),
);
?>

<section class="value-props section-padding">
    <div class="container-site">
        <!-- Section Header -->
        <div class="section-header text-center">
            <span class="section-label">Why Choose Us</span>
            <h2 class="section-title">The KIDazzle Difference</h2>
            <p class="section-description">
                We believe every child deserves an exceptional start. Here's what sets us apart.
            </p>
        </div>

        <!-- Values Grid -->
        <div class="values-grid">
            <?php foreach ($values as $index => $value) : ?>
                <div class="value-card card" style="animation-delay: <?php echo $index * 0.1; ?>s">
                    <div class="value-icon">
                        <i data-lucide="<?php echo esc_attr($value['icon']); ?>"></i>
                    </div>
                    <h3 class="value-title"><?php echo esc_html($value['title']); ?></h3>
                    <p class="value-description"><?php echo esc_html($value['description']); ?></p>
                    <div class="value-accent"></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.value-props {
    background: hsl(var(--color-background));
}

.section-header {
    max-width: 42rem;
    margin: 0 auto 4rem;
}

.section-label {
    display: inline-block;
    color: hsl(var(--color-secondary));
    font-weight: 600;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
}

.section-title {
    font-size: 1.875rem;
    font-weight: 700;
    margin-top: 0.75rem;
    margin-bottom: 1rem;
}

@media (min-width: 768px) {
    .section-title {
        font-size: 2.25rem;
    }
}

.section-description {
    font-size: 1.125rem;
    color: hsl(var(--color-muted-foreground));
}

.values-grid {
    display: grid;
    gap: 2rem;
}

@media (min-width: 768px) {
    .values-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .values-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

.value-card {
    position: relative;
    padding: 2rem;
    border-radius: 1rem;
    transition: all 0.3s ease;
    overflow: hidden;
}

.value-card:hover {
    transform: translateY(-4px);
}

.value-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 3.5rem;
    height: 3.5rem;
    border-radius: 0.75rem;
    background: linear-gradient(135deg, hsl(var(--color-primary)), hsl(var(--color-primary-light)));
    color: white;
    margin-bottom: 1.5rem;
    transition: transform 0.3s ease;
}

.value-card:hover .value-icon {
    transform: scale(1.1);
}

.value-icon i {
    width: 1.75rem;
    height: 1.75rem;
}

.value-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.75rem;
}

.value-description {
    color: hsl(var(--color-muted-foreground));
    line-height: 1.7;
}

.value-accent {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 0.25rem;
    background: linear-gradient(90deg, hsl(var(--color-primary)), hsl(var(--color-secondary)));
    border-radius: 0 0 1rem 1rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.value-card:hover .value-accent {
    opacity: 1;
}
</style>
