<?php
/**
 * KIDazzle Academy Theme Functions
 * Complete theme with Lead Log, AI Lesson Plans, and Teacher Portal
 *
 * @package KIDazzle
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function kidazzle_setup() {
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('kidazzle-hero', 1200, 800, true);
    add_image_size('kidazzle-card', 600, 400, true);
    add_image_size('kidazzle-team', 400, 400, true);

    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'kidazzle'),
        'footer'  => esc_html__('Footer Menu', 'kidazzle'),
    ));

    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',
    ));

    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'kidazzle_setup');

/**
 * Enqueue scripts and styles
 */
function kidazzle_scripts() {
    wp_enqueue_style('kidazzle-google-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap', array(), null);
    wp_enqueue_style('kidazzle-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    wp_enqueue_script('lucide-icons', 'https://unpkg.com/lucide@latest/dist/umd/lucide.min.js', array(), null, true);
    wp_enqueue_script('kidazzle-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), wp_get_theme()->get('Version'), true);
    
    // Localize script for AJAX
    wp_localize_script('kidazzle-main', 'kidazzle_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('kidazzle_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'kidazzle_scripts');

/**
 * Admin scripts and styles
 */
function kidazzle_admin_scripts($hook) {
    if (strpos($hook, 'kidazzle') !== false) {
        wp_enqueue_style('kidazzle-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), wp_get_theme()->get('Version'));
        wp_enqueue_script('kidazzle-admin', get_template_directory_uri() . '/assets/js/admin.js', array('jquery'), wp_get_theme()->get('Version'), true);
        wp_localize_script('kidazzle-admin', 'kidazzle_admin', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('kidazzle_admin_nonce'),
        ));
    }
}
add_action('admin_enqueue_scripts', 'kidazzle_admin_scripts');

/**
 * Register widget areas
 */
function kidazzle_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Footer Column 1', 'kidazzle'),
        'id'            => 'footer-1',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer Column 2', 'kidazzle'),
        'id'            => 'footer-2',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'kidazzle_widgets_init');

// ============================================================
// LEAD LOG SYSTEM
// ============================================================

/**
 * Create Lead Log database table on theme activation
 */
function kidazzle_create_lead_tables() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    
    $table_name = $wpdb->prefix . 'kidazzle_leads';
    
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        parent_name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        phone varchar(50),
        child_name varchar(255),
        child_age varchar(50),
        program_interest varchar(100),
        location_interest varchar(100),
        source varchar(100),
        status varchar(50) DEFAULT 'new',
        notes text,
        assigned_to bigint(20),
        tour_scheduled datetime,
        tour_completed tinyint(1) DEFAULT 0,
        enrolled tinyint(1) DEFAULT 0,
        PRIMARY KEY (id),
        KEY status (status),
        KEY created_at (created_at)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    
    // Lead activities table
    $activities_table = $wpdb->prefix . 'kidazzle_lead_activities';
    $sql2 = "CREATE TABLE IF NOT EXISTS $activities_table (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        lead_id mediumint(9) NOT NULL,
        activity_type varchar(50) NOT NULL,
        description text,
        created_by bigint(20),
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        KEY lead_id (lead_id)
    ) $charset_collate;";
    dbDelta($sql2);
}
add_action('after_switch_theme', 'kidazzle_create_lead_tables');

/**
 * Add Lead Log admin menu
 */
function kidazzle_admin_menu() {
    add_menu_page(
        'Lead Log',
        'Lead Log',
        'manage_options',
        'kidazzle-leads',
        'kidazzle_leads_page',
        'dashicons-clipboard',
        30
    );
    
    add_submenu_page(
        'kidazzle-leads',
        'All Leads',
        'All Leads',
        'manage_options',
        'kidazzle-leads',
        'kidazzle_leads_page'
    );
    
    add_submenu_page(
        'kidazzle-leads',
        'Add New Lead',
        'Add New',
        'manage_options',
        'kidazzle-add-lead',
        'kidazzle_add_lead_page'
    );
    
    add_submenu_page(
        'kidazzle-leads',
        'Tour Schedule',
        'Tours',
        'manage_options',
        'kidazzle-tours',
        'kidazzle_tours_page'
    );
    
    add_submenu_page(
        'kidazzle-leads',
        'AI Lesson Plans',
        'AI Lesson Plans',
        'manage_options',
        'kidazzle-ai-lessons',
        'kidazzle_ai_lessons_page'
    );
    
    add_submenu_page(
        'kidazzle-leads',
        'Settings',
        'Settings',
        'manage_options',
        'kidazzle-settings',
        'kidazzle_settings_page'
    );
}
add_action('admin_menu', 'kidazzle_admin_menu');

