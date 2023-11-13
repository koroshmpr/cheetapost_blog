<?php get_header();

track_post_views(get_the_ID());


while (have_posts()) :

    the_post();

    $comment_count = get_comments_number(); // Get the number of comments for this post

    ?>

    <svg class="position-fixed top-0 start-0 w-100 h-auto" style="z-index: -1" xmlns="http://www.w3.org/2000/svg"
         version="1.2" viewBox="0 0 1728 564" width="1728" height="564">
        <defs>
            <image width="1728" height="72" id="img1"
                   href="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTcyOCIgaGVpZ2h0PSI3MiIgdmlld0JveD0iMCAwIDE3MjggNzIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxnIGNsaXAtcGF0aD0idXJsKCNjbGlwMF80MTk4XzIwNjIpIj4KPHBhdGggZD0iTS00ODAgMTc2QzE2Ny4wNjYgLTI0Ljc5NCAxMjM0LjEgLTEwLjk0MSAxNzI4IDEzLjg3NTFWMTc2SC00ODBaIiBmaWxsPSJ3aGl0ZSIvPgo8L2c+CjxkZWZzPgo8Y2xpcFBhdGggaWQ9ImNsaXAwXzQxOThfMjA2MiI+CjxyZWN0IHdpZHRoPSIxNzI4IiBoZWlnaHQ9IjcyIiBmaWxsPSJ3aGl0ZSIvPgo8L2NsaXBQYXRoPgo8L2RlZnM+Cjwvc3ZnPgo="/>
        </defs>
        <style>
            .s0 {
                fill: #f8f9fa
            }
        </style>
        <path id="Layer" class="s0" d="m0 0h1728v564h-1728z"/>
        <use id="svgexport-2 (1) 1" href="#img1" transform="matrix(1,0,0,1,0,492)"/>
    </svg>
    <section class="container py-2">
        <div class="row align-items-start pb-4 justify-content-lg-between justify-content-center">
            <div class="col-12 col-lg-8">
                <!--                breadcrumb-->
                <div class="p-3">
                    <nav class="row" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ul class="breadcrumb d-flex fw-bold gap-2 list-unstyled">
                            <li class="breadcrumb-item">صفحه اصلی</li>
                            <?php if (get_queried_object()->post_type == 'podcast'): ?>
                            <li class="breadcrumb-item">پادکست</li>
                            <li class="breadcrumb-item">
                                <?php endif;
                                $category_detail = get_the_terms($post->ID, 'podcast_categories');
                                $category_count = count($category_detail);
                                $i = 0;
                                foreach ($category_detail as $category) {
                                    echo $category->name;
                                    if (++$i !== $category_count) {
                                        echo ' - ';
                                    }
                                } ?>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--                title-->
                <h1 class="fw-bold text-dark"><?= get_the_title(); ?></h1>
                <div class="d-flex justify-content-between align-items-center">
                    <!--                    post detail-->
                    <div class="d-flex gap-2 align-items-center justify-content-start py-3">
                        <?php get_template_part('template-parts/cards/post-detail/author-image'); ?>
                        <div>
                            <h4 class="fs-5">
                            <?php
                            if (get_field('podcast-type') == 'embed') {
                                $iframeSrc = get_field('podcast_embed');
                            }
                            if (get_field('podcast-type') == 'internal ') {
                                $iframeSrc = get_field('podcast_video');
                            }

                            // Extract the iframe URL using regular expressions
                            preg_match('/<iframe[^>]+src=([\'"])(?<src>.+?)\1/', $iframeSrc, $matches);
                            if (isset($matches['src'])) {
                                $iframeUrl = $matches['src'];

                                // Extract the video hash from the iframe URL
                                preg_match('/\/videohash\/([^\/]+)/', $iframeUrl, $hashMatches);
                                if (isset($hashMatches[1])) {
                                    $videoHash = $hashMatches[1];

                                    // Make a request to the Aparat API to fetch video metadata
                                    $apiUrl = "https://www.aparat.com/etc/api/video/videohash/{$videoHash}";
                                    $apiResponse = wp_remote_get($apiUrl);

                                    if (!is_wp_error($apiResponse)) {
                                        $apiBody = wp_remote_retrieve_body($apiResponse);
                                        $apiData = json_decode($apiBody);

                                        if (isset($apiData->video->duration)) {
                                            $videoDuration = $apiData->video->duration;

                                            // Convert the duration to clock format
                                            $durationInSeconds = intval($videoDuration);
                                            $hours = floor($durationInSeconds / 3600);
                                            $minutes = floor(($durationInSeconds % 3600) / 60);
                                            $seconds = $durationInSeconds % 60;
                                            $formattedDuration = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                                            echo 'زمان پادکست : ' . $formattedDuration;
                                        }
                                    }
                                }
                            }
                            ?>
                            </h4>
                            <div class="fw-normal fs-6">
                                <?php echo get_the_date('d  F , Y'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-lg-flex d-grid gap-lg-2 gap-1 align-items-center">
                        <?php
                        $post_id = get_the_ID();
                        $rating_value = get_post_meta($post_id, 'rating_value', true);

                        // Get total ratings and average rating
                        $total_ratings = get_post_meta($post_id, 'total_ratings', true);
                        $total_rating_value = get_post_meta($post_id, 'total_rating_value', true);
                        $average_rating = 0;

                        if (is_numeric($total_ratings) && is_numeric($total_rating_value) && $total_ratings > 0) {
                            $average_rating = round($total_rating_value / $total_ratings, 1);
                        }
                        // Display the stars and average rating
                        ?>
                        <div class="d-flex gap-1 align-items-center justify-content-center">
                            <div class="rating">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $average_rating) {
                                        echo '<span class="star filled"><i class="bi bi-star-fill  text-primary"></i></span>';
                                    } else {
                                        echo '<span class="star"><i class="bi bi-star text-primary"></i></span>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="ratings-summary text-center">
                                <?php
                                //                            echo '<span class="total-ratings">' . $total_ratings . ' ratings</span>';
                                //                            echo '<br>';
                                echo '<span class="average-rating">' . $average_rating . '</span>';
                                ?>
                            </div>
                        </div>
                        <div class="d-flex gap-2 align-items-stretch justify-content-center">
                            <a href="#comment-section" class="rounded d-flex align-items-center shadow-sm px-2"><i
                                        class="bi bi-chat-square-dots me-2"></i> <?= $comment_count; ?></a>
                            <div class="d-none d-lg-inline vr bg-opacity-50 bg-dark"></div>
                            <a class="btn shadow-sm" href="#share-section"><i class="bi bi-share"></i></a>
                        </div>
                    </div>
                </div>
                <!--                thumbnail-->
                <div class="img-fluid">
                    <img class="w-100 object-fit rounded-2"
                         src="<?= get_the_post_thumbnail_url(); ?>"
                         alt="<?= the_title(); ?>"/>
                </div>
                <!--                content-->
                <article class="pt-5 text-justify">
                    <?= the_content(); ?>
                    <div class="pb-3" id="share-section"></div>
                </article>
                <?php if (get_field('podcast-type') == 'internal') { ?>
                    <video class="w-100 my-4 rounded" src="<?php echo get_field('podcast_video')['url']; ?>" controls
                           allowfullscreen></video>
                <?php } ?>
                <?php if (get_field('podcast-type') == 'embed') {
                    echo get_field('podcast_embed');
                } ?>
                <!--                rating-->
                <div class="rating-section p-3 rounded bg-info bg-opacity-25 d-flex justify-content-between align-items-center my-5">
                    <p class="mb-0 fw-bold">چه میزان از این مقاله لذت بردید</p>
                    <div class="rating">
                        <?php
                        $post_id = get_the_ID();
                        $rating_value = get_post_meta($post_id, 'rating_value', true);
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating_value) {
                                echo '<span class="star filled"><i class="bi bi-star-fill text-primary"></i></span>';
                            } else {
                                echo '<span class="star"><i class="bi bi-star text-primary"></i></span>';
                            }
                        }
                        ?>
                    </div>
                    <script>
                        jQuery(document).ready(function ($) {
                            $('.rating .star').click(function () {
                                $(this).prevAll('.star').addBack().find('i').removeClass('bi-star').addClass('bi-star-fill');
                                $(this).nextAll('.star').find('i').removeClass('bi-star-fill').addClass('bi-star');
                                var ratingValue = $(this).index() + 1;
                                $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
                                    action: 'save_rating',
                                    post_id: <?php echo $post_id; ?>,
                                    rating_value: ratingValue
                                });
                            });
                        });
                    </script>
                </div>
                <!--                share button-->
                <?php get_template_part('template-parts/share-button'); ?>
                <!--                tags-->
                <?php
                $tags = get_the_tags();
                if ($tags) { ?>
                    <div>
                        <p class="fw-bold fs-3 py-3">برچسب های این مقاله</p>
                        <?php echo '<ul class="d-flex gap-2 align-items-center list-unstyled">';
                        foreach ($tags as $tag) {
                            echo '<li class="bg-primary bg-opacity-10 px-2 text-primary py-2 rounded-2"><i class="bi bi-tag-fill me-1"></i><a class="text-primary" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
                        }
                        echo '</ul>'; ?>
                    </div>
                <?php } ?>
                <!--                author information-->
                <div class="row justify-content-center p-3 my-3" id="comment-section">
                    <div class="col-12 bg-info bg-opacity-25 text-center rounded-2 shadow-sm p-lg-5 p-md-3 p-4 row align-items-center justify-content-lg-start">
                        <div class="col-12 col-lg-2 py-2 py-md-0">
                            <?php $user_array_img = get_field('profile_image', 'user_' . $post->post_author);
                            if ($user_array_img) { ?>
                                <img width="60" class="rounded-circle" src="<?php echo $user_array_img['url'] ?>"
                                     alt="<?php echo $user_array_img['alt'] ?>">
                            <?php } else {
                                ?>
                                <img width="60" src="<?= get_field('favicon', 'option')['url']; ?>" alt="">
                                <?php
                            } ?>
                        </div>
                        <div class="col-12 col-lg-10">
                            <h5 class="text-lg-start fs-3 fw-bold"><?= get_the_author_meta('nickname', get_queried_object()->post_author); ?></h5>
                            <p class="text-lg-start">
                                <?= get_the_author_meta('description', get_queried_object()->post_author); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!--                comments-->
                <div class="my-2">
                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>
            </div>
            <!--            sidebar-->
            <aside class="row justify-content-center col-lg-4 col-12 pt-4 px-lg-4">
                <?php get_template_part('template-parts/loop/post-sidebar'); ?>
            </aside>
        </div>
    </section>
<?php endwhile;
wp_reset_query();
get_footer(); ?>

