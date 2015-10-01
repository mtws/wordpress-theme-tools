<?php
/**
 * Remember to add the below code to a file in mu-plugins.php if you want non-admins
 * to access the customizer. It must be as a plugin, won't work in functions.php
 * https://wordpress.org/support/topic/allow-non-administrators-to-access-the-customizer-not-working
 */
/*
function allow_users_who_can_edit_posts_to_customize( $caps, $cap, $user_id ) {
  $required_cap = 'edit_pages';
  if ( 'customize' === $cap && user_can( $user_id, $required_cap ) ) {
    $caps = array( $required_cap );
  }
  return $caps;
}
add_filter( 'map_meta_cap', 'allow_users_who_can_edit_posts_to_customize', 10, 3 );
EOF code that shoulde be added as a plugin
*/

function mtws_customizer_register( $wp_customize ) {

    // $wp_customize->add_panel( 'panel_id', array(
    //     'priority' => 10,
    //     'capability' => 'edit_pages',
    //     'theme_supports' => '',
    //     'title' => __( 'Example Panel', 'textdomain' ),
    //     'description' => __( 'Description of what this panel does.', 'textdomain' ),
    // ) );

    $wp_customize->add_section( 'mtws_settings_section', array(
        'priority' => 10,
        'capability' => 'edit_pages',
        'theme_supports' => '',
        'title' => __( 'Example Section', 'textdomain' ),
        'description' => '',
        // 'panel' => 'panel_id',
    ) );

    $wp_customize->add_setting( 'url_field_id', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_pages',
        'transport' => '',
        'sanitize_callback' => 'esc_url',
    ) );

    $wp_customize->add_control( 'url_field_id', array(
        'type' => 'url',
        'priority' => 10,
        'section' => 'mtws_settings_section',
        'label' => __( 'URL Field', 'textdomain' ),
        'description' => 'Määritä urli jota käytetään johonkin...',
    ) );

    // $wp_customize->add_setting('featured_post');
    $wp_customize->add_setting( 'featured_post', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_pages',
        // 'transport' => '',
        // 'sanitize_callback' => 'esc_url',
    ) );

    if ( ! class_exists( 'WP_Customize_Control' ) )
        return NULL;

    /**
     * Class to create a custom post control
     * http://www.paulund.co.uk/custom-wordpress-controls
     */
    class Post_Dropdown_Custom_Control extends WP_Customize_Control
    {
        private $posts = false;

        public function __construct($manager, $id, $args = array(), $options = array())
        {
            $postargs = wp_parse_args($options, array('numberposts' => '-1'));
            $this->posts = get_posts($postargs);

            parent::__construct( $manager, $id, $args );
        }

        /**
        * Render the content on the theme customizer page
        */
        public function render_content()
        {
            if(!empty($this->posts))
            {
                ?>
                    <label>
                        <span class="customize-post-dropdown customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                        <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                        <select <?php $this->link(); ?>>
                        <?php
                            foreach ( $this->posts as $post )
                            {
                                printf('<option value="%s" %s>%s</option>', $post->ID, selected($this->value(), $post->ID, false), $post->post_title);
                            }
                        ?>
                        </select>
                    </label>
                <?php
            }
        }
    }

    $wp_customize->add_control(
        new Post_Dropdown_Custom_Control(
            $wp_customize,
            'featpost_control',
            array(
            'label' => __( 'Select A Featured Post', 'textdomain' ),
            'section' => 'mtws_settings_section',
            'settings' => 'featured_post',
            'description' => 'Määritä featured artikkeli...',
            // 'post_type' => 'post'
            )
        )
    );

    $wp_customize->add_setting( 'mats_testi', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_pages',
        'transport' => '',
        'sanitize_callback' => 'esc_url',
    ) );

    /**
     * https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
     */
    $wp_customize->add_control( new WP_Customize_Upload_Control( 
        $wp_customize, 
        'your_control_id', 
        array(
            'label'      => __( 'Mats Testi', 'textdomain' ),
            'section'    => 'mtws_settings_section',
            'settings'   => 'mats_testi',
            'priority'   => 1,
        )
    ));

    $wp_customize->add_setting( 'mats_testi2', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_pages',
        'transport' => '',
        // 'sanitize_callback' => 'esc_url',
    ) );

    $wp_customize->add_control( 'example_page_select_box', array(
        'label'      => __( 'Select Something:', 'textdomain' ),
        'section' => 'mtws_settings_section',
        'settings'   => 'mats_testi2',
        'type'    => 'dropdown-pages',
    ) );

    $wp_customize->add_setting( 'mtws_media_example', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_pages',
        'transport' => '',
        // 'sanitize_callback' => 'esc_url',
    ) );

    /**
     * https://developer.wordpress.org/themes/advanced-topics/customizer-api/#core-custom-controls
     */
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'media_control', array(
        'label' => __( 'Featured Home Page Image', 'textdomain' ),
        'section' => 'mtws_settings_section',
        'settings'   => 'mtws_media_example',
        //'mime_type' => 'video/mp4', //https://codex.wordpress.org/Function_Reference/get_allowed_mime_types image/audio/video...
    ) ) );

    $wp_customize->add_setting( 'mtws_radio_example', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_pages',
        'transport' => '',
        // 'sanitize_callback' => 'esc_url',
    ) );

    $wp_customize->add_control(
        'mtws_radio_example_control', 
        array(
            'label'    => __( ' Radio Example', 'textdomain' ),
            'section'  => 'mtws_settings_section',
            'settings' => 'mtws_radio_example',
            'type'     => 'radio',
            'choices'  => array(
                'left'  => 'left',
                'right' => 'right',
            ),
        )
    );

    $wp_customize->add_setting( 'mtws_image_example', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_pages',
        'transport' => '',
        // 'sanitize_callback' => 'esc_url',
    ) );

    /*
     * https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
     * You can probalbly use WP_Customize_Media_Control with mime_typy => 'image' just as well
     */
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'mtws_image_example_control',
           array(
               'label'      => __( 'Image example', 'textdomain' ),
               'section'    => 'mtws_settings_section',
               'settings'   => 'mtws_image_example',
               'context'    => 'your_setting_context' 
           )
       )
   );

    $wp_customize->add_setting( 'mtws_textarea_example', array(
        'default'       => '',
        'capability' => 'edit_pages',
    ) );

    $wp_customize->add_control( 'mtws_textarea_example_control', array(
        'label'     => __( 'Textarea example', 'textdomain' ),
        'type'      => 'textarea',
        'section'   => 'mtws_settings_section',
        'settings'  => 'mtws_textarea_example',
    ) );

    $wp_customize->add_setting( 'mtws_checkbox_example', array(
        'default'       => '',
        'capability' => 'edit_pages',
    ) );

    $wp_customize->add_control( 'mtws_checkbox_example_control', array(
        'label'     => __( 'Checkbox example', 'textdomain' ),
        'type'      => 'checkbox',
        'section'   => 'mtws_settings_section',
        'settings'  => 'mtws_checkbox_example',
    ) );

    $wp_customize->add_setting( 'mtws_select_example', array(
        'default'       => 'value2',
        // 'type'          => 'theme_mod',
        'capability' => 'edit_pages',
        //'transport' => 'refresh', // or postMessage
        // 'sanitize_callback' => 'esc_url',
    ) );

    $wp_customize->add_control( 'mtws_select_example_control', array(
        'settings' => 'mtws_select_example',
        'label'   => __('Select example:', 'textdomain'),
        'section' => 'mtws_settings_section',
        'type'    => 'select',
        'choices'    => array(
            'value1' => __('Choice 1', 'textdomain'),
            'value2' => __('Choice 2', 'textdomain'),
            'value3' => __('Choice 3', 'textdomain'),
        ),
    ));

    $wp_customize->add_setting( 'mtws_color_example', array(
        'default'       => '',
        'capability' => 'edit_pages',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'mtws_color_example_control', 
        array(
            'label'     => __( 'Color example', 'textdomain' ),
            'section'   => 'mtws_settings_section',
            'settings'  => 'mtws_color_example',
        ) 
    ) );

    // Hide the default static page customizer menu item
    $wp_customize->remove_section("nav_menus");
    $wp_customize->remove_section("static_front_page");

}
add_action( 'customize_register', 'mtws_customizer_register' );