/**
 * Leads listing page
 */
function kidazzle_leads_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'kidazzle_leads';
    
    $status_filter = isset($_GET['status']) ? sanitize_text_field($_GET['status']) : '';
    $search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
    
    $where = "WHERE 1=1";
    if ($status_filter) {
        $where .= $wpdb->prepare(" AND status = %s", $status_filter);
    }
    if ($search) {
        $where .= $wpdb->prepare(" AND (parent_name LIKE %s OR email LIKE %s OR phone LIKE %s)", 
            '%' . $wpdb->esc_like($search) . '%',
            '%' . $wpdb->esc_like($search) . '%',
            '%' . $wpdb->esc_like($search) . '%'
        );
    }
    
    $leads = $wpdb->get_results("SELECT * FROM $table_name $where ORDER BY created_at DESC");
    
    // Status counts
    $counts = $wpdb->get_results("SELECT status, COUNT(*) as count FROM $table_name GROUP BY status", OBJECT_K);
    ?>
    <div class="wrap kidazzle-admin">
        <h1 class="wp-heading-inline">Lead Log</h1>
        <a href="<?php echo admin_url('admin.php?page=kidazzle-add-lead'); ?>" class="page-title-action">Add New Lead</a>
        
        <div class="kidazzle-stats">
            <div class="stat-card">
                <span class="stat-number"><?php echo isset($counts['new']) ? $counts['new']->count : 0; ?></span>
                <span class="stat-label">New Leads</span>
            </div>
            <div class="stat-card">
                <span class="stat-number"><?php echo isset($counts['contacted']) ? $counts['contacted']->count : 0; ?></span>
                <span class="stat-label">Contacted</span>
            </div>
            <div class="stat-card">
                <span class="stat-number"><?php echo isset($counts['tour_scheduled']) ? $counts['tour_scheduled']->count : 0; ?></span>
                <span class="stat-label">Tours Scheduled</span>
            </div>
            <div class="stat-card stat-card--success">
                <span class="stat-number"><?php echo isset($counts['enrolled']) ? $counts['enrolled']->count : 0; ?></span>
                <span class="stat-label">Enrolled</span>
            </div>
        </div>
        
        <ul class="subsubsub">
            <li><a href="?page=kidazzle-leads" <?php echo !$status_filter ? 'class="current"' : ''; ?>>All</a> |</li>
            <li><a href="?page=kidazzle-leads&status=new" <?php echo $status_filter === 'new' ? 'class="current"' : ''; ?>>New</a> |</li>
            <li><a href="?page=kidazzle-leads&status=contacted" <?php echo $status_filter === 'contacted' ? 'class="current"' : ''; ?>>Contacted</a> |</li>
            <li><a href="?page=kidazzle-leads&status=tour_scheduled" <?php echo $status_filter === 'tour_scheduled' ? 'class="current"' : ''; ?>>Tour Scheduled</a> |</li>
            <li><a href="?page=kidazzle-leads&status=enrolled" <?php echo $status_filter === 'enrolled' ? 'class="current"' : ''; ?>>Enrolled</a></li>
        </ul>
        
        <form method="get">
            <input type="hidden" name="page" value="kidazzle-leads">
            <p class="search-box">
                <input type="search" name="s" value="<?php echo esc_attr($search); ?>" placeholder="Search leads...">
                <input type="submit" class="button" value="Search">
            </p>
        </form>
        
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Parent Name</th>
                    <th>Contact</th>
                    <th>Child</th>
                    <th>Program</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($leads) : foreach ($leads as $lead) : ?>
                <tr>
                    <td><strong><?php echo esc_html($lead->parent_name); ?></strong></td>
                    <td>
                        <a href="mailto:<?php echo esc_attr($lead->email); ?>"><?php echo esc_html($lead->email); ?></a><br>
                        <a href="tel:<?php echo esc_attr($lead->phone); ?>"><?php echo esc_html($lead->phone); ?></a>
                    </td>
                    <td><?php echo esc_html($lead->child_name); ?> (<?php echo esc_html($lead->child_age); ?>)</td>
                    <td><?php echo esc_html($lead->program_interest); ?></td>
                    <td><?php echo esc_html($lead->location_interest); ?></td>
                    <td><span class="status-badge status-<?php echo esc_attr($lead->status); ?>"><?php echo esc_html(ucwords(str_replace('_', ' ', $lead->status))); ?></span></td>
                    <td><?php echo date('M j, Y', strtotime($lead->created_at)); ?></td>
                    <td>
                        <a href="<?php echo admin_url('admin.php?page=kidazzle-add-lead&id=' . $lead->id); ?>">Edit</a> |
                        <a href="#" class="kidazzle-delete-lead" data-id="<?php echo $lead->id; ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; else : ?>
                <tr><td colspan="8">No leads found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}

