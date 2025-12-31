<?php
/**
 * Front Page Template
 *
 * @package KIDazzle
 */

get_header();
?>

<main class="front-page">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-background">
            <div class="hero-gradient"></div>
            <div class="hero-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
            </div>
        </div>
        
        <div class="hero-content">
            <div class="hero-badges">
                <span class="badge badge-primary">Now Enrolling</span>
                <span class="badge badge-outline"><i data-lucide="award"></i> Since 1994</span>
            </div>
            
            <h1>Where Learning<br>is Fun!</h1>
            
            <p class="hero-description">
                From Memphis to Miami to Atlanta, we are an independent, premier learning academy nurturing diverse bright minds for over three decades.
            </p>
            
            <div class="hero-buttons">
                <a href="<?php echo home_url('/locations'); ?>" class="btn btn-primary">
                    Find Your Center <i data-lucide="arrow-right"></i>
                </a>
                <a href="<?php echo home_url('/about'); ?>" class="btn btn-outline">
                    Our Legacy
                </a>
            </div>
        </div>
    </section>

    <!-- Regional Map Section -->
    <section class="regional-section">
        <div class="container">
            <div class="section-header">
                <span class="section-label">A Southern Regional Powerhouse</span>
                <h2>Defining Excellence Across the Southeast</h2>
            </div>
            
            <div class="region-cards">
                <!-- Tennessee -->
                <div class="region-card">
                    <div class="region-image tennessee">
                        <div class="state-outline"></div>
                    </div>
                    <div class="region-info">
                        <span class="region-state"><i data-lucide="map-pin"></i> Tennessee</span>
                        <h3>Memphis</h3>
                        <p>Soul, Rhythm, & Rigor.</p>
                        <a href="<?php echo home_url('/locations/memphis'); ?>" class="region-link">
                            View Center <i data-lucide="arrow-right"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Georgia (HQ) -->
                <div class="region-card featured">
                    <div class="region-image georgia">
                        <div class="state-outline"></div>
                    </div>
                    <span class="hq-badge"><i data-lucide="building-2"></i> HQ</span>
                    <div class="region-info">
                        <span class="region-state"><i data-lucide="map-pin"></i> Georgia</span>
                        <h3>Atlanta</h3>
                        <p>Our Headquarters.</p>
                        <a href="<?php echo home_url('/locations'); ?>" class="region-link">
                            View 5 Locations <i data-lucide="arrow-right"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Florida -->
                <div class="region-card">
                    <div class="region-image florida">
                        <div class="state-outline"></div>
                    </div>
                    <div class="region-info">
                        <span class="region-state"><i data-lucide="map-pin"></i> Florida</span>
                        <h3>Doral</h3>
                        <p>Sunshine & STEM.</p>
                        <a href="<?php echo home_url('/locations/miami'); ?>" class="region-link">
                            View Center <i data-lucide="arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Origin Story Section -->
    <section class="origin-section">
        <div class="container">
            <div class="origin-grid">
                <div class="origin-content">
                    <span class="section-label">Our Origins</span>
                    <div class="origin-divider"></div>
                    <h2>From a Women's Shelter to a Regional Standard</h2>
                    
                    <div class="origin-text">
                        <p>
                            KIDazzle's journey began 31 years ago with a mission rooted in compassion and necessity. We started within the walls of a women's shelter, dedicated to providing a safe haven and educational foundation for families in transition. That spark of service ignited a movement.
                        </p>
                        <p>
                            Driven by the belief that high-quality care is a right, not a privilege, we expanded purposefully into urban areas where elite early education was often out of reach. Today, whether in the heart of Atlanta, the soul of Memphis, or the vibrancy of Doral, our promise remains the same: high-quality child care anywhere we go.
                        </p>
                        <p class="origin-highlight">
                            <i data-lucide="heart"></i>
                            <span>We are more than a daycare; we are a community institution always open to new opportunities to educate young minds and lift up the next generation.</span>
                        </p>
                    </div>
                    
                    <a href="<?php echo home_url('/about'); ?>" class="btn btn-primary">
                        Read Our Full Story <i data-lucide="arrow-right"></i>
                    </a>
                </div>
                
                <div class="origin-images">
                    <div class="origin-image-grid">
                        <div class="origin-img origin-img-1"></div>
                        <div class="origin-img origin-img-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KIDazzle Difference Section -->
    <section class="difference-section">
        <div class="container">
            <div class="section-header centered">
                <h2>The KIDazzle Difference</h2>
                <p>We are not a franchise. We are a family of independent schools connected by a shared mission.</p>
            </div>
            
            <div class="difference-grid">
                <div class="difference-card">
                    <div class="difference-icon">
                        <i data-lucide="chef-hat"></i>
                    </div>
                    <h3>Chef-Prepared Nutrition</h3>
                    <p>Our commercial-grade kitchens serve fresh, hot meals prepared daily by professional chefs. We accommodate all dietary needs.</p>
                    <a href="<?php echo home_url('/programs'); ?>" class="card-link">
                        Learn More <i data-lucide="arrow-right"></i>
                    </a>
                </div>
                
                <div class="difference-card">
                    <div class="difference-icon">
                        <i data-lucide="book-open"></i>
                    </div>
                    <h3>Creative Curriculum®</h3>
                    <p>Research-based learning tailored to each developmental stage. Every activity has a learning purpose.</p>
                    <a href="<?php echo home_url('/programs'); ?>" class="card-link">
                        Learn More <i data-lucide="arrow-right"></i>
                    </a>
                </div>
                
                <div class="difference-card">
                    <div class="difference-icon">
                        <i data-lucide="shield-check"></i>
                    </div>
                    <h3>Safety & Security</h3>
                    <p>Your peace of mind is our priority with secure keypad entry and monitored surveillance. We maintain rigorous safety protocols.</p>
                    <a href="<?php echo home_url('/about'); ?>" class="card-link">
                        Learn More <i data-lucide="arrow-right"></i>
                    </a>
                </div>
                
                <div class="difference-card">
                    <div class="difference-icon">
                        <i data-lucide="users"></i>
                    </div>
                    <h3>Dedicated Staff</h3>
                    <p>We pride ourselves on low turnover and a team of tenured educators who truly know your child. Our staff receives ongoing training to provide the highest quality care.</p>
                    <a href="<?php echo home_url('/careers'); ?>" class="card-link">
                        Learn More <i data-lucide="arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Growth Journey Section -->
    <section class="journey-section">
        <div class="container">
            <div class="section-header centered">
                <h2>The KIDazzle Growth Journey</h2>
                <p>See how our curriculum adapts to your child's developing mind at every stage.</p>
            </div>
            
            <div class="journey-timeline">
                <div class="timeline-track">
                    <div class="timeline-progress"></div>
                </div>
                
                <div class="journey-stages">
                    <div class="journey-stage">
                        <div class="stage-marker">
                            <i data-lucide="baby"></i>
                        </div>
                        <div class="stage-content">
                            <h4>Infants</h4>
                            <p>6 weeks - 12 months</p>
                        </div>
                    </div>
                    
                    <div class="journey-stage">
                        <div class="stage-marker">
                            <i data-lucide="footprints"></i>
                        </div>
                        <div class="stage-content">
                            <h4>Toddlers</h4>
                            <p>1 - 2 years</p>
                        </div>
                    </div>
                    
                    <div class="journey-stage">
                        <div class="stage-marker">
                            <i data-lucide="puzzle"></i>
                        </div>
                        <div class="stage-content">
                            <h4>Twos</h4>
                            <p>2 - 3 years</p>
                        </div>
                    </div>
                    
                    <div class="journey-stage">
                        <div class="stage-marker">
                            <i data-lucide="palette"></i>
                        </div>
                        <div class="stage-content">
                            <h4>Preschool</h4>
                            <p>3 - 4 years</p>
                        </div>
                    </div>
                    
                    <div class="journey-stage">
                        <div class="stage-marker">
                            <i data-lucide="graduation-cap"></i>
                        </div>
                        <div class="stage-content">
                            <h4>Pre-K</h4>
                            <p>4 - 5 years</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Start Your Journey?</h2>
                <p>Schedule a tour today and see why families have trusted us for 31 years.</p>
                
                <div class="cta-logos">
                    <div class="logo-badge"><i data-lucide="award"></i></div>
                    <div class="logo-badge"><i data-lucide="shield-check"></i></div>
                    <div class="logo-badge"><i data-lucide="star"></i></div>
                </div>
                
                <a href="<?php echo home_url('/locations'); ?>" class="btn btn-white">
                    View Locations
                </a>
            </div>
        </div>
    </section>
