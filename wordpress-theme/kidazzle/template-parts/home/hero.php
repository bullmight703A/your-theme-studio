<?php
/**
 * Hero Section
 *
 * @package KIDazzle
 */
?>

<section class="hero bg-gradient-soft">
    <div class="hero__bg-pattern">
        <div class="hero__blob hero__blob--1"></div>
        <div class="hero__blob hero__blob--2"></div>
    </div>

    <div class="container-site">
        <div class="hero__grid">
            <!-- Content -->
            <div class="hero__content">
                <!-- Enrollment Badge -->
                <div class="hero__badge badge badge-secondary animate-fade-in">
                    <span class="badge-dot"></span>
                    Now Enrolling All Ages!
                </div>

                <h1 class="hero__title animate-slide-up">
                    Where Every Child's
                    <span class="text-primary">Potential</span>
                    <span class="text-secondary">Shines</span>
                </h1>

                <p class="hero__description animate-slide-up">
                    Exceptional early childhood education with nurturing environments 
                    where children thrive, learn, and grow into confident individuals.
                </p>

                <!-- CTA Buttons -->
                <div class="hero__buttons animate-slide-up">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary btn-lg">
                        Book a Tour
                        <i data-lucide="arrow-right" class="icon"></i>
                    </a>
                    <a href="<?php echo esc_url(home_url('/programs')); ?>" class="btn btn-outline btn-lg">
                        Explore Programs
                    </a>
                </div>

                <!-- Trust Indicators -->
                <div class="hero__trust animate-fade-in">
                    <div class="trust-item">
                        <div class="trust-icon">
                            <i data-lucide="star"></i>
                        </div>
                        <span>Quality Rated</span>
                    </div>
                    <div class="trust-item">
                        <div class="trust-icon">
                            <i data-lucide="users"></i>
                        </div>
                        <span>15+ Years Experience</span>
                    </div>
                    <div class="trust-item">
                        <div class="trust-icon">
                            <i data-lucide="shield"></i>
                        </div>
                        <span>NAEYC Accredited</span>
                    </div>
                </div>
            </div>

            <!-- Hero Image/Visual -->
            <div class="hero__visual animate-scale-in">
                <div class="hero__image-wrapper">
                    <div class="hero__decorative hero__decorative--1 animate-float"></div>
                    <div class="hero__decorative hero__decorative--2 animate-float"></div>
                    
                    <div class="hero__image-container">
                        <div class="hero__image-placeholder">
                            <div class="hero__emoji">🎨</div>
                            <p class="hero__image-title">Happy Learning</p>
                            <p class="hero__image-subtitle">Every Day</p>
                        </div>
                    </div>

                    <!-- Floating Stats Card -->
                    <div class="hero__stats-card animate-float">
                        <div class="stats-icon">
                            <i data-lucide="users"></i>
                        </div>
                        <div>
                            <p class="stats-number">2,500+</p>
                            <p class="stats-label">Families Served</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.hero {
    position: relative;
    overflow: hidden;
    padding: 4rem 0;
}

@media (min-width: 768px) {
    .hero {
        padding: 6rem 0;
    }
}

.hero__bg-pattern {
    position: absolute;
    inset: 0;
    opacity: 0.03;
}

.hero__blob {
    position: absolute;
    border-radius: 50%;
    filter: blur(60px);
}

.hero__blob--1 {
    top: 5rem;
    left: 2.5rem;
    width: 18rem;
    height: 18rem;
    background: hsl(var(--color-primary));
}

.hero__blob--2 {
    bottom: 5rem;
    right: 2.5rem;
    width: 24rem;
    height: 24rem;
    background: hsl(var(--color-secondary));
}

.hero__grid {
    display: grid;
    gap: 3rem;
    align-items: center;
    position: relative;
}

@media (min-width: 1024px) {
    .hero__grid {
        grid-template-columns: 1fr 1fr;
    }
}

.hero__content {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.hero__badge {
    align-self: flex-start;
}

.badge-dot {
    width: 0.5rem;
    height: 0.5rem;
    background: hsl(var(--color-secondary));
    border-radius: 50%;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.hero__title {
    font-size: 2.25rem;
    font-weight: 700;
    line-height: 1.1;
}

@media (min-width: 768px) {
    .hero__title {
        font-size: 3rem;
    }
}

@media (min-width: 1024px) {
    .hero__title {
        font-size: 3.75rem;
    }
}

.hero__description {
    font-size: 1.125rem;
    color: hsl(var(--color-muted-foreground));
    max-width: 32rem;
}

@media (min-width: 768px) {
    .hero__description {
        font-size: 1.25rem;
    }
}

.hero__buttons {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

@media (min-width: 640px) {
    .hero__buttons {
        flex-direction: row;
    }
}

.hero__trust {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    padding-top: 1rem;
}

.trust-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    color: hsl(var(--color-muted-foreground));
}

.trust-icon {
    padding: 0.5rem;
    background: hsl(var(--color-primary) / 0.1);
    border-radius: 50%;
}

.trust-icon i {
    width: 1rem;
    height: 1rem;
    color: hsl(var(--color-primary));
}

.hero__visual {
    position: relative;
}

.hero__image-wrapper {
    position: relative;
    background: linear-gradient(135deg, hsl(var(--color-primary) / 0.1), hsl(var(--color-secondary) / 0.1));
    border-radius: 1.5rem;
    padding: 2rem;
}

@media (min-width: 1024px) {
    .hero__image-wrapper {
        padding: 3rem;
    }
}

.hero__decorative {
    position: absolute;
    border-radius: 50%;
    opacity: 0.2;
}

.hero__decorative--1 {
    top: -1rem;
    right: -1rem;
    width: 6rem;
    height: 6rem;
    background: hsl(var(--color-secondary));
}

.hero__decorative--2 {
    bottom: -1.5rem;
    left: -1.5rem;
    width: 8rem;
    height: 8rem;
    background: hsl(var(--color-primary));
    opacity: 0.1;
    animation-delay: 1s;
}

.hero__image-container {
    aspect-ratio: 4/3;
    border-radius: 1rem;
    background: linear-gradient(135deg, hsl(var(--color-primary)), hsl(var(--color-primary-light)));
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.hero__image-placeholder {
    text-align: center;
    color: white;
    padding: 2rem;
}

.hero__emoji {
    font-size: 4rem;
    margin-bottom: 1rem;
}

.hero__image-title {
    font-size: 1.25rem;
    font-weight: 600;
}

.hero__image-subtitle {
    font-size: 0.875rem;
    opacity: 0.8;
}

.hero__stats-card {
    position: absolute;
    bottom: -1rem;
    left: -1rem;
    background: hsl(var(--color-card));
    border-radius: 0.75rem;
    box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.15);
    padding: 1rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    animation-delay: 0.5s;
}

.stats-icon {
    padding: 0.5rem;
    background: hsl(var(--color-secondary) / 0.2);
    border-radius: 0.5rem;
}

.stats-icon i {
    width: 1.5rem;
    height: 1.5rem;
    color: hsl(var(--color-secondary));
}

.stats-number {
    font-size: 1.5rem;
    font-weight: 700;
    color: hsl(var(--color-foreground));
}

.stats-label {
    font-size: 0.875rem;
    color: hsl(var(--color-muted-foreground));
}

@keyframes scale-in {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.animate-scale-in {
    animation: scale-in 0.6s ease-out forwards;
}
</style>