/**
 * Add/Edit Lead page
 */
function kidazzle_add_lead_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'kidazzle_leads';
    
    $lead_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $lead = $lead_id ? $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $lead_id)) : null;
    
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kidazzle_lead_nonce']) && wp_verify_nonce($_POST['kidazzle_lead_nonce'], 'kidazzle_save_lead')) {
        $data = array(
            'parent_name'       => sanitize_text_field($_POST['parent_name']),
            'email'             => sanitize_email($_POST['email']),
            'phone'             => sanitize_text_field($_POST['phone']),
            'child_name'        => sanitize_text_field($_POST['child_name']),
            'child_age'         => sanitize_text_field($_POST['child_age']),
            'program_interest'  => sanitize_text_field($_POST['program_interest']),
            'location_interest' => sanitize_text_field($_POST['location_interest']),
            'source'            => sanitize_text_field($_POST['source']),
            'status'            => sanitize_text_field($_POST['status']),
            'notes'             => sanitize_textarea_field($_POST['notes']),
            'tour_scheduled'    => !empty($_POST['tour_scheduled']) ? sanitize_text_field($_POST['tour_scheduled']) : null,
        );
        
        if ($lead_id) {
            $wpdb->update($table_name, $data, array('id' => $lead_id));
            echo '<div class="notice notice-success"><p>Lead updated successfully!</p></div>';
        } else {
            $wpdb->insert($table_name, $data);
            $lead_id = $wpdb->insert_id;
            echo '<div class="notice notice-success"><p>Lead added successfully!</p></div>';
        }
        
        $lead = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $lead_id));
    }
    ?>
    <div class="wrap kidazzle-admin">
        <h1><?php echo $lead_id ? 'Edit Lead' : 'Add New Lead'; ?></h1>
        
        <form method="post" class="kidazzle-form">
            <?php wp_nonce_field('kidazzle_save_lead', 'kidazzle_lead_nonce'); ?>
            
            <div class="form-row">
                <div class="form-col">
                    <h2>Parent Information</h2>
                    <p>
                        <label>Parent/Guardian Name *</label>
                        <input type="text" name="parent_name" value="<?php echo $lead ? esc_attr($lead->parent_name) : ''; ?>" required class="regular-text">
                    </p>
                    <p>
                        <label>Email Address *</label>
                        <input type="email" name="email" value="<?php echo $lead ? esc_attr($lead->email) : ''; ?>" required class="regular-text">
                    </p>
                    <p>
                        <label>Phone Number</label>
                        <input type="tel" name="phone" value="<?php echo $lead ? esc_attr($lead->phone) : ''; ?>" class="regular-text">
                    </p>
                </div>
                
                <div class="form-col">
                    <h2>Child Information</h2>
                    <p>
                        <label>Child's Name</label>
                        <input type="text" name="child_name" value="<?php echo $lead ? esc_attr($lead->child_name) : ''; ?>" class="regular-text">
                    </p>
                    <p>
                        <label>Child's Age</label>
                        <select name="child_age">
                            <option value="">Select Age</option>
                            <option value="6 weeks - 12 months" <?php selected($lead ? $lead->child_age : '', '6 weeks - 12 months'); ?>>6 weeks - 12 months</option>
                            <option value="1 - 2 years" <?php selected($lead ? $lead->child_age : '', '1 - 2 years'); ?>>1 - 2 years</option>
                            <option value="3 - 4 years" <?php selected($lead ? $lead->child_age : '', '3 - 4 years'); ?>>3 - 4 years</option>
                            <option value="4 - 5 years" <?php selected($lead ? $lead->child_age : '', '4 - 5 years'); ?>>4 - 5 years</option>
                            <option value="5 - 12 years" <?php selected($lead ? $lead->child_age : '', '5 - 12 years'); ?>>5 - 12 years</option>
                        </select>
                    </p>
                    <p>
                        <label>Program Interest</label>
                        <select name="program_interest">
                            <option value="">Select Program</option>
                            <option value="Infant Care" <?php selected($lead ? $lead->program_interest : '', 'Infant Care'); ?>>Infant Care</option>
                            <option value="Toddler" <?php selected($lead ? $lead->program_interest : '', 'Toddler'); ?>>Toddler Program</option>
                            <option value="Preschool" <?php selected($lead ? $lead->program_interest : '', 'Preschool'); ?>>Preschool</option>
                            <option value="Pre-K" <?php selected($lead ? $lead->program_interest : '', 'Pre-K'); ?>>Pre-Kindergarten</option>
                            <option value="School Age" <?php selected($lead ? $lead->program_interest : '', 'School Age'); ?>>School Age</option>
                        </select>
                    </p>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-col">
                    <h2>Lead Details</h2>
                    <p>
                        <label>Location Interest</label>
                        <select name="location_interest">
                            <option value="">Select Location</option>
                            <option value="West End" <?php selected($lead ? $lead->location_interest : '', 'West End'); ?>>West End</option>
                            <option value="Midtown" <?php selected($lead ? $lead->location_interest : '', 'Midtown'); ?>>Midtown</option>
                            <option value="Buckhead" <?php selected($lead ? $lead->location_interest : '', 'Buckhead'); ?>>Buckhead</option>
                        </select>
                    </p>
                    <p>
                        <label>Source</label>
                        <select name="source">
                            <option value="">Select Source</option>
                            <option value="Website" <?php selected($lead ? $lead->source : '', 'Website'); ?>>Website</option>
                            <option value="Google" <?php selected($lead ? $lead->source : '', 'Google'); ?>>Google Search</option>
                            <option value="Facebook" <?php selected($lead ? $lead->source : '', 'Facebook'); ?>>Facebook</option>
                            <option value="Referral" <?php selected($lead ? $lead->source : '', 'Referral'); ?>>Referral</option>
                            <option value="Drive-by" <?php selected($lead ? $lead->source : '', 'Drive-by'); ?>>Drive-by</option>
                            <option value="Other" <?php selected($lead ? $lead->source : '', 'Other'); ?>>Other</option>
                        </select>
                    </p>
                    <p>
                        <label>Status</label>
                        <select name="status">
                            <option value="new" <?php selected($lead ? $lead->status : 'new', 'new'); ?>>New</option>
                            <option value="contacted" <?php selected($lead ? $lead->status : '', 'contacted'); ?>>Contacted</option>
                            <option value="tour_scheduled" <?php selected($lead ? $lead->status : '', 'tour_scheduled'); ?>>Tour Scheduled</option>
                            <option value="tour_completed" <?php selected($lead ? $lead->status : '', 'tour_completed'); ?>>Tour Completed</option>
                            <option value="enrolled" <?php selected($lead ? $lead->status : '', 'enrolled'); ?>>Enrolled</option>
                            <option value="not_interested" <?php selected($lead ? $lead->status : '', 'not_interested'); ?>>Not Interested</option>
                        </select>
                    </p>
                    <p>
                        <label>Tour Scheduled</label>
                        <input type="datetime-local" name="tour_scheduled" value="<?php echo $lead && $lead->tour_scheduled ? date('Y-m-d\TH:i', strtotime($lead->tour_scheduled)) : ''; ?>">
                    </p>
                </div>
                
                <div class="form-col">
                    <h2>Notes</h2>
                    <p>
                        <textarea name="notes" rows="8" class="large-text"><?php echo $lead ? esc_textarea($lead->notes) : ''; ?></textarea>
                    </p>
                </div>
            </div>
            
            <p class="submit">
                <input type="submit" class="button button-primary" value="<?php echo $lead_id ? 'Update Lead' : 'Add Lead'; ?>">
                <a href="<?php echo admin_url('admin.php?page=kidazzle-leads'); ?>" class="button">Cancel</a>
            </p>
        </form>
    </div>
    <?php
}

