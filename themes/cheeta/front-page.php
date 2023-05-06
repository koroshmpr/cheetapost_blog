<?php /* Template Name: Home */
/**
 * Front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pandplus
 */

get_header();


if (have_posts())
    the_post();
// hero
get_template_part('template-parts/homePage/hero');
// track orders
get_template_part('template-parts/homePage/track-orders');
// banner
get_template_part('template-parts/homePage/banner');
/// most visited post
get_template_part('template-parts/homePage/most-visited-post');
// podcasts
get_template_part('template-parts/homePage/podcast');
// recetly added post
get_template_part('template-parts/homePage/post-loop-with-banner');

get_footer();

$args3 = array(
    'post_type' => 'podcast',
    'post_status' => 'publish',
    'order' => 'DESC',
    'posts_per_page' => '5',
    'ignore_sticky_posts' => true,
);
$loop = new WP_Query($args3);
if ($loop->have_posts()) :
    $i = 0;
    /* Start the Loop */
    while ($loop->have_posts()) :
        $loop->the_post(); ?>
        <div class="modal fade" id="exampleModal<?php the_ID(); ?>" tabindex="-1"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <video class="w-100 rounded" src="<?= get_field('podcast_video')['url']; ?>"
                               controls allowfullscreen></video>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endwhile;
endif;
wp_reset_postdata(); ?>