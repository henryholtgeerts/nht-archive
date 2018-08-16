<?php 

add_action('customize_register','my_customize_register');

function my_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'social', array(
        'title' => __( 'Social Links' ),
        'description' => __( 'Add custom CSS here' ),
        'priority' => 160,
    ) );

    $wp_customize->add_setting( 'itunes_link', array(
        'default' => '#',
    ) );

    $wp_customize->add_control( 'itunes_link', array(
        'type' => 'url',
        'priority' => 10, // Within the section.
        'section' => 'social', // Required, core or custom.
        'label' => __( 'iTunes URL' ),
        'description' => __( 'This is a date control with a red border.' ),
    ) );

    $wp_customize->add_setting( 'spotify_link', array(
        'default' => '#',
    ) );

    $wp_customize->add_control( 'spotify_link', array(
        'type' => 'url',
        'priority' => 10, // Within the section.
        'section' => 'social', // Required, core or custom.
        'label' => __( 'Spotify URL' ),
        'description' => __( 'This is a date control with a red border.' ),
    ) );
}

?>