/**
 * Tours page
 */
function kidazzle_tours_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'kidazzle_leads';
    
    $upcoming_tours = $wpdb->get_results(
        "SELECT * FROM $table_name WHERE tour_scheduled IS NOT NULL AND tour_scheduled >= NOW() ORDER BY tour_scheduled ASC"
    );
    ?>
    <div class="wrap kidazzle-admin">
        <h1>Tour Schedule</h1>
        
        <h2>Upcoming Tours</h2>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Date & Time</th>
                    <th>Parent Name</th>
                    <th>Contact</th>
                    <th>Child Age</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($upcoming_tours) : foreach ($upcoming_tours as $tour) : ?>
                <tr>
                    <td><strong><?php echo date('M j, Y g:i A', strtotime($tour->tour_scheduled)); ?></strong></td>
                    <td><?php echo esc_html($tour->parent_name); ?></td>
                    <td><?php echo esc_html($tour->phone); ?></td>
                    <td><?php echo esc_html($tour->child_age); ?></td>
                    <td><?php echo esc_html($tour->location_interest); ?></td>
                    <td>
                        <a href="<?php echo admin_url('admin.php?page=kidazzle-add-lead&id=' . $tour->id); ?>">View Lead</a>
                    </td>
                </tr>
                <?php endforeach; else : ?>
                <tr><td colspan="6">No upcoming tours scheduled.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}

