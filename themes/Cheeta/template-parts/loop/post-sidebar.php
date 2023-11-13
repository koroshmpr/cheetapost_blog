<div class="row gap-2">
    <?php if (is_singular('podcast')) {?>
    <h4 class="fw-bold">آخرین پادکست‌ها</h4>
    <?php }?>
    <?php if (is_singular('post')) {?>
        <h4 class="fw-bold">آخرین مقالات</h4>
    <?php }?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-1 g-2">
    <?php
    if (is_singular('podcast')) {
        $args = array(
            'post_type' => 'podcast',
            'post_status' => 'publish',
            'order' => 'DESC',
            'posts_per_page' => '3',
            'ignore_sticky_posts' => true
        );
    }
    else{
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'order' => 'DESC',
            'posts_per_page' => '3',
            'ignore_sticky_posts' => true
        );
    }
    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
        $i = 0;
        /* Start the Loop */
        ?>
        <?php while ($loop->have_posts()) :
        $loop->the_post(); ?>
        <?php get_template_part('template-parts/cards/title-side-image'); ?>
    <?php
    endwhile;
    endif;
    wp_reset_postdata(); ?>
    </div>
</div>
<div class="row gap-2 mt-5">
    <h4 class="fw-bold">پر بازدیدترین مقالات</h4>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-1 g-2">
    <?php
    $args2 = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'meta_value_num',
        'meta_key' => 'post_views',
        'order' => 'DESC',
        'posts_per_page' => '3',
        'ignore_sticky_posts' => true
    );
    $loop2 = new WP_Query($args2);
    if ($loop2->have_posts()) :
        $i = 0;
        /* Start the Loop */
        ?>
        <?php while ($loop2->have_posts()) :
        $loop2->the_post(); ?>
        <?php get_template_part('template-parts/cards/title-side-image'); ?>
    <?php
    endwhile;
    endif;
    wp_reset_postdata(); ?>
    </div>
</div>
<div class="mt-5">
    <h4 class="fw-bold hero-section">مقالات پیشنهادی</h4>
    <?php
    $categories = wp_get_post_categories($post->ID);
    if ($categories) {
        $category_ids = array();
        foreach ($categories as $category) {
            $category_ids[] = $category;
        }
        $args = array(
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page' => 1,
            'ignore_sticky_posts' => true
        );
        $related_query = new WP_Query($args);
        if ($related_query->have_posts()) :
            while ($related_query->have_posts()) :
                $related_query->the_post();?>
            <div class="hero-section">
                <?php get_template_part('template-parts/cards/title-on-image');?>
            </div>
                <?php endwhile;
        endif;
        wp_reset_postdata();
    }
    ?>
</div>
<a href="<?= get_field('banner_sidebar_link' , 'option')['url']; ?>"
   class="w-100">
    <img class="w-100 mt-4" src="<?= get_field('banner_sidebar' , 'option')['url']; ?>"
         alt="<?= get_field('banner_sidebar' , 'option')['alt']; ?>">
</a>
