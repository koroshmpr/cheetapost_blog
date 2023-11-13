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
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-transparent border-2 border-primary rounded-0">
                    <div class="modal-body">
                        <?php if (get_field('podcast-type') == 'internal') { ?>
                            <video class="w-100 my-4 rounded" src="<?php echo get_field('podcast_video')['url']; ?>" controls
                                   allowfullscreen></video>
                        <?php } ?>
                        <?php  if (get_field('podcast-type') == 'embed') {
                            echo get_field('podcast_embed');
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Add event listener for modal close event
            jQuery('#exampleModal<?php the_ID(); ?>').on('hidden.bs.modal', function () {
                // Pause or stop the video when the modal is closed
                <?php if (get_field('podcast-type') == 'internal') { ?>
                var videoElement = document.querySelector('#exampleModal<?php the_ID(); ?> video');
                if (videoElement) {
                    videoElement.pause();
                }
                <?php } ?>
                <?php if (get_field('podcast-type') == 'embed') { ?>
                var iframeElement = document.querySelector('#exampleModal<?php the_ID(); ?> iframe');
                if (iframeElement) {
                    var iframeSrc = iframeElement.getAttribute('src');
                    // Replace 'autoplay=1' with 'autoplay=0' to stop the video
                    iframeElement.setAttribute('src', iframeSrc.replace('autoplay=1', 'autoplay=0'));
                }
                <?php } ?>
            });
        </script>
    <?php
    endwhile;
endif;
wp_reset_postdata(); ?>