// ============================================================
// AI LESSON PLANS (LLM INTEGRATION)
// ============================================================

/**
 * AI Lesson Plans page
 */
function kidazzle_ai_lessons_page() {
    $api_key = get_option('kidazzle_openai_api_key', '');
    ?>
    <div class="wrap kidazzle-admin">
        <h1>AI Lesson Plan Generator</h1>
        
        <?php if (!$api_key) : ?>
        <div class="notice notice-warning">
            <p>Please configure your OpenAI API key in <a href="<?php echo admin_url('admin.php?page=kidazzle-settings'); ?>">Settings</a> to use the AI Lesson Plan generator.</p>
        </div>
        <?php endif; ?>
        
        <div class="kidazzle-ai-container">
            <div class="ai-form-section">
                <h2>Generate Lesson Plan</h2>
                <form id="kidazzle-ai-form">
                    <p>
                        <label>Age Group</label>
                        <select name="age_group" id="ai-age-group">
                            <option value="infant">Infant (6 weeks - 12 months)</option>
                            <option value="toddler">Toddler (1 - 2 years)</option>
                            <option value="preschool" selected>Preschool (3 - 4 years)</option>
                            <option value="prek">Pre-K (4 - 5 years)</option>
                            <option value="school-age">School Age (5 - 12 years)</option>
                        </select>
                    </p>
                    <p>
                        <label>Subject/Theme</label>
                        <input type="text" name="theme" id="ai-theme" placeholder="e.g., Colors, Animals, Seasons, Numbers..." class="regular-text">
                    </p>
                    <p>
                        <label>Duration</label>
                        <select name="duration" id="ai-duration">
                            <option value="30 minutes">30 minutes</option>
                            <option value="1 hour" selected>1 hour</option>
                            <option value="half day">Half day</option>
                            <option value="full day">Full day</option>
                            <option value="week">Full week</option>
                        </select>
                    </p>
                    <p>
                        <label>Learning Objectives (optional)</label>
                        <textarea name="objectives" id="ai-objectives" rows="3" class="large-text" placeholder="Specific skills or concepts to focus on..."></textarea>
                    </p>
                    <p>
                        <button type="submit" class="button button-primary button-hero" id="generate-lesson-btn" <?php echo !$api_key ? 'disabled' : ''; ?>>
                            🤖 Generate Lesson Plan
                        </button>
                    </p>
                </form>
            </div>
            
            <div class="ai-result-section">
                <h2>Generated Lesson Plan</h2>
                <div id="ai-result" class="ai-result-box">
                    <p class="placeholder-text">Your AI-generated lesson plan will appear here...</p>
                </div>
                <div id="ai-actions" style="display:none;">
                    <button class="button" id="copy-lesson">📋 Copy to Clipboard</button>
                    <button class="button" id="print-lesson">🖨️ Print</button>
                    <button class="button button-primary" id="save-lesson">💾 Save Lesson Plan</button>
                </div>
            </div>
        </div>
        
        <h2>Saved Lesson Plans</h2>
        <div id="saved-lessons">
            <?php
            $saved_lessons = get_option('kidazzle_saved_lessons', array());
            if ($saved_lessons) :
                foreach (array_reverse($saved_lessons) as $index => $lesson) :
            ?>
            <div class="saved-lesson-card">
                <h4><?php echo esc_html($lesson['title']); ?></h4>
                <p class="lesson-meta">
                    Age: <?php echo esc_html($lesson['age_group']); ?> | 
                    Duration: <?php echo esc_html($lesson['duration']); ?> | 
                    Created: <?php echo date('M j, Y', $lesson['created']); ?>
                </p>
                <div class="lesson-content"><?php echo wp_kses_post($lesson['content']); ?></div>
            </div>
            <?php endforeach; else : ?>
            <p>No saved lesson plans yet.</p>
            <?php endif; ?>
        </div>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        $('#kidazzle-ai-form').on('submit', function(e) {
            e.preventDefault();
            
            var $btn = $('#generate-lesson-btn');
            var $result = $('#ai-result');
            
            $btn.prop('disabled', true).text('Generating...');
            $result.html('<p>🔄 Generating lesson plan with AI...</p>');
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'kidazzle_generate_lesson',
                    nonce: '<?php echo wp_create_nonce('kidazzle_ai_nonce'); ?>',
                    age_group: $('#ai-age-group').val(),
                    theme: $('#ai-theme').val(),
                    duration: $('#ai-duration').val(),
                    objectives: $('#ai-objectives').val()
                },
                success: function(response) {
                    if (response.success) {
                        $result.html('<div class="lesson-content">' + response.data.content + '</div>');
                        $('#ai-actions').show();
                    } else {
                        $result.html('<p class="error">' + response.data.message + '</p>');
                    }
                },
                error: function() {
                    $result.html('<p class="error">An error occurred. Please try again.</p>');
                },
                complete: function() {
                    $btn.prop('disabled', false).text('🤖 Generate Lesson Plan');
                }
            });
        });
        
        $('#copy-lesson').on('click', function() {
            var content = $('#ai-result .lesson-content').text();
            navigator.clipboard.writeText(content);
            alert('Lesson plan copied to clipboard!');
        });
        
        $('#print-lesson').on('click', function() {
            var content = $('#ai-result').html();
            var win = window.open('', '_blank');
            win.document.write('<html><head><title>Lesson Plan</title><style>body{font-family:sans-serif;padding:20px;}</style></head><body>' + content + '</body></html>');
            win.print();
        });
    });
    </script>
    <?php
}

