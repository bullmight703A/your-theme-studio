<?php
/**
 * Template Name: Programs Page
 */
get_header();

$programs = array(
    array(
        'slug' => 'infant',
        'title' => 'Infant Care',
        'ages' => '6 Weeks - 12 Months',
        'emoji' => '👶',
        'color' => 'pink',
        'description' => 'A nurturing environment where your baby receives individualized care and attention, laying the foundation for healthy development.',
        'features' => array(
            'Low caregiver-to-child ratios (1:4)',
            'Personalized feeding and sleep schedules',
            'Tummy time and sensory exploration',
            'Daily communication with parents',
            'Safe, clean, and stimulating environment'
        ),
        'schedule' => 'Full-time: 6:30 AM - 6:30 PM'
    ),
    array(
        'slug' => 'toddler',
        'title' => 'Toddler Program',
        'ages' => '1 - 2 Years',
        'emoji' => '🧒',
        'color' => 'orange',
        'description' => 'Supporting your curious explorer as they discover the world through play-based learning and social interaction.',
        'features' => array(
            'Small group sizes (1:5 ratio)',
            'Language development activities',
            'Creative arts and music',
            'Outdoor play and gross motor skills',
            'Potty training support'
        ),
        'schedule' => 'Full-time: 6:30 AM - 6:30 PM'
    ),
    array(
        'slug' => 'preschool',
        'title' => 'Preschool',
        'ages' => '3 - 4 Years',
        'emoji' => '🎨',
        'color' => 'blue',
        'description' => 'Building confidence and essential skills through our engaging, research-based curriculum designed for early learners.',
        'features' => array(
            'Pre-reading and early literacy',
            'Math concepts and problem-solving',
            'Science exploration and discovery',
            'Social-emotional development',
            'Creative expression through art'
        ),
        'schedule' => 'Full-time: 6:30 AM - 6:30 PM'
    ),
    array(
        'slug' => 'prek',
        'title' => 'Pre-Kindergarten',
        'ages' => '4 - 5 Years',
        'emoji' => '📚',
        'color' => 'indigo',
        'description' => 'Preparing your child for kindergarten success with comprehensive academic and social readiness programs.',
        'features' => array(
            'Kindergarten readiness curriculum',
            'Reading and writing foundations',
            'Advanced math concepts',
            'Critical thinking skills',
            'Leadership and collaboration'
        ),
        'schedule' => 'Full-time: 6:30 AM - 6:30 PM'
    ),
    array(
        'slug' => 'school-age',
        'title' => 'School Age',
        'ages' => '5 - 12 Years',
        'emoji' => '🎒',
        'color' => 'green',
        'description' => 'Before and after school care that supports academic success while providing enriching activities and homework help.',
        'features' => array(
            'Homework assistance',
            'STEM and enrichment activities',
            'Physical fitness and sports',
            'Arts and creative projects',
            'Safe transportation options'
        ),
        'schedule' => 'Before: 6:30 AM - 8:00 AM | After: 3:00 PM - 6:30 PM'
    )
);

$curriculum = array(
    array('icon' => 'book-open', 'title' => 'Literacy & Language', 'description' => 'Building strong foundations in reading, writing, and communication.'),
    array('icon' => 'star', 'title' => 'Math & Science', 'description' => 'Hands-on exploration of numbers, patterns, and the natural world.'),
    array('icon' => 'users', 'title' => 'Social Skills', 'description' => 'Developing empathy, cooperation, and positive relationships.'),
);
?>

<!-- Hero Section -->
<section class="page-hero bg-gradient-soft">
    <div class="container-site text-center">
        <div class="badge badge-secondary">
            <i data-lucide="book-open"></i>
            Age-Appropriate Programs
        </div>
        <h1 class="page-title">
            Programs Designed for <span class="text-primary">Every Stage</span>
        </h1>
        <p class="page-description">
            From infants to school-age children, we offer comprehensive programs that nurture development at every age.
        </p>
    </div>
</section>

