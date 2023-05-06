<?php
/** Template Name: Blog Page */

get_header(); ?>

    <section class="container py-5">
        <div class="row justify-content-center pb-5">
            <!--        selection post of blogs-->
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            if (is_home() && !is_category() && 1 == $paged) {
                ?>
                <div class="col-lg-10 col-12 row py-3">
                    <h2 class="text-start fw-bolder fs-1">
                        آخرین مقالات
                    </h2>
                </div>
                <div class="row row-cols-lg-3 gx-5 row-cols-1 justify-content-center">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => '3',
                        'ignore_sticky_posts' => true
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) : $i = 0;
                        /* Start the Loop */
                        while ($loop->have_posts()) :
                            $loop->the_post();?>
                        <div class="p-lg-2">
                            <?php get_template_part('template-parts/cards/title-on-image'); ?>
                        </div>
                       <?php endwhile;
                    endif;
                    wp_reset_postdata(); ?>
                </div>
                <!--        most visited post-->

                <!--                --><?php //get_template_part('template-parts/blogpage/most-visited'); ?>
            <?php } ?>

            <!--        main area  and sidebar-->
            <div class="row justify-content-center pt-3">
                <!--            main area-->
                <div class="col-12">
                    <!--                vertical post list -->
                    <?php if (have_posts()) : ?>
                        <?php if (is_category()) { ?>
                            <h5 class="text-start">
                                <?php echo single_cat_title() ?>
                            </h5>
                        <?php } else { ?>
                            <h5 class="text-start">
                                جدیدترین پست‌های چیتا پست
                            </h5>
                        <?php } ?>
                        <div class="row my-3 row-cols-lg-3 row-cols-1">
                            <?php
                            /* Start the Loop */
                            while (have_posts()) :
                                the_post();
                                get_template_part('template-parts/cards/title-under-image');
                            endwhile; ?>
                        </div>
                        <?php
                        $links = paginate_links(array(
                            'type' => 'array',
                            'prev_next' => false,

                        ));
                        if ($links) : ?>
                            <nav aria-label="age navigation example">
                                <?php echo '<ul class="pagination justify-content-center align-items-center">';
                                // get_previous_posts_link will return a string or void if no link is set.
                                if ($prev_posts_link = get_previous_posts_link(__('قبلی'))) :
                                    echo '<li class="prev-list-item bg-primary py-2 px-4 rounded text-white page-item me-4">';
                                    echo $prev_posts_link;
                                    echo '</li>';
                                endif;
                                echo '<li class="page-item me-4">';
                                echo join('</li><li class="page-item me-4">', $links);
                                echo '</li>';

                                // get_next_posts_link will return a string or void if no link is set.
                                if ($next_posts_link = get_next_posts_link(__('بعدی'))) :
                                    echo '<li class=" next-list-item bg-primary px-3 py-2 rounded text-white page-item me-4">';
                                    echo $next_posts_link;
                                    echo '</li>';
                                endif;
                                echo '</ul>';
                                ?>
                            </nav>

                        <?php endif;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>