/**
 * AJAX handler for AI lesson generation
 */
function kidazzle_generate_lesson_ajax() {
    check_ajax_referer('kidazzle_ai_nonce', 'nonce');
    
    $api_key = get_option('kidazzle_openai_api_key', '');
    if (!$api_key) {
        wp_send_json_error(array('message' => 'OpenAI API key not configured.'));
    }
    
    $age_group = sanitize_text_field($_POST['age_group']);
    $theme = sanitize_text_field($_POST['theme']);
    $duration = sanitize_text_field($_POST['duration']);
    $objectives = sanitize_textarea_field($_POST['objectives']);
    
    $prompt = "Create a detailed, developmentally appropriate lesson plan for a childcare/preschool setting with the following parameters:

Age Group: $age_group
Theme/Subject: $theme
Duration: $duration
" . ($objectives ? "Specific Objectives: $objectives" : "") . "

Please include:
1. Learning Objectives (3-5 age-appropriate goals)
2. Materials Needed (practical items found in a typical classroom)
3. Introduction/Circle Time Activity (5-10 minutes)
4. Main Activity with step-by-step instructions
5. Extension Activities for different skill levels
6. Assessment/Observation Tips
7. Parent Communication Note (brief summary to send home)

Format the response with clear headings and bullet points. Make it practical and ready to implement.";

    $response = wp_remote_post('https://api.openai.com/v1/chat/completions', array(
        'timeout' => 60,
        'headers' => array(
            'Authorization' => 'Bearer ' . $api_key,
            'Content-Type'  => 'application/json',
        ),
        'body' => json_encode(array(
            'model' => 'gpt-4o-mini',
            'messages' => array(
                array(
                    'role' => 'system',
                    'content' => 'You are an experienced early childhood education specialist who creates engaging, developmentally appropriate lesson plans for childcare centers and preschools.'
                ),
                array(
                    'role' => 'user',
                    'content' => $prompt
                )
            ),
            'max_tokens' => 2000,
            'temperature' => 0.7
        ))
    ));
    
    if (is_wp_error($response)) {
        wp_send_json_error(array('message' => 'API request failed: ' . $response->get_error_message()));
    }
    
    $body = json_decode(wp_remote_retrieve_body($response), true);
    
    if (isset($body['choices'][0]['message']['content'])) {
        $content = $body['choices'][0]['message']['content'];
        // Convert markdown to HTML
        $content = nl2br(esc_html($content));
        $content = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $content);
        $content = preg_replace('/^### (.*)$/m', '<h3>$1</h3>', $content);
        $content = preg_replace('/^## (.*)$/m', '<h2>$1</h2>', $content);
        
        wp_send_json_success(array('content' => $content));
    } else {
        wp_send_json_error(array('message' => 'Invalid API response.'));
    }
}
add_action('wp_ajax_kidazzle_generate_lesson', 'kidazzle_generate_lesson_ajax');