</main>

<style>
/* ===== FRONT PAGE STYLES ===== */

/* Hero Section */
.hero-section {
    position: relative;
    min-height: 90vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    padding: 6rem 1.5rem;
}

.hero-background {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #FF6B35 0%, #FF8C5A 50%, #FFB088 100%);
}

.hero-gradient {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 30% 20%, rgba(255,255,255,0.2) 0%, transparent 50%);
}

.hero-shapes .shape {
    position: absolute;
    border-radius: 50%;
    opacity: 0.1;
    background: white;
}

.hero-shapes .shape-1 {
    width: 400px;
    height: 400px;
    top: -100px;
    right: -100px;
}

.hero-shapes .shape-2 {
    width: 300px;
    height: 300px;
    bottom: -50px;
    left: -50px;
}

.hero-shapes .shape-3 {
    width: 150px;
    height: 150px;
    top: 50%;
    left: 20%;
}

.hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    max-width: 800px;
    color: white;
}

.hero-badges {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

.badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 9999px;
    font-size: 0.875rem;
    font-weight: 600;
}

.badge-primary {
    background: white;
    color: #FF6B35;
}

.badge-outline {
    background: transparent;
    border: 2px solid rgba(255,255,255,0.5);
    color: white;
}

.badge svg {
    width: 16px;
    height: 16px;
}

