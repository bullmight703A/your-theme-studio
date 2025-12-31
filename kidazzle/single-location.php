<?php
/**
 * Template Name: Single Location
 * Template for displaying individual location pages
 */

get_header();

// Location data - can be customized per page or pulled from custom fields
$location_slug = get_post_field('post_name', get_post());

$locations = array(
    // Georgia Locations
    'college-park' => array(
        'name' => 'College Park',
        'state' => 'GA',
        'city_full' => 'College Park, GA 30337',
        'tagline' => 'Where little learners take flight.',
        'description' => 'Welcome to KIDazzle College Park. Located just a hop from Hartsfield-Jackson Airport, we serve families in the tri-cities area with a world of wonder inside. Our program emphasizes STEAM education and provides convenient transportation options.',
        'address' => '1701 Columbia Ave',
        'phone' => '(404) 305-6950',
        'email' => 'collegepark@kidazzle.com',
        'features' => array(
            array('icon' => 'plane', 'title' => 'Near Airport', 'desc' => 'Convenient Location'),
            array('icon' => 'flask-conical', 'title' => 'STEAM Focus', 'desc' => 'Science & Tech'),
            array('icon' => 'bus', 'title' => 'Transportation', 'desc' => 'School Pick-Up'),
        ),
        'region' => 'Georgia',
    ),
    'west-end' => array(
        'name' => 'West End',
        'state' => 'GA',
        'city_full' => 'Atlanta, GA 30310',
        'tagline' => 'Nurturing young minds in historic West End.',
        'description' => 'Welcome to KIDazzle West End. Located in the heart of historic West End Atlanta, we provide exceptional early childhood education with a focus on community and cultural enrichment. Our center serves the vibrant West End community with pride.',
        'address' => '858 Oak Street SW',
        'phone' => '(404) 555-0123',
        'email' => 'westend@kidazzle.com',
        'features' => array(
            array('icon' => 'heart', 'title' => 'Community Focus', 'desc' => 'Local Partnerships'),
            array('icon' => 'palette', 'title' => 'Arts Program', 'desc' => 'Creative Expression'),
            array('icon' => 'users', 'title' => 'Small Classes', 'desc' => 'Individual Attention'),
        ),
        'region' => 'Georgia',
    ),
    'midtown' => array(
        'name' => 'Midtown',
        'state' => 'GA',
        'city_full' => 'Atlanta, GA 30309',
        'tagline' => 'Excellence in the heart of the city.',
        'description' => 'Welcome to KIDazzle Midtown. Our flagship Atlanta location offers state-of-the-art facilities in the heart of the city, perfect for busy professionals who want the best for their children. Experience premium early education in Midtown.',
        'address' => '1250 Peachtree Street NE',
        'phone' => '(404) 555-0456',
        'email' => 'midtown@kidazzle.com',
        'features' => array(
            array('icon' => 'building-2', 'title' => 'Modern Facility', 'desc' => 'State-of-the-Art'),
            array('icon' => 'clock', 'title' => 'Extended Hours', 'desc' => 'Flexible Schedule'),
            array('icon' => 'salad', 'title' => 'Organic Meals', 'desc' => 'Healthy Nutrition'),
        ),
        'region' => 'Georgia',
    ),
    'hampton' => array(
        'name' => 'Hampton',
        'state' => 'GA',
        'city_full' => 'Hampton, GA 30228',
        'tagline' => 'Growing bright futures in Henry County.',
        'description' => 'Welcome to KIDazzle Hampton. Serving Henry County families with our signature blend of educational excellence and nurturing care. Our Hampton center provides a warm, welcoming environment for children to learn, grow, and thrive.',
        'address' => '123 Main Street',
        'phone' => '(770) 555-0789',
        'email' => 'hampton@kidazzle.com',
        'features' => array(
            array('icon' => 'trees', 'title' => 'Outdoor Play', 'desc' => 'Nature Learning'),
            array('icon' => 'book-open', 'title' => 'Literacy Focus', 'desc' => 'Early Reading'),
            array('icon' => 'music', 'title' => 'Music Program', 'desc' => 'Creative Arts'),
        ),
        'region' => 'Georgia',
    ),
    'federal-center' => array(
        'name' => 'Atlanta Federal Center',
        'state' => 'GA',
        'city_full' => 'Atlanta, GA 30303',
        'tagline' => 'Downtown excellence for working families.',
        'description' => 'Welcome to KIDazzle Atlanta Federal Center. Located in the heart of downtown Atlanta, we serve government employees and downtown professionals with convenient, high-quality child care. Our center provides a secure, nurturing environment steps from MARTA.',
        'address' => '100 Alabama St SW',
        'phone' => '(404) 555-1234',
        'email' => 'federalcenter@kidazzle.com',
        'features' => array(
            array('icon' => 'train', 'title' => 'Near MARTA', 'desc' => 'Easy Commute'),
            array('icon' => 'shield-check', 'title' => 'Secure Entry', 'desc' => 'Federal Standards'),
            array('icon' => 'clock', 'title' => 'Government Hours', 'desc' => 'Flexible Schedule'),
        ),
        'region' => 'Georgia',
    ),
    // Tennessee Location
    'memphis' => array(
        'name' => 'Memphis',
        'state' => 'TN',
        'city_full' => 'Memphis, TN 38103',
        'tagline' => 'Soul, rhythm, and rigor.',
        'description' => 'Welcome to KIDazzle Memphis. Bringing our signature blend of educational excellence to the soul of Tennessee. Our Memphis center celebrates the rich cultural heritage of the city while providing world-class early childhood education.',
        'address' => '456 Beale Street',
        'phone' => '(901) 555-0001',
        'email' => 'memphis@kidazzle.com',
        'features' => array(
            array('icon' => 'music', 'title' => 'Music Heritage', 'desc' => 'Cultural Arts'),
            array('icon' => 'heart', 'title' => 'Community Roots', 'desc' => 'Local Focus'),
            array('icon' => 'star', 'title' => 'Quality Rated', 'desc' => 'TN Excellence'),
        ),
        'region' => 'Tennessee',
    ),
    // Florida Location
    'miami' => array(
        'name' => 'Doral',
        'state' => 'FL',
        'city_full' => 'Doral, FL 33166',
        'tagline' => 'Sunshine and STEM.',
        'description' => 'Welcome to KIDazzle Doral. Our Florida location brings South Florida families our signature approach to early education with a special emphasis on STEM learning. Located in the vibrant Doral community, we celebrate diversity and bilingual education.',
        'address' => '789 NW 87th Avenue',
        'phone' => '(305) 555-0002',
        'email' => 'doral@kidazzle.com',
        'features' => array(
            array('icon' => 'flask-conical', 'title' => 'STEM Focus', 'desc' => 'Science & Tech'),
            array('icon' => 'languages', 'title' => 'Bilingual', 'desc' => 'English & Spanish'),
            array('icon' => 'sun', 'title' => 'Outdoor Learning', 'desc' => 'Year-Round'),
        ),
        'region' => 'Florida',
    ),
    'doral' => array(
        'name' => 'Doral',
        'state' => 'FL',
        'city_full' => 'Doral, FL 33166',
        'tagline' => 'Sunshine and STEM.',
        'description' => 'Welcome to KIDazzle Doral. Our Florida location brings South Florida families our signature approach to early education with a special emphasis on STEM learning. Located in the vibrant Doral community, we celebrate diversity and bilingual education.',
        'address' => '789 NW 87th Avenue',
        'phone' => '(305) 555-0002',
        'email' => 'doral@kidazzle.com',
        'features' => array(
            array('icon' => 'flask-conical', 'title' => 'STEM Focus', 'desc' => 'Science & Tech'),
            array('icon' => 'languages', 'title' => 'Bilingual', 'desc' => 'English & Spanish'),
            array('icon' => 'sun', 'title' => 'Outdoor Learning', 'desc' => 'Year-Round'),
        ),
        'region' => 'Florida',
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
            <p class="location-state"><?php echo esc_html($current_location['city_full']); ?></p>
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
                            <p>Paste <?php echo esc_html($current_location['name']); ?> Calendar Embed Here</p>
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
                                <span>
                                    <?php echo esc_html($current_location['address']); ?><br>
                                    <?php echo esc_html($current_location['city_full']); ?>
                                </span>
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
                            <p>Embed Location Form Here</p>
                            <!-- Add your contact form shortcode here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Other Locations -->
    <section class="other-locations">
        <div class="container">
            <h2>Explore Other Locations</h2>
            <div class="locations-grid">
                <?php 
                $count = 0;
                foreach ($locations as $slug => $location) : 
                    if ($slug !== $location_slug && $count < 3) : 
                        $count++;
                ?>
                <a href="<?php echo home_url('/locations/' . $slug); ?>" class="location-preview-card">
                    <span class="preview-state"><?php echo esc_html($location['state']); ?></span>
                    <h3><?php echo esc_html($location['name']); ?></h3>
                    <p><?php echo esc_html($location['tagline']); ?></p>
                    <span class="preview-link">View Center <i data-lucide="arrow-right"></i></span>
                </a>
                <?php 
                    endif;
                endforeach; 
                ?>
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

.about-card > p {
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

/* Other Locations Section */
.other-locations {
    padding: 4rem 0;
    background: white;
}

.other-locations .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.5rem;
}

.other-locations h2 {
    font-size: 1.75rem;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 2rem;
    text-align: center;
}

.locations-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
}

@media (max-width: 768px) {
    .locations-grid {
        grid-template-columns: 1fr;
    }
}

.location-preview-card {
    background: #f9fafb;
    border-radius: 16px;
    padding: 1.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.location-preview-card:hover {
    border-color: #FF6B35;
    transform: translateY(-4px);
}

.preview-state {
    font-size: 0.75rem;
    font-weight: 600;
    color: #FF6B35;
    text-transform: uppercase;
}

.location-preview-card h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0.5rem 0;
}

.location-preview-card p {
    color: #6b7280;
    font-size: 0.875rem;
    margin-bottom: 1rem;
}

.preview-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #FF6B35;
    font-weight: 600;
    font-size: 0.875rem;
}

.preview-link svg {
    width: 14px;
    height: 14px;
}
</style>

<?php get_footer(); ?>
