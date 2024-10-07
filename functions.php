<?php 

function university_files() {
    wp_enqueue_script('main-uni-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('uni_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('uni_extra_styles', get_theme_file_uri('/build/index.css'));
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('custom-google-fonts', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

}

add_action('wp_enqueue_scripts', 'university_files');

function uni_features(){
    // register_nav_menu( 'headerLocation', 'Header Description' );
    // register_nav_menu( 'footerLocationOne', 'Footer Location One' );
    // register_nav_menu( 'footerLocationTwo', 'Footer Location Two' );
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'uni_features');


function uni_adjust_queries($query) {
    if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query',array(
            array(
              'key' => 'event_date',
              'compare' => '>=',
              'value' => $today,
              'type' => 'numeric'
            )
          ));
    }
}

add_action('pre_get_posts', 'uni_adjust_queries');
// added and created a new folder for the events post type this is in a new local folder
// This folder is not on Github