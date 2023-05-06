<div class="container py-4 px-0">
    <div class="d-flex justify-content-between align-items-center pb-3">
        <div>
            <h4 class="mb-0 fw-bold">آخرین  مقالات چیتاپست</h4>
        </div>
        <a class="text-dark fw-bold" href="<?php echo site_url('/blog'); ?>">مشاهده همه ></a>
    </div>
    <?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'order' => 'DESC',
        'posts_per_page' => '10',
        'ignore_sticky_posts' => true
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
    $i = 0;
    /* Start the Loop */
    ?>
    <div class="row row-cols-lg-2 row-cols-1 gy-2">
        <?php while ($loop->have_posts()) :
            $loop->the_post(); ?>
                <?php get_template_part('template-parts/cards/title-under-image'); ?>
        <?php
        endwhile;
        endif;
        wp_reset_postdata(); ?>
    </div>
</div>