.hero-section h1 {
    font-size: clamp(2.5rem, 8vw, 5rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 1.5rem;
    text-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.hero-description {
    font-size: 1.25rem;
    opacity: 0.95;
    max-width: 600px;
    margin: 0 auto 2.5rem;
    line-height: 1.7;
}

.hero-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn svg {
    width: 18px;
    height: 18px;
}

.btn-primary {
    background: white;
    color: #FF6B35;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.btn-outline {
    background: transparent;
    color: white;
    border: 2px solid rgba(255,255,255,0.5);
}

.btn-outline:hover {
    background: rgba(255,255,255,0.1);
    border-color: white;
}

.btn-white {
    background: white;
    color: #FF6B35;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.btn-white:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

/* Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.5rem;
}

/* Section Headers */
.section-header {
    margin-bottom: 3rem;
}

.section-header.centered {
    text-align: center;
}

.section-label {
    display: inline-block;
    font-size: 0.875rem;
    font-weight: 600;
    color: #FF6B35;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.75rem;
}

.section-header h2 {
    font-size: 2.5rem;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 1rem;
}

.section-header p {
    font-size: 1.125rem;
    color: #6b7280;
    max-width: 600px;
}

.section-header.centered p {
    margin: 0 auto;
}

/* Regional Section */
.regional-section {
    padding: 6rem 0;
    background: #f8f9fa;
}

.region-cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
}

@media (max-width: 968px) {
    .region-cards {
        grid-template-columns: 1fr;
        max-width: 400px;
        margin: 0 auto;
    }
}

.region-card {
    position: relative;
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.region-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.12);
}

.region-card.featured {
    border: 3px solid #FF6B35;
}

.hq-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: #FF6B35;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 0.25rem;
    z-index: 10;
}

.hq-badge svg {
    width: 12px;
    height: 12px;
}

.region-image {
    height: 180px;
    background: linear-gradient(135deg, #e5e7eb 0%, #d1d5db 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.region-image.tennessee {
    background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);
}