// ============================================================
// SETTINGS PAGE
// ============================================================

/**
 * Settings page
 */
function kidazzle_settings_page() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kidazzle_settings_nonce']) && wp_verify_nonce($_POST['kidazzle_settings_nonce'], 'kidazzle_save_settings')) {
        update_option('kidazzle_openai_api_key', sanitize_text_field($_POST['openai_api_key']));
        update_option('kidazzle_notification_email', sanitize_email($_POST['notification_email']));
        echo '<div class="notice notice-success"><p>Settings saved successfully!</p></div>';
    }
    
    $api_key = get_option('kidazzle_openai_api_key', '');
    $notification_email = get_option('kidazzle_notification_email', get_option('admin_email'));
    ?>
    <div class="wrap kidazzle-admin">
        <h1>KIDazzle Settings</h1>
        
        <form method="post">
            <?php wp_nonce_field('kidazzle_save_settings', 'kidazzle_settings_nonce'); ?>
            
            <h2>Lead Log Settings</h2>
            <table class="form-table">
                <tr>
                    <th><label for="notification_email">Notification Email</label></th>
                    <td>
                        <input type="email" name="notification_email" id="notification_email" value="<?php echo esc_attr($notification_email); ?>" class="regular-text">
                        <p class="description">Email address to receive new lead notifications.</p>
                    </td>
                </tr>
            </table>
            
            <h2>AI Integration (OpenAI)</h2>
            <table class="form-table">
                <tr>
                    <th><label for="openai_api_key">OpenAI API Key</label></th>
                    <td>
                        <input type="password" name="openai_api_key" id="openai_api_key" value="<?php echo esc_attr($api_key); ?>" class="regular-text">
                        <p class="description">Your OpenAI API key for AI-powered lesson plan generation. <a href="https://platform.openai.com/api-keys" target="_blank">Get API Key</a></p>
                    </td>
                </tr>
            </table>
            
            <p class="submit">
                <input type="submit" class="button button-primary" value="Save Settings">
            </p>
        </form>
    </div>
    <?php
}

// ============================================================
// CONTACT FORM HANDLING
// ============================================================

/**
 * Handle contact form submissions and add to Lead Log
 */
