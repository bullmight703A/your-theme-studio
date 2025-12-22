<?php
/**
 * Template Name: Locations Page
 */
get_header();

$locations = array(
    array(
        'id' => 'west-end',
        'name' => 'West End',
        'address' => '1234 West End Ave, Suite 100',
        'city' => 'Atlanta, GA 30318',
        'phone' => '(404) 555-0100',
        'hours' => 'Monday - Friday: 6:30 AM - 6:30 PM',
        'programs' => array('Infant Care', 'Toddlers', 'Preschool', 'Pre-K'),
        'features' => array('Outdoor playground', 'Parent parking', 'Security system', 'Modern classrooms'),
        'rating' => 4.9,
        'reviews' => 127
    ),
    array(
        'id' => 'midtown',
        'name' => 'Midtown',
        'address' => '567 Peachtree St NE',
        'city' => 'Atlanta, GA 30308',
        'phone' => '(404) 555-0200',
        'hours' => 'Monday - Friday: 6:30 AM - 6:30 PM',
        'programs' => array('Infant Care', 'Toddlers', 'Preschool', 'Pre-K', 'School Age'),
        'features' => array('Indoor gym', 'Garden area', 'Covered parking', 'Art studio'),
        'rating' => 4.8,
        'reviews' => 98
    ),
    array(
        'id' => 'buckhead',
        'name' => 'Buckhead',
        'address' => '890 Lenox Road NE',
        'city' => 'Atlanta, GA 30326',
        'phone' => '(404) 555-0300',
        'hours' => 'Monday - Friday: 6:30 AM - 6:30 PM',
        'programs' => array('Toddlers', 'Preschool', 'Pre-K', 'School Age'),
        'features' => array('Large outdoor space', 'STEM lab', 'Music room', 'Parent lounge'),
        'rating' => 4.9,
        'reviews' => 145
    )
);
?>

<!-- Hero Section -->
<section class="page-hero bg-gradient-soft">
    <div class="container-site text-center">
        <div class="badge badge-primary">
            <i data-lucide="map-pin"></i>
            Convenient Locations
        </div>
        <h1 class="page-title">
            Find a <span class="text-primary">KIDazzle</span> <span class="text-secondary">Near You</span>
        </h1>
        <p class="page-description">
            Multiple convenient locations throughout Atlanta, each offering the same exceptional care and education your family deserves.
        </p>
    </div>
</section>

<!-- Locations Grid -->
<section class="section-padding">
    <div class="container-site">
        <div class="locations-grid">
            <?php foreach ($locations as $location) : ?>
                <div class="location-card card">
                    <!-- Map Placeholder -->
                    <div class="location-map">
                        <i data-lucide="map-pin" class="location-map-icon"></i>
                        <p class="location-map-name"><?php echo esc_html($location['name']); ?></p>
                    </div>
                    
                    <div class="location-content">
                        <div class="location-header">
                            <h2 class="location-name"><?php echo esc_html($location['name']); ?></h2>
                            <div class="location-rating">
                                <i data-lucide="star" class="star-icon"></i>
                                <span class="rating-value"><?php echo esc_html($location['rating']); ?></span>
                                <span class="rating-count">(<?php echo esc_html($location['reviews']); ?>)</span>
                            </div>
                        </div>

                        <div class="location-info">
                            <div class="info-item">
                                <i data-lucide="map-pin"></i>
                                <div>
                                    <p><?php echo esc_html($location['address']); ?></p>
                                    <p class="text-muted"><?php echo esc_html($location['city']); ?></p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i data-lucide="phone"></i>
                                <a href="tel:<?php echo esc_attr($location['phone']); ?>"><?php echo esc_html($location['phone']); ?></a>
                            </div>
                            <div class="info-item">
                                <i data-lucide="clock"></i>
                                <p class="text-muted"><?php echo esc_html($location['hours']); ?></p>
                            </div>
                        </div>

                        <!-- Programs -->
                        <div class="location-programs">
                            <p class="programs-label">Programs Available:</p>
                            <div class="programs-tags">
                                <?php foreach ($location['programs'] as $program) : ?>
                                    <span class="program-tag"><?php echo esc_html($program); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Features -->
                        <div class="location-features">
                            <p class="features-label">Features:</p>
                            <div class="features-grid">
                                <?php foreach ($location['features'] as $feature) : ?>
                                    <div class="feature-item">
                                        <i data-lucide="check-circle-2"></i>
                                        <?php echo esc_html($feature); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="location-actions">
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">Book a Tour</a>
                            <a href="tel:<?php echo esc_attr($location['phone']); ?>" class="btn btn-outline">Call</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section-padding bg-muted">
    <div class="container-site">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number text-primary">3</div>
                <p class="stat-label">Convenient Locations</p>
            </div>
            <div class="stat-item">
                <div class="stat-number text-secondary">500+</div>
                <p class="stat-label">Enrolled Families</p>
            </div>
            <div class="stat-item">
                <div class="stat-number text-primary">15+</div>
                <p class="stat-label">Years Serving Atlanta</p>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/home/cta-section'); ?>

<style>
.locations-grid {
    display: grid;
    gap: 2rem;
}

@media (min-width: 768px) {
    .locations-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1280px) {
    .locations-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.location-card {
    overflow: hidden;
}

.location-map {
    aspect-ratio: 16/9;
    background: linear-gradient(135deg, hsl(var(--color-primary) / 0.2), hsl(var(--color-secondary) / 0.2));
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.location-map-icon {
    width: 3rem;
    height: 3rem;
    color: hsl(var(--color-primary));
    margin-bottom: 0.5rem;
}

.location-map-name {
    font-weight: 600;
}

.location-content {
    padding: 1.5rem;
}

.location-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.location-name {
    font-size: 1.5rem;
    font-weight: 700;
}

.location-rating {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    font-size: 0.875rem;
}

.star-icon {
    width: 1rem;
    height: 1rem;
    fill: hsl(var(--color-secondary));
    color: hsl(var(--color-secondary));
}

.rating-value {
    font-weight: 600;
}

.rating-count {
    color: hsl(var(--color-muted-foreground));
}

.location-info {
    margin-bottom: 1.5rem;
}

.info-item {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    margin-bottom: 0.75rem;
}

.info-item i {
    width: 1.25rem;
    height: 1.25rem;
    color: hsl(var(--color-primary));
    flex-shrink: 0;
    margin-top: 0.125rem;
}

.info-item a {
    color: inherit;
    text-decoration: none;
}

.info-item a:hover {
    color: hsl(var(--color-primary));
}

.location-programs {
    margin-bottom: 1.5rem;
}

.programs-label,
.features-label {
    font-size: 0.875rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.programs-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.program-tag {
    font-size: 0.75rem;
    background: hsl(var(--color-primary) / 0.1);
    color: hsl(var(--color-primary));
    padding: 0.25rem 0.5rem;
    border-radius: 9999px;
}

.location-features {
    margin-bottom: 1.5rem;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.5rem;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.75rem;
    color: hsl(var(--color-muted-foreground));
}

.feature-item i {
    width: 0.75rem;
    height: 0.75rem;
    color: hsl(var(--color-primary));
}

.location-actions {
    display: flex;
    gap: 0.75rem;
}

.location-actions .btn {
    flex: 1;
}

.stats-grid {
    display: grid;
    gap: 2rem;
    text-align: center;
}

@media (min-width: 768px) {
    .stats-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.stat-number {
    font-size: 2.25rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: hsl(var(--color-muted-foreground));
}

.bg-muted {
    background: hsl(var(--color-muted) / 0.5);
}
</style>

<?php get_footer(); ?>
