<?php
function register_customize($wp_customizer)
{
    $wp_customizer->add_section('header', array(
        'title' => __('header settings', 'AzAuto'),
        'priority' => 70
    ));
    $wp_customizer->add_setting('header_image', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customizer->add_control(new WP_Customize_Image_Control($wp_customizer, 'header_image', array(
        'label' => __('header image', 'AzAuto'),
        'section' => 'header'
    )));
}
add_action('customize_register', 'register_customize');
