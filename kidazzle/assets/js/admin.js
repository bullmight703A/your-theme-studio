/**
 * KIDazzle Admin JavaScript
 */
(function($) {
    'use strict';

    $(document).ready(function() {
        // Delete lead confirmation
        $('.kidazzle-delete-lead').on('click', function(e) {
            e.preventDefault();
            
            if (!confirm('Are you sure you want to delete this lead? This action cannot be undone.')) {
                return;
            }
            
            var leadId = $(this).data('id');
            var $row = $(this).closest('tr');
            
            $.ajax({
                url: kidazzle_admin.ajax_url,
                type: 'POST',
                data: {
                    action: 'kidazzle_delete_lead',
                    nonce: kidazzle_admin.nonce,
                    lead_id: leadId
                },
                success: function(response) {
                    if (response.success) {
                        $row.fadeOut(300, function() {
                            $(this).remove();
                        });
                    } else {
                        alert('Error deleting lead: ' + response.data.message);
                    }
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });
        });

        // Quick status update
        $('.status-badge').on('click', function() {
            var $badge = $(this);
            var currentStatus = $badge.text().toLowerCase().replace(' ', '_');
            var statuses = ['new', 'contacted', 'tour_scheduled', 'tour_completed', 'enrolled', 'not_interested'];
            var currentIndex = statuses.indexOf(currentStatus);
            var nextStatus = statuses[(currentIndex + 1) % statuses.length];
            
            // Could implement inline status change here
        });

        // Initialize datepicker for tour scheduling if available
        if ($.fn.datepicker) {
            $('input[name="tour_scheduled"]').datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0
            });
        }

        // Form validation
        $('.kidazzle-form').on('submit', function(e) {
            var $form = $(this);
            var isValid = true;
            
            $form.find('[required]').each(function() {
                if (!$(this).val()) {
                    $(this).addClass('error');
                    isValid = false;
                } else {
                    $(this).removeClass('error');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });

        // Character counter for notes
        $('textarea[name="notes"]').on('input', function() {
            var length = $(this).val().length;
            var $counter = $(this).siblings('.char-count');
            if (!$counter.length) {
                $(this).after('<span class="char-count"></span>');
                $counter = $(this).siblings('.char-count');
            }
            $counter.text(length + ' characters');
        });
    });

})(jQuery);
