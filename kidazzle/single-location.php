<?php
/**
 * Template Name: Single Location
 * Template for displaying individual location pages
 */

get_header();

// Location data - can be customized per page or pulled from custom fields
$location_slug = get_post_field('post_name', get_post());

$locations = array(
    'college-park' => array(
        'name' => 'College Park',
        'state' => 'GA',
        'tagline' => 'Where little learners take flight.',
        'description' => 'Welcome to KIDazzle College Park. Located just a hop from Hartsfield-Jackson Airport, we serve families in the tri-cities area with a world of wonder inside. Our program emphasizes STEAM education and provides convenient transportation options.',
        'address' => '1701 Columbia Ave',
        'city' => 'College Park, GA 30337',
        'phone' => '(404) 305-6950',
        'email' => 'collegepark@kidazzle.com',
        'features' => array(
            array('icon' => 'plane', 'title' => 'Near Airport', 'desc' => 'Convenient Location'),
            array('icon' => 'flask-conical', 'title' => 'STEAM Focus', 'desc' => 'Science & Tech'),
            array('icon' => 'bus', 'title' => 'Transportation', 'desc' => 'School Pick-Up'),
        ),
        'hero_image' => 'college-park-hero.jpg',
    ),
    'west-end' => array(
        'name' => 'West End',
        'state' => 'GA',
        'tagline' => 'Nurturing young minds in historic West End.',
        'description' => 'Welcome to KIDazzle West End. Located in the heart of historic West End Atlanta, we provide exceptional early childhood education with a focus on community and cultural enrichment.',
        'address' => '858 Oak Street SW',
        'city' => 'Atlanta, GA 30310',
        'phone' => '(404) 555-0123',
        'email' => 'westend@kidazzle.com',
        'features' => array(
            array('icon' => 'heart', 'title' => 'Community Focus', 'desc' => 'Local Partnerships'),
            array('icon' => 'palette', 'title' => 'Arts Program', 'desc' => 'Creative Expression'),
            array('icon' => 'users', 'title' => 'Small Classes', 'desc' => 'Individual Attention'),
        ),
        'hero_image' => 'west-end-hero.jpg',
    ),
    'midtown' => array(
        'name' => 'Midtown',
        'state' => 'GA',
        'tagline' => 'Excellence in the heart of the city.',
        'description' => 'Welcome to KIDazzle Midtown. Our flagship location offers state-of-the-art facilities in the heart of Atlanta, perfect for busy professionals who want the best for their children.',
        'address' => '1250 Peachtree Street NE',
        'city' => 'Atlanta, GA 30309',
        'phone' => '(404) 555-0456',
        'email' => 'midtown@kidazzle.com',
        'features' => array(
            array('icon' => 'building-2', 'title' => 'Modern Facility', 'desc' => 'State-of-the-Art'),
            array('icon' => 'clock', 'title' => 'Extended Hours', 'desc' => 'Flexible Schedule'),
            array('icon' => 'salad', 'title' => 'Organic Meals', 'desc' => 'Healthy Nutrition'),
        ),
        'hero_image' => 'midtown-hero.jpg',
    ),
);

// Get current location data or use default
$current_location = isset($locations[$location_slug]) ? $locations[$location_slug] : $locations['college-park'];
?>

<main class="single-location-page">
    <!-- Breadcrumb -->
    <nav class="location-breadcrumb">
        <div class="container">
            <a href="<?php echo home_url(); ?>">Home</a>
            <span class="separator">›</span>
            <a href="<?php echo home_url('/locations'); ?>">Locations</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="location-hero">
        <div class="hero-content">
            <div class="location-badge">
                <i data-lucide="map-pin"></i>
                <i data-lucide="star"></i>
            </div>
            <p class="location-state"><?php echo esc_html($current_location['city']); ?></p>
            <h1><?php echo esc_html($current_location['name']); ?> Center</h1>
            <p class="tagline"><?php echo esc_html($current_location['tagline']); ?></p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="location-content">
        <div class="container">
            <div class="content-grid">
                <!-- Left Column: About & Booking -->
                <div class="main-column">
                    <!-- About Section -->
                    <div class="about-card">
                        <h2>About This Center</h2>
                        <p><?php echo esc_html($current_location['description']); ?></p>
                        
                        <div class="features-grid">
                            <?php foreach ($current_location['features'] as $feature) : ?>
                            <div class="feature-item">
                                <i data-lucide="<?php echo esc_attr($feature['icon']); ?>"></i>
                                <h3><?php echo esc_html($feature['title']); ?></h3>
                                <p><?php echo esc_html($feature['desc']); ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Booking Section -->
                    <div class="booking-card">
                        <h2><i data-lucide="calendar"></i> Book a Tour</h2>
                        <div class="calendar-placeholder">
                            <i data-lucide="calendar-days"></i>
                            <p>Calendar Embed Placeholder</p>
                            <!-- Add your booking calendar embed code here -->
                        </div>
                    </div>

                    <!-- Map Section -->
                    <div class="map-card">
                        <p>Google Map Embed Placeholder (<?php echo esc_html($current_location['name']); ?>)</p>
                        <!-- Add your Google Maps embed code here -->
                    </div>
                </div>

                <!-- Right Column: Contact Info -->
                <div class="sidebar-column">
                    <div class="contact-card">
                        <h2>Contact Info</h2>
                        <div class="contact-details">
                            <p>
                                <i data-lucide="map-pin"></i>
                                <?php echo esc_html($current_location['address']); ?><br>
                                <?php echo esc_html($current_location['city']); ?>
                            </p>
                            <p>
                                <i data-lucide="phone"></i>
                                <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $current_location['phone']); ?>">
                                    <?php echo esc_html($current_location['phone']); ?>
                                </a>
                            </p>
                            <p>
                                <i data-lucide="mail"></i>
                                <a href="mailto:<?php echo esc_attr($current_location['email']); ?>">
                                    <?php echo esc_html($current_location['email']); ?>
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="questions-card">
                        <h2>Have Questions?</h2>
                        <div class="form-placeholder">
                            <p>Contact Form Placeholder</p>
                            <!-- Add your contact form shortcode here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
