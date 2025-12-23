<?php
/**
 * Growth Journey Section
 *
 * @package KIDazzle
 */

$stages = array(
    array(
        'id' => 'infant',
        'icon' => 'baby',
        'title' => 'Infant Care',
        'ages' => '6 weeks - 12 months',
        'color' => 'pink',
        'description' => 'Gentle, nurturing care for your littlest ones with dedicated caregivers who respond to each baby\'s unique needs and rhythms.',
        'highlights' => array(
            'Low caregiver-to-infant ratios',
            'Safe sleep practices',
            'Developmental milestone tracking',
            'Daily communication with parents',
        ),
    ),
    array(
        'id' => 'toddler',
        'icon' => 'smile',
        'title' => 'Toddlers',
        'ages' => '1 - 2 years',
        'color' => 'orange',
        'description' => 'Active exploration and sensory experiences that encourage curiosity, language development, and early social skills.',
        'highlights' => array(
            'Sensory play activities',
            'Language-rich environment',
            'Potty training support',
            'Music and movement',
        ),
    ),
    array(
        'id' => 'preschool',
        'icon' => 'sparkles',
        'title' => 'Preschool',
        'ages' => '3 - 4 years',
        'color' => 'green',
        'description' => 'Creative learning through play-based curriculum that builds cognitive, social-emotional, and early literacy skills.',
        'highlights' => array(
            'Pre-reading and math readiness',
            'Creative arts and expression',
            'Social skills development',
            'Nature exploration',
        ),
    ),
    array(
        'id' => 'prek',
        'icon' => 'graduation-cap',
        'title' => 'Pre-K',
        'ages' => '4 - 5 years',
        'color' => 'blue',
        'description' => 'Kindergarten-ready curriculum focusing on academic foundations, self-regulation, and collaborative learning.',
        'highlights' => array(
            'Reading and writing basics',
            'Math concepts',
            'Science experiments',
            'Kindergarten transition prep',
        ),
    ),
    array(
        'id' => 'school-age',
        'icon' => 'backpack',
        'title' => 'School Age',
        'ages' => '5 - 12 years',
        'color' => 'purple',
        'description' => 'Before and after school programs with homework help, enrichment activities, and summer camp adventures.',
        'highlights' => array(
            'Homework assistance',
            'STEM enrichment',
            'Sports and recreation',
            'Summer camp programs',
        ),
    ),
);
?>

<section class="growth-journey section-padding">
    <div class="container-site">
        <!-- Section Header -->
        <div class="section-header text-center">
            <span class="section-label">Programs</span>
            <h2 class="section-title">The Growth Journey</h2>
            <p class="section-description">
                Age-appropriate programs designed to nurture every stage of your child's development.
            </p>
        </div>

        <!-- Stage Tabs -->
        <div class="stage-tabs">
            <?php foreach ($stages as $index => $stage) : ?>
                <button 
                    class="stage-tab<?php echo $index === 0 ? ' active' : ''; ?>" 
                    data-stage="<?php echo esc_attr($stage['id']); ?>"
                >
                    <i data-lucide="<?php echo esc_attr($stage['icon']); ?>"></i>
                    <span class="stage-tab-label"><?php echo esc_html($stage['title']); ?></span>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Stage Content -->
        <?php foreach ($stages as $index => $stage) : ?>
            <div class="stage-content<?php echo $index === 0 ? ' active' : ''; ?>" data-stage-content="<?php echo esc_attr($stage['id']); ?>">
                <div class="stage-grid">
                    <!-- Visual -->
                    <div class="stage-visual">
                        <div class="stage-image stage-image--<?php echo esc_attr($stage['color']); ?>">
                            <i data-lucide="<?php echo esc_attr($stage['icon']); ?>" class="stage-image-icon"></i>
                            <h3 class="stage-image-title"><?php echo esc_html($stage['title']); ?></h3>
                            <p class="stage-image-ages"><?php echo esc_html($stage['ages']); ?></p>
                        </div>
                        <div class="stage-dot stage-dot--1"></div>
                        <div class="stage-dot stage-dot--2"></div>
                    </div>

                    <!-- Content -->
                    <div class="stage-info">
                        <h3 class="stage-title"><?php echo esc_html($stage['title']); ?></h3>
                        <p class="stage-description"><?php echo esc_html($stage['description']); ?></p>

                        <div class="stage-highlights">
                            <h4>Program Highlights:</h4>
                            <ul class="highlights-list">
                                <?php foreach ($stage['highlights'] as $highlight) : ?>
                                    <li>
                                        <span class="highlight-dot"></span>
                                        <?php echo esc_html($highlight); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <a href="<?php echo esc_url(home_url('/programs#' . $stage['id'])); ?>" class="stage-link">
                            Learn more about <?php echo esc_html($stage['title']); ?>
                            <span>→</span>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<style>