.region-image.georgia {
    background: linear-gradient(135deg, #FF6B35 0%, #FF8C5A 100%);
}

.region-image.florida {
    background: linear-gradient(135deg, #10B981 0%, #059669 100%);
}

.region-info {
    padding: 1.5rem;
}

.region-state {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    font-size: 0.75rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.region-state svg {
    width: 12px;
    height: 12px;
}

.region-info h3 {
    font-size: 1.5rem;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 0.25rem;
}

.region-info p {
    color: #6b7280;
    margin-bottom: 1rem;
}

.region-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #FF6B35;
    font-weight: 600;
    text-decoration: none;
}

.region-link svg {
    width: 16px;
    height: 16px;
    transition: transform 0.3s ease;
}

.region-link:hover svg {
    transform: translateX(4px);
}

/* Origin Section */
.origin-section {
    padding: 6rem 0;
    background: white;
}

.origin-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}

@media (max-width: 968px) {
    .origin-grid {
        grid-template-columns: 1fr;
    }
}

.origin-divider {
    width: 60px;
    height: 4px;
    background: #FF6B35;
    margin: 1rem 0;
    border-radius: 2px;
}

.origin-content h2 {
    font-size: 2.25rem;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 2rem;
    line-height: 1.2;
}

.origin-text p {
    color: #4b5563;
    line-height: 1.8;
    margin-bottom: 1.5rem;
}

.origin-highlight {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.5rem;
    background: #fff7ed;
    border-radius: 12px;
    border-left: 4px solid #FF6B35;
}

.origin-highlight svg {
    width: 24px;
    height: 24px;
    color: #FF6B35;
    flex-shrink: 0;
    margin-top: 2px;
}

.origin-images {
    display: flex;
    justify-content: center;
}

.origin-image-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.origin-img {
    height: 250px;
    background: linear-gradient(135deg, #FF6B35 0%, #FF8C5A 100%);
    border-radius: 16px;
}

.origin-img-1 {
    transform: translateY(-20px);
}

.origin-img-2 {
    transform: translateY(20px);
}

/* Difference Section */
.difference-section {
    padding: 6rem 0;
    background: #f8f9fa;
}

.difference-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
}

@media (max-width: 1024px) {
    .difference-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 640px) {
    .difference-grid {
        grid-template-columns: 1fr;
    }
}

.difference-card {
    background: white;
    padding: 2rem;
    border-radius: 16px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.difference-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.difference-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #FF6B35 0%, #FF8C5A 100%);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
}

.difference-icon svg {
    width: 28px;
    height: 28px;
    color: white;
}

.difference-card h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.75rem;
}

.difference-card p {
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 1rem;
    font-size: 0.95rem;
}

.card-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #FF6B35;
    font-weight: 600;
    text-decoration: none;
    font-size: 0.875rem;
}

.card-link svg {
    width: 14px;
    height: 14px;
    transition: transform 0.3s ease;
}

.card-link:hover svg {
    transform: translateX(4px);
}

/* Journey Section */
.journey-section {
    padding: 6rem 0;
    background: white;
}

.journey-timeline {
    position: relative;
    padding: 3rem 0;
}

.timeline-track {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 4px;
    background: #e5e7eb;
    transform: translateY(-50%);
}

.timeline-progress {
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, #FF6B35 0%, #FF8C5A 100%);
    border-radius: 2px;
}

.journey-stages {
    display: flex;
    justify-content: space-between;
    position: relative;
    z-index: 10;
}

@media (max-width: 768px) {
    .journey-stages {
        flex-direction: column;
        gap: 2rem;
    }
    
    .timeline-track {
        width: 4px;
        height: 100%;
        left: 30px;
        right: auto;
        top: 0;
        transform: none;
    }
}

.journey-stage {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

@media (max-width: 768px) {
    .journey-stage {
        flex-direction: row;
        text-align: left;
        gap: 1rem;
    }
}

.stage-marker {
    width: 60px;
    height: 60px;
    background: white;
    border: 4px solid #FF6B35;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
}

.stage-marker svg {
    width: 24px;
    height: 24px;
    color: #FF6B35;
}

.stage-content h4 {
    font-size: 1rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.25rem;
}

.stage-content p {
    font-size: 0.875rem;
    color: #6b7280;
}

/* CTA Section */
.cta-section {
    padding: 6rem 0;
    background: linear-gradient(135deg, #FF6B35 0%, #FF8C5A 100%);
}

.cta-content {
    text-align: center;
    color: white;
    max-width: 600px;
    margin: 0 auto;
}

.cta-content h2 {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
}

.cta-content p {
    font-size: 1.125rem;
    opacity: 0.95;
    margin-bottom: 2rem;
}

.cta-logos {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 2rem;
}

.logo-badge {
    width: 50px;
    height: 50px;
    background: rgba(255,255,255,0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.logo-badge svg {
    width: 24px;
    height: 24px;
    color: white;
}
</style>

<?php get_footer(); ?>