function kidazzle_handle_contact_form() {
    if (!isset($_POST['kidazzle_contact_nonce']) || !wp_verify_nonce($_POST['kidazzle_contact_nonce'], 'kidazzle_contact_form')) {
        return;
    }
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'kidazzle_leads';
    
    $data = array(
        'parent_name'       => sanitize_text_field($_POST['parent_name']),
        'email'             => sanitize_email($_POST['email']),
        'phone'             => sanitize_text_field($_POST['phone']),
        'child_name'        => sanitize_text_field($_POST['child_name'] ?? ''),
        'child_age'         => sanitize_text_field($_POST['child_age'] ?? ''),
        'program_interest'  => sanitize_text_field($_POST['program_interest'] ?? ''),
        'location_interest' => sanitize_text_field($_POST['location_interest'] ?? ''),
        'source'            => 'Website',
        'status'            => 'new',
        'notes'             => sanitize_textarea_field($_POST['message'] ?? ''),
    );
    
    $wpdb->insert($table_name, $data);
    
    // Send notification email
    $notification_email = get_option('kidazzle_notification_email', get_option('admin_email'));
    $subject = 'New Lead: ' . $data['parent_name'];
    $message = "New lead received from the website:\n\n";
    $message .= "Parent: " . $data['parent_name'] . "\n";
    $message .= "Email: " . $data['email'] . "\n";
    $message .= "Phone: " . $data['phone'] . "\n";
    if ($data['child_name']) $message .= "Child: " . $data['child_name'] . " (" . $data['child_age'] . ")\n";
    if ($data['program_interest']) $message .= "Program: " . $data['program_interest'] . "\n";
    if ($data['location_interest']) $message .= "Location: " . $data['location_interest'] . "\n";
    if ($data['notes']) $message .= "\nMessage:\n" . $data['notes'] . "\n";
    $message .= "\n\nView all leads: " . admin_url('admin.php?page=kidazzle-leads');
    
    wp_mail($notification_email, $subject, $message);
    
    // Redirect with success message
    wp_redirect(add_query_arg('contact', 'success', wp_get_referer()));
    exit;
}
add_action('admin_post_kidazzle_contact', 'kidazzle_handle_contact_form');
add_action('admin_post_nopriv_kidazzle_contact', 'kidazzle_handle_contact_form');

// ============================================================
// CUSTOMIZER SETTINGS
// ============================================================

function kidazzle_customize_register($wp_customize) {
    // Contact Information Section
    $wp_customize->add_section('kidazzle_contact', array(
        'title'    => esc_html__('Contact Information', 'kidazzle'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('kidazzle_phone', array('default' => '(404) 555-0100', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('kidazzle_phone', array('label' => 'Phone Number', 'section' => 'kidazzle_contact', 'type' => 'text'));

    $wp_customize->add_setting('kidazzle_email', array('default' => 'info@kidazzle.com', 'sanitize_callback' => 'sanitize_email'));
    $wp_customize->add_control('kidazzle_email', array('label' => 'Email Address', 'section' => 'kidazzle_contact', 'type' => 'email'));

    $wp_customize->add_setting('kidazzle_hours', array('default' => 'Mon-Fri: 6:30am - 6:30pm', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('kidazzle_hours', array('label' => 'Business Hours', 'section' => 'kidazzle_contact', 'type' => 'text'));

    // Social Media Section
    $wp_customize->add_section('kidazzle_social', array('title' => 'Social Media Links', 'priority' => 35));

    foreach (array('facebook', 'instagram', 'twitter', 'youtube') as $platform) {
        $wp_customize->add_setting('kidazzle_' . $platform, array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('kidazzle_' . $platform, array('label' => ucfirst($platform) . ' URL', 'section' => 'kidazzle_social', 'type' => 'url'));
    }
}
add_action('customize_register', 'kidazzle_customize_register');

/**
 * Add excerpt support to pages
 */
function kidazzle_add_excerpts_to_pages() {
    add_post_type_support('page', 'excerpt');
}
add_action('init', 'kidazzle_add_excerpts_to_pages');

/**
 * Custom body classes
 */
function kidazzle_body_classes($classes) {
    if (is_page()) {
        $classes[] = 'page-' . sanitize_html_class(get_post_field('post_name', get_queried_object_id()));
    }
    return $classes;
}
add_filter('body_class', 'kidazzle_body_classes');

/**
 * Helper function for SVG icons
 */
function kidazzle_get_svg_icon($icon_name, $class = '') {
    $class_attr = $class ? ' class="' . esc_attr($class) . '"' : '';
    return '<i data-lucide="' . esc_attr($icon_name) . '"' . $class_attr . '></i>';
}
