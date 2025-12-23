<?php
/**
 * Template Name: Contact Page
 */
get_header();
?>

<section class="page-hero bg-gradient-soft">
    <div class="container-site text-center">
        <div class="badge badge-secondary"><i data-lucide="calendar"></i> Schedule a Visit</div>
        <h1>Let's Start Your Child's <span class="text-primary">Journey</span></h1>
        <p class="hero-desc">Ready to see what makes KIDazzle special? Book a tour or reach out with questions!</p>
    </div>
</section>

<section class="section-padding">
    <div class="container-site">
        <div class="grid grid-2">
            <div class="card p-8">
                <h2>Get in Touch</h2>
                <?php echo do_shortcode('[contact-form-7 id="contact-form"]'); ?>
                
                <!-- Fallback form if no CF7 -->
                <form class="contact-form" method="post">
                    <div class="form-group">
                        <label class="form-label">Parent/Guardian Name *</label>
                        <input type="text" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address *</label>
                        <input type="email" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone Number *</label>
                        <input type="tel" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Message</label>
                        <textarea class="form-textarea"></textarea>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-full">
                        <i data-lucide="send"></i> Send Message
                    </button>
                </form>
            </div>
            
            <div>
                <h2>Contact Information</h2>
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon"><i data-lucide="phone"></i></div>
                        <div>
                            <h3>Phone</h3>
                            <p><?php echo esc_html(get_theme_mod('kidazzle_phone', '(404) 555-0100')); ?></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i data-lucide="mail"></i></div>
                        <div>
                            <h3>Email</h3>
                            <p><?php echo esc_html(get_theme_mod('kidazzle_email', 'info@kidazzle.com')); ?></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i data-lucide="clock"></i></div>
                        <div>
                            <h3>Hours</h3>
                            <p>Monday - Friday: 6:30 AM - 6:30 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
