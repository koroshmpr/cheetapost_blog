<section class="container py-5 hero-section position-relative">
    <div class="d-flex justify-content-between align-items-center pb-3">
        <div>
            <h4 class="mb-0 fw-bold">پربازدید ترین مقالات چیتاپست</h4>
        </div>
        <a class="text-dark fw-bold" href="<?php echo site_url('/blog'); ?>">مشاهده همه ></a>
    </div>
    <div class="post_swiper swiper">
        <?php
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => 'meta_value_num',
            'meta_key' => 'post_views',
            'order' => 'DESC',
            'posts_per_page' => '8',
            'ignore_sticky_posts' => true
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) :
        $i = 0;
        /* Start the Loop */
        ?>
        <div class="swiper-wrapper">
            <?php while ($loop->have_posts()) :
                $loop->the_post(); ?>
                <div class="swiper-slide">
                    <?php get_template_part('template-parts/cards/title-on-image'); ?>
                </div>
                <?php
            endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>

<!--        <div class="swiper-pagination"></div>-->
    </div>
    <div class="swiper-button-next swiper__nav"></div>
    <div class="swiper-button-prev swiper__nav"></div>
</section>