/* Single Location Page Styles */
.single-location-page {
    background: #f8f9fa;
}

/* Breadcrumb */
.location-breadcrumb {
    background: #fff;
    padding: 1rem 0;
    border-bottom: 1px solid #e5e7eb;
}

.location-breadcrumb .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.5rem;
    font-size: 0.875rem;
    color: #6b7280;
}

.location-breadcrumb a {
    color: #6b7280;
    text-decoration: none;
}

.location-breadcrumb a:hover {
    color: #FF6B35;
}

.location-breadcrumb .separator {
    margin: 0 0.5rem;
}

/* Hero Section */
.location-hero {
    background: linear-gradient(135deg, #FF6B35 0%, #FF8C5A 100%);
    padding: 4rem 1.5rem;
    text-align: center;
    color: white;
}

.hero-content {
    max-width: 800px;
    margin: 0 auto;
}

.location-badge {
    display: inline-flex;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.location-badge svg {
    width: 24px;
    height: 24px;
}

.location-state {
    font-size: 1rem;
    opacity: 0.9;
    margin-bottom: 0.5rem;
}

.location-hero h1 {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
}

.location-hero .tagline {
    font-size: 1.25rem;
    opacity: 0.9;
}

/* Main Content */
.location-content {
    padding: 3rem 0;
}

.location-content .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.5rem;
}

.content-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 2rem;
}

@media (max-width: 768px) {
    .content-grid {
        grid-template-columns: 1fr;
    }
}

/* Cards */
.about-card,
.booking-card,
.map-card,
.contact-card,
.questions-card {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.about-card h2,
.booking-card h2,
.contact-card h2,
.questions-card h2 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.about-card h2 svg,
.booking-card h2 svg {
    color: #FF6B35;
}

.about-card p {
    color: #4b5563;
    line-height: 1.7;
    margin-bottom: 1.5rem;
}

/* Features Grid */
.features-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}

@media (max-width: 640px) {
    .features-grid {
        grid-template-columns: 1fr;
    }
}

.feature-item {
    background: #f9fafb;
    padding: 1.25rem;
    border-radius: 12px;
    text-align: center;
}

.feature-item svg {
    width: 32px;
    height: 32px;
    color: #FF6B35;
    margin-bottom: 0.75rem;
}

.feature-item h3 {
    font-size: 0.875rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.25rem;
}

.feature-item p {
    font-size: 0.75rem;
    color: #6b7280;
    margin: 0;
}

/* Calendar & Map Placeholders */
.calendar-placeholder,
.map-card,
.form-placeholder {
    background: #f3f4f6;
    border: 2px dashed #d1d5db;
    border-radius: 12px;
    padding: 3rem;
    text-align: center;
    color: #6b7280;
}

.calendar-placeholder svg {
    width: 48px;
    height: 48px;
    margin-bottom: 1rem;
    color: #9ca3af;
}

/* Contact Card */
.contact-details p {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    margin-bottom: 1rem;
    color: #4b5563;
}

.contact-details svg {
    width: 20px;
    height: 20px;
    color: #FF6B35;
    flex-shrink: 0;
    margin-top: 2px;
}

.contact-details a {
    color: #4b5563;
    text-decoration: none;
}

.contact-details a:hover {
    color: #FF6B35;
}
</style>

<?php get_footer(); ?>