.growth-journey {
    background: hsl(var(--color-muted) / 0.3);
}

.stage-tabs {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0.5rem;
    margin-bottom: 3rem;
}

.stage-tab {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.25rem;
    border-radius: 9999px;
    font-size: 0.875rem;
    font-weight: 500;
    background: hsl(var(--color-card));
    color: hsl(var(--color-muted-foreground));
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.stage-tab:hover {
    background: hsl(var(--color-muted));
    color: hsl(var(--color-foreground));
}

.stage-tab.active {
    background: hsl(var(--color-primary));
    color: white;
    box-shadow: 0 4px 20px -4px hsl(var(--color-primary) / 0.4);
}

.stage-tab i {
    width: 1rem;
    height: 1rem;
}

.stage-tab-label {
    display: none;
}

@media (min-width: 640px) {
    .stage-tab-label {
        display: inline;
    }
}

.stage-content {
    display: none;
}

.stage-content.active {
    display: block;
}

.stage-grid {
    display: grid;
    gap: 3rem;
    align-items: center;
}

@media (min-width: 1024px) {
    .stage-grid {
        grid-template-columns: 1fr 1fr;
    }
}

.stage-visual {
    position: relative;
}

.stage-image {
    aspect-ratio: 1;
    border-radius: 1.5rem;
    padding: 2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
}

.stage-image--pink { background: linear-gradient(135deg, #ec4899, #f43f5e); }
.stage-image--orange { background: linear-gradient(135deg, #f97316, #fbbf24); }
.stage-image--green { background: linear-gradient(135deg, #22c55e, #10b981); }
.stage-image--blue { background: linear-gradient(135deg, #3b82f6, #6366f1); }
.stage-image--purple { background: linear-gradient(135deg, #a855f7, #8b5cf6); }

.stage-image-icon {
    width: 6rem;
    height: 6rem;
    margin-bottom: 1.5rem;
    opacity: 0.9;
}

.stage-image-title {
    font-size: 1.875rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.stage-image-ages {
    font-size: 1.25rem;
    opacity: 0.9;
}

.stage-dot {
    position: absolute;
    border-radius: 50%;
}

.stage-dot--1 {
    top: -1rem;
    right: -1rem;
    width: 2rem;
    height: 2rem;
    background: hsl(var(--color-secondary));
}

.stage-dot--2 {
    bottom: -1rem;
    left: -1rem;
    width: 1.5rem;
    height: 1.5rem;
    background: hsl(var(--color-primary));
}

.stage-info {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.stage-title {
    font-size: 1.5rem;
    font-weight: 700;
}

@media (min-width: 768px) {
    .stage-title {
        font-size: 1.875rem;
    }
}

.stage-description {
    font-size: 1.125rem;
    color: hsl(var(--color-muted-foreground));
    line-height: 1.7;
}

.stage-highlights h4 {
    font-weight: 600;
    margin-bottom: 0.75rem;
}

.highlights-list {
    display: grid;
    gap: 0.75rem;
    list-style: none;
}

@media (min-width: 640px) {
    .highlights-list {
        grid-template-columns: repeat(2, 1fr);
    }
}

.highlights-list li {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: hsl(var(--color-muted-foreground));
}

.highlight-dot {
    width: 0.5rem;
    height: 0.5rem;
    background: hsl(var(--color-secondary));
    border-radius: 50%;
    flex-shrink: 0;
}

.stage-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: hsl(var(--color-primary));
    font-weight: 600;
    text-decoration: none;
    padding-top: 1rem;
}

.stage-link:hover {
    text-decoration: underline;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.stage-tab');
    const contents = document.querySelectorAll('.stage-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const stage = this.dataset.stage;

            // Update tabs
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            // Update content
            contents.forEach(content => {
                content.classList.remove('active');
                if (content.dataset.stageContent === stage) {
                    content.classList.add('active');
                }
            });
        });
    });
});
</script>
