<?php
/**
 * Template Name: Resources Page
 */
get_header();

$parent_resources = array(
    array('icon' => 'file-text', 'title' => 'Parent Handbook', 'description' => 'Everything you need to know about our policies, procedures, and programs.', 'action' => 'Download PDF', 'type' => 'download'),
    array('icon' => 'calendar', 'title' => 'Academic Calendar', 'description' => 'Important dates including holidays, events, and professional development days.', 'action' => 'View Calendar', 'type' => 'link'),
    array('icon' => 'video', 'title' => 'Parent Portal', 'description' => 'Access your child\'s daily reports, photos, and communicate with teachers.', 'action' => 'Login to Portal', 'type' => 'external'),
    array('icon' => 'message-square', 'title' => 'Newsletter Archive', 'description' => 'Stay up to date with monthly newsletters and classroom updates.', 'action' => 'View Newsletters', 'type' => 'link')
);

$development_resources = array(
    array('title' => 'Ages 0-12 Months', 'description' => 'Understanding infant development milestones and how to support your baby\'s growth.', 'topics' => array('Tummy time activities', 'Language development', 'Sleep patterns', 'Feeding transitions')),
    array('title' => 'Ages 1-2 Years', 'description' => 'Navigating the toddler years with confidence and understanding.', 'topics' => array('Walking and motor skills', 'First words and language', 'Potty training readiness', 'Emotional regulation')),
    array('title' => 'Ages 3-4 Years', 'description' => 'Preparing your preschooler for academic and social success.', 'topics' => array('Pre-literacy skills', 'Socialization', 'Creative expression', 'Independence building')),
    array('title' => 'Ages 4-5 Years', 'description' => 'Kindergarten readiness and preparing for the big transition.', 'topics' => array('Academic readiness', 'Self-help skills', 'Following directions', 'Peer relationships'))
);

$upcoming_events = array(
    array('date' => 'Jan 15', 'title' => 'Open House - West End', 'time' => '10:00 AM - 12:00 PM'),
    array('date' => 'Jan 22', 'title' => 'Parent Workshop: Positive Discipline', 'time' => '6:30 PM - 8:00 PM'),
    array('date' => 'Feb 5', 'title' => 'Valentine\'s Day Celebration', 'time' => 'All Day'),
    array('date' => 'Feb 14', 'title' => 'Parent-Teacher Conferences', 'time' => 'By Appointment')
);
?>

<!-- Hero Section -->
<section class="page-hero bg-gradient-soft">
    <div class="container-site text-center">
        <div class="badge badge-primary">
            <i data-lucide="book-open"></i>
            Parent Resources
        </div>
        <h1 class="page-title">
            Tools & Resources for <span class="text-primary">Family</span> <span class="text-secondary">Success</span>
        </h1>
        <p class="page-description">
            Access helpful resources, stay connected with our community, and support your child's development at home.
        </p>
    </div>
</section>

<!-- Quick Links -->
<section class="section-padding">
    <div class="container-site">
        <div class="resources-grid">
            <?php foreach ($parent_resources as $resource) : ?>
                <div class="resource-card card">
                    <div class="resource-icon">
                        <i data-lucide="<?php echo esc_attr($resource['icon']); ?>"></i>
                    </div>
                    <h3><?php echo esc_html($resource['title']); ?></h3>
                    <p><?php echo esc_html($resource['description']); ?></p>
                    <a href="#" class="resource-link">
                        <?php echo esc_html($resource['action']); ?>
                        <?php if ($resource['type'] === 'external') : ?>
                            <i data-lucide="external-link"></i>
                        <?php elseif ($resource['type'] === 'download') : ?>
                            <i data-lucide="download"></i>
                        <?php else : ?>
                            <i data-lucide="arrow-right"></i>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Development Resources -->
<section class="section-padding bg-muted">
    <div class="container-site">
        <div class="section-header text-center">
            <h2 class="section-title"><span class="text-secondary">Development</span> by Age</h2>
            <p class="section-description">Helpful information and activities to support your child's growth at each stage.</p>
        </div>
        <div class="development-grid">
            <?php foreach ($development_resources as $resource) : ?>
                <div class="development-card card">
                    <h3><?php echo esc_html($resource['title']); ?></h3>
                    <p class="development-desc"><?php echo esc_html($resource['description']); ?></p>
                    <div class="development-topics">
                        <?php foreach ($resource['topics'] as $topic) : ?>
                            <div class="topic-item">
                                <span class="topic-dot"></span>
                                <?php echo esc_html($topic); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Upcoming Events -->
