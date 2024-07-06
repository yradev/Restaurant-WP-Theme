<?php

/**
 * Register custom form tag
 */
add_action('wpcf7_init', function() {
    wpcf7_add_form_tag('custom_time_field', 'ct_custom_time_field');
});


/**
 * Add custom time field
 */
function ct_custom_time_field($tag) {
    $name = isset($tag->name) ? $tag->name : '';
    $id = isset($tag->id) ? $tag->id : '';
    $class = isset($tag->values['class']) ? $tag->values['class'] : '';

    // Default values if not set by the user
    if (empty($id)) {
        $id = 'custom-time-field';
    }
    if (empty($class)) {
        $class = 'custom-time-class';
    }

    $html = sprintf('<input type="time" name="%s" id="%s" class="%s" required>', esc_attr($name), esc_attr($id), esc_attr($class));
    
    return $html;
}

