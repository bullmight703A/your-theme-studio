<?php
/**
 * CTA Section
 *
 * @package KIDazzle
 */
?>

<section class="cta-section">
    <div class="cta-bg">
        <div class="cta-blob cta-blob--1"></div>
        <div class="cta-blob cta-blob--2"></div>
    </div>

    <div class="container-site">
        <div class="cta-content text-center">
            <h2 class="cta-title">
                Ready to See the <span class="text-secondary">KIDazzle</span> Difference?
            </h2>
            <p class="cta-description">
                Schedule a tour today and discover why families trust us with their most precious treasures. We can't wait to meet you!
            </p>
            
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary btn-lg">
                    <i data-lucide="calendar" class="icon"></i>
                    Schedule a Tour
                </a>
                <a href="<?php echo esc_url(home_url('/locations')); ?>" class="btn btn-outline-light btn-lg">
                    Find a Location
                    <i data-lucide="arrow-right" class="icon"></i>
                </a>
            </div>

            <!-- Trust badges -->
            <div class="cta-badges">
                <span>✓ Free Tour</span>
                <span>✓ No Waitlist Fees</span>
                <span>✓ Flexible Scheduling</span>
            </div>
        </div>
    </div>
</section>

<style>
.cta-section {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, hsl(var(--color-primary)), hsl(var(--color-primary-light)));
    padding: 5rem 0;
}

@media (min-width: 768px) {
    .cta-section {
        padding: 7rem 0;
    }
}

.cta-bg {
    position: absolute;
    inset: 0;
}

.cta-blob {
    position: absolute;
    border-radius: 50%;
    filter: blur(60px);
}

.cta-blob--1 {
    top: 0;
    left: 25%;
    width: 24rem;
    height: 24rem;
    background: hsl(var(--color-primary-light) / 0.2);
}

.cta-blob--2 {
    bottom: 0;
    right: 25%;
    width: 20rem;
    height: 20rem;
    background: hsl(var(--color-secondary) / 0.2);
}

.cta-content {
    position: relative;
    max-width: 48rem;
    margin: 0 auto;
}

.cta-title {
    font-size: 1.875rem;
    font-weight: 700;
    color: white;
    margin-bottom: 1.5rem;
}

@media (min-width: 768px) {
    .cta-title {
        font-size: 2.25rem;
    }
}

@media (min-width: 1024px) {
    .cta-title {
        font-size: 3rem;
    }
}

.cta-title .text-secondary {
    color: hsl(var(--color-secondary));
}

.cta-description {
    font-size: 1.125rem;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 2.5rem;
    max-width: 42rem;
    margin-left: auto;
    margin-right: auto;
}

@media (min-width: 768px) {
    .cta-description {
        font-size: 1.25rem;
    }
}

.cta-buttons {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    justify-content: center;
}

@media (min-width: 640px) {
    .cta-buttons {
        flex-direction: row;
    }
}

.btn-outline-light {
    background: transparent;
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
}

.btn-outline-light:hover {
    background: rgba(255, 255, 255, 0.1);
}

.cta-badges {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 2rem;
    margin-top: 3rem;
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.6);
}
</style>
