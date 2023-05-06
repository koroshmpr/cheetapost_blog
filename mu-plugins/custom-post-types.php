<?php
function portfolio_post_types(){
    register_post_type('podcast',
        array('supports' =>
            array( 'title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail' ),
            'rewrite' => array('slug' => 'podcast'),
            'has_archive' => true,
            'public' => true,
            'labels' => array(
                'name' => 'پادکست',
                'add_new' => 'افزودن پادکست جدید',
                'add_new_item' => 'افزودن پادکست جدید',
                'edit_item' => 'ویرایش پادکست',
                'all_items' => 'همه ی پادکست ها',
                'singular_name' => 'پادکست'),
            'menu_icon' => 'dashicons-microphone'
        ));
    register_taxonomy(
        'podcast_categories',
        'podcast',
        array('hierarchical' => true,
            'label' => 'دسته بندی پادکست',
            'query_var' => true,
        )
    );
    $labels = array('name' => _x( 'Tags', 'taxonomy general name' ),
        'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Tags' ),
        'popular_items' => __( 'Popular Tags' ),
        'all_items' => __( 'All Tags' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Tag' ),
        'update_item' => __( 'Update Tag' ),
        'add_new_item' => __( 'Add New Tag' ),
        'new_item_name' => __( 'New Tag Name' ),
        'separate_items_with_commas' => __( 'Separate tags with commas' ),
        'add_or_remove_items' => __( 'Add or remove tags' ),
        'choose_from_most_used' => __( 'Choose from the most used tags' ),
        'menu_name' => __( 'برچسب پادکست' ),    );
    register_taxonomy('podcast_tag','podcast',
        array('hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'update_count_callback' =>
                '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array( 'slug' => 'tag-podcast' ),
        ));
}
add_action('init', 'portfolio_post_types');

function create_rating_post_type() {
    $labels = array(
        'name' => 'Ratings',
        'singular_name' => 'Rating',
        'menu_name' => 'Ratings',
        'add_new_item' => 'Add New Rating',
        'edit_item' => 'Edit Rating',
        'new_item' => 'New Rating',
        'view_item' => 'View Rating',
        'search_items' => 'Search Ratings',
        'not_found' => 'No ratings found',
        'not_found_in_trash' => 'No ratings found in trash'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title'),
        'rewrite' => array('slug' => 'ratings')
    );

    register_post_type('rating', $args);
}
add_action('init', 'create_rating_post_type');