<!-- Programs List -->
<section class="section-padding">
    <div class="container-site">
        <div class="programs-list">
            <?php foreach ($programs as $index => $program) : ?>
                <div class="program-item <?php echo $index % 2 === 1 ? 'program-item--reverse' : ''; ?>" id="<?php echo esc_attr($program['slug']); ?>">
                    <div class="program-visual">
                        <div class="program-image program-image--<?php echo esc_attr($program['color']); ?>">
                            <div class="program-emoji"><?php echo $program['emoji']; ?></div>
                            <p class="program-image-ages"><?php echo esc_html($program['ages']); ?></p>
                        </div>
                    </div>
                    <div class="program-content">
                        <h2 class="program-title"><?php echo esc_html($program['title']); ?></h2>
                        <p class="program-ages"><?php echo esc_html($program['ages']); ?></p>
                        <p class="program-description"><?php echo esc_html($program['description']); ?></p>
                        
                        <ul class="program-features">
                            <?php foreach ($program['features'] as $feature) : ?>
                                <li>
                                    <i data-lucide="check-circle-2"></i>
                                    <?php echo esc_html($feature); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="program-schedule">
                            <i data-lucide="clock"></i>
                            <?php echo esc_html($program['schedule']); ?>
                        </div>

                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">
                            Enroll Now
                            <i data-lucide="arrow-right"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Curriculum Section -->
<section class="section-padding bg-muted">
    <div class="container-site">
        <div class="section-header text-center">
            <h2 class="section-title">Our <span class="text-secondary">Curriculum</span></h2>
            <p class="section-description">Research-based learning that prepares children for academic and life success.</p>
        </div>
        <div class="curriculum-grid">
            <?php foreach ($curriculum as $item) : ?>
                <div class="curriculum-card card">
                    <div class="curriculum-icon">
                        <i data-lucide="<?php echo esc_attr($item['icon']); ?>"></i>
                    </div>
                    <h3><?php echo esc_html($item['title']); ?></h3>
                    <p><?php echo esc_html($item['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/home/cta-section'); ?>

<style>
.programs-list {
    display: flex;
    flex-direction: column;
    gap: 4rem;
}

.program-item {
    display: grid;
    gap: 2rem;
    align-items: center;
}

@media (min-width: 1024px) {
    .program-item {
        grid-template-columns: 1fr 1fr;
    }
    .program-item--reverse .program-visual {
        order: 2;
    }
    .program-item--reverse .program-content {
        order: 1;
    }
}

.program-image {
    aspect-ratio: 4/3;
    border-radius: 1.5rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
}

.program-image--pink { background: linear-gradient(135deg, #ec4899, #f43f5e); }
.program-image--orange { background: linear-gradient(135deg, #f97316, #fbbf24); }
.program-image--blue { background: linear-gradient(135deg, #3b82f6, #06b6d4); }
.program-image--indigo { background: linear-gradient(135deg, #6366f1, #8b5cf6); }
.program-image--green { background: linear-gradient(135deg, #22c55e, #10b981); }

.program-emoji {
    font-size: 4rem;
    margin-bottom: 1rem;
}

.program-image-ages {
    font-size: 1.25rem;
    font-weight: 600;
}

.program-title {
    font-size: 1.875rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.program-ages {
    color: hsl(var(--color-primary));
    font-weight: 500;
    margin-bottom: 1rem;
}

.program-description {
    color: hsl(var(--color-muted-foreground));
    margin-bottom: 1.5rem;
}

.program-features {
    list-style: none;
    margin-bottom: 1.5rem;
}

.program-features li {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    margin-bottom: 0.75rem;
    font-size: 0.875rem;
}

.program-features i {
    width: 1.25rem;
    height: 1.25rem;
    color: hsl(var(--color-primary));
    flex-shrink: 0;
    margin-top: 0.125rem;
}

.program-schedule {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    color: hsl(var(--color-muted-foreground));
    margin-bottom: 1.5rem;
}

.program-schedule i {
    width: 1rem;
    height: 1rem;
}

.curriculum-grid {
    display: grid;
    gap: 2rem;
}

@media (min-width: 768px) {
    .curriculum-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.curriculum-card {
    padding: 2rem;
    text-align: center;
}

.curriculum-icon {
    width: 4rem;
    height: 4rem;
    background: hsl(var(--color-primary) / 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
}

.curriculum-icon i {
    width: 2rem;
    height: 2rem;
    color: hsl(var(--color-primary));
}

.curriculum-card h3 {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
}

.curriculum-card p {
    color: hsl(var(--color-muted-foreground));
}

.bg-muted {
    background: hsl(var(--color-muted) / 0.5);
}
</style>

<?php get_footer(); ?>