<section class="section-padding">
    <div class="container-site">
        <div class="events-layout">
            <div class="events-content">
                <h2 class="section-title">Upcoming <span class="text-primary">Events</span></h2>
                <p class="section-description">Join us for community events, workshops, and celebrations throughout the year.</p>
                <div class="events-list">
                    <?php foreach ($upcoming_events as $event) : ?>
                        <div class="event-item">
                            <div class="event-date">
                                <p class="event-year">2025</p>
                                <p class="event-day"><?php echo esc_html($event['date']); ?></p>
                            </div>
                            <div>
                                <h4 class="event-title"><?php echo esc_html($event['title']); ?></h4>
                                <p class="event-time"><?php echo esc_html($event['time']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="events-cta">
                <div class="events-cta-box">
                    <div class="events-emoji">📅</div>
                    <h3>Stay Connected</h3>
                    <p>Get updates on events, activities, and important announcements delivered to your inbox.</p>
                    <a href="#" class="btn btn-secondary">
                        Subscribe to Newsletter
                        <i data-lucide="arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Community Section -->
<section class="section-padding bg-muted">
    <div class="container-site">
        <div class="section-header text-center">
            <h2 class="section-title">Join Our <span class="text-secondary">Community</span></h2>
            <p class="section-description">Connect with other KIDazzle families and stay engaged with your child's education.</p>
        </div>
        <div class="community-grid">
            <div class="community-card card">
                <div class="community-icon community-icon--blue">
                    <i data-lucide="users"></i>
                </div>
                <h3>Parent Facebook Group</h3>
                <p>Connect with other families, share experiences, and build community.</p>
                <a href="#" class="btn btn-outline">Join Group <i data-lucide="external-link"></i></a>
            </div>
            <div class="community-card card">
                <div class="community-icon community-icon--pink">
                    <i data-lucide="heart"></i>
                </div>
                <h3>Volunteer Opportunities</h3>
                <p>Get involved in classroom activities, field trips, and special events.</p>
                <a href="#" class="btn btn-outline">Learn More <i data-lucide="arrow-right"></i></a>
            </div>
            <div class="community-card card">
                <div class="community-icon community-icon--green">
                    <i data-lucide="message-square"></i>
                </div>
                <h3>Parent Advisory Council</h3>
                <p>Help shape the future of KIDazzle by joining our parent leadership group.</p>
                <a href="#" class="btn btn-outline">Apply Now <i data-lucide="arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/home/cta-section'); ?>

<style>
.resources-grid {
    display: grid;
    gap: 1.5rem;
}

@media (min-width: 768px) {
    .resources-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .resources-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

.resource-card {
    padding: 1.5rem;
    transition: all 0.3s ease;
}

.resource-card:hover {
    transform: translateY(-4px);
}

.resource-icon {
    width: 3rem;
    height: 3rem;
    background: hsl(var(--color-primary) / 0.1);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    transition: background 0.3s ease;
}

.resource-card:hover .resource-icon {
    background: hsl(var(--color-primary) / 0.2);
}

.resource-icon i {
    width: 1.5rem;
    height: 1.5rem;
    color: hsl(var(--color-primary));
}

.resource-card h3 {
    font-size: 1.125rem;
    margin-bottom: 0.5rem;
}

.resource-card p {
    font-size: 0.875rem;
    color: hsl(var(--color-muted-foreground));
    margin-bottom: 1rem;
}

.resource-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: hsl(var(--color-primary));
    font-weight: 500;
    font-size: 0.875rem;
    text-decoration: none;
}

.resource-link:hover {
    text-decoration: underline;
}

.resource-link i {
    width: 1rem;
    height: 1rem;
}

.development-grid {
    display: grid;
    gap: 1.5rem;
}

@media (min-width: 768px) {
    .development-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

.development-card {
    padding: 1.5rem;
}

.development-card h3 {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
}

.development-desc {
    color: hsl(var(--color-muted-foreground));
    margin-bottom: 1rem;
}

.development-topics {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.5rem;
}

.topic-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
}

.topic-dot {
    width: 0.375rem;
    height: 0.375rem;
    background: hsl(var(--color-primary));
    border-radius: 50%;
    flex-shrink: 0;
}

.events-layout {
    display: grid;
    gap: 3rem;
    align-items: center;
}

@media (min-width: 1024px) {
    .events-layout {
        grid-template-columns: 1fr 1fr;
    }
}

.events-list {
    margin-top: 1.5rem;
}

.event-item {
    display: flex;
    gap: 1rem;
    padding: 1rem;
    background: hsl(var(--color-muted) / 0.5);
    border-radius: 0.75rem;
    margin-bottom: 1rem;
}

.event-date {
    background: hsl(var(--color-primary));
    color: white;
    border-radius: 0.5rem;
    padding: 0.75rem;
    text-align: center;
    min-width: 70px;
}

.event-year {
    font-size: 0.75rem;
    text-transform: uppercase;
}

.event-day {
    font-weight: 700;
}

.event-title {
    font-weight: 600;
}

.event-time {
    font-size: 0.875rem;
    color: hsl(var(--color-muted-foreground));
}

.events-cta-box {
    background: linear-gradient(135deg, hsl(var(--color-primary) / 0.1), hsl(var(--color-secondary) / 0.1));
    border-radius: 1.5rem;
    padding: 2rem;
    text-align: center;
}

.events-emoji {
    font-size: 4rem;
    margin-bottom: 1rem;
}

.events-cta-box h3 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

.events-cta-box p {
    color: hsl(var(--color-muted-foreground));
    margin-bottom: 1.5rem;
}

.community-grid {
    display: grid;
    gap: 1.5rem;
}

@media (min-width: 768px) {
    .community-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.community-card {
    padding: 1.5rem;
    text-align: center;
}

.community-icon {
    width: 4rem;
    height: 4rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
}

.community-icon--blue {
    background: rgba(59, 130, 246, 0.1);
}

.community-icon--blue i {
    color: #3b82f6;
}

.community-icon--pink {
    background: rgba(236, 72, 153, 0.1);
}

.community-icon--pink i {
    color: #ec4899;
}

.community-icon--green {
    background: rgba(34, 197, 94, 0.1);
}

.community-icon--green i {
    color: #22c55e;
}

.community-icon i {
    width: 2rem;
    height: 2rem;
}

.community-card h3 {
    font-size: 1.125rem;
    margin-bottom: 0.5rem;
}

.community-card p {
    font-size: 0.875rem;
    color: hsl(var(--color-muted-foreground));
    margin-bottom: 1rem;
}

.bg-muted {
    background: hsl(var(--color-muted) / 0.5);
}
</style>

<?php get_footer(); ?>
