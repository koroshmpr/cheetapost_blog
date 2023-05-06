<div class="pt-5 bg-secondary rounded-top position-relative">
<!--    contact-form-->
    <div class="col-12 col-xl-7 col-md-10 position-absolute top-0 start-50 translate-middle gap-3 px-3 py-4 p-lg-5 bg-info border border-3 border-white rounded-3 d-flex align-items-strech flex-lg-nowrap flex-wrap justify-content-center justify-content-lg-between">
        <div class="col-12 col-lg-4 d-flex align-items-center gap-3 justify-content-center">
            <?php get_template_part('template-parts/svg/message');?>
            <div>
                <h5 class="fw-bolder fs-2 mb-0">عضویت در خبرنامه</h5>
            </div>

        </div>
        <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
    </div>
<!--    main-footer-->
    <div class="row justify-content-center pt-5">
        <div class=" py-3 pt-lg-5 col col-lg-10 row px-0">
            <!--            column-01-->
            <div class="col-lg-4 col-12 pt-3 pt-lg-0 pb-lg-3 pb-lg-0 pe-lg-5 text-center text-lg-start">
                <!--            logo -->
                <?php if (get_field('logo_type', 'option') == 'image') { ?>
                    <a class="logo-brand__footer bg-white rounded p-1 d-flex justify-content-lg-start justify-content-center gap-2 align-items-center" href="/">
                        <img src="<?= get_field('brand_logo_img', 'option')['url']; ?>"
                             alt="<?= get_field('brand_logo_img', 'option')['title']; ?>">
                        <p class="text-primary fw-bolder fs-2 d-flex justify-content-between mb-0 align-items-end">
                            <?= get_field('slogan_first' , 'option')?>
                            <span class="text-secondary fs-3 ms-2"><?= get_field('slogan_second' , 'option')?></span>
                        </p>
                    </a>
                <?php }
                if (get_field('logo_type', 'option') == 'svg') { ?>
                    <a class="logo-brand__footer bg-white rounded d-flex justify-content-lg-start justify-content-center gap-2 align-items-center" href="/">
                        <span class="bg-white rounded p-1"><?= get_field('brand_logo', 'option'); ?></span>
                        <p class="text-primary fw-bolder fs-2 d-flex justify-content-between mb-0 align-items-end">
                            <?= get_field('slogan_first' , 'option')?>
                            <span class="text-secondary fs-3 ms-2"><?= get_field('slogan_second' , 'option')?></span>
                        </p>
                    </a>
                <?php } ?>
                <!--                footer descriptions-->
                <p class="py-4 px-3 px-lg-0 text-white text-opacity-75 pe-lg-3"><?= get_field('footer_description', 'option'); ?></p>
                <!--                social media-->
                <?php get_template_part('template-parts/social-media'); ?>
                <!--                conformations-->
                <div class="d-flex gap-4 pt-4 justify-content-lg-start justify-content-center align-items-center">
                    <?php
                    while (have_rows('confirmation', 'option')): the_row();
                        ?>
                        <p class="text-dark"><?= get_sub_field('conf_items', 'option'); ?></p>
                    <?php endwhile; ?>
                </div>
            </div>
            <!--            column-02-->
            <div class="col-lg col-12 my-2 my-lg-0">
                <p class="fw-bold pb-3 text-white fs-3 text-lg-start text-center">
                    <?php
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object($locations['footerLocationOne']);
                    echo $menu->name;
                    ?>
                </p>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footerLocationOne',
                    'menu_class' => 'list-unstyled pe-0 d-flex flex-lg-column flex-wrap gap-3 justify-content-center',
                    'container' => false,
                    'menu_id' => 'navbarTogglerMenu',
                    'item_class' => 'nav-item',
                    'link_class' => 'lazy text-decoration-none text-light text-opacity-50',
                    'depth' => 1,
                ));
                ?>

            </div>
            <!--            column-03-->
            <div class="col-lg col-12 my-2 my-lg-0">
                <?php
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object($locations['footerLocationTwo']);
                if ($menu) :
                    ?>
                    <p class="fw-bold pb-3 text-white fs-3 text-lg-start text-center">
                        <?= $menu->name; ?>
                    </p>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footerLocationTwo',
                        'menu_class' => 'list-unstyled pe-0 d-flex flex-lg-column flex-wrap gap-3 justify-content-center',
                        'container' => false,
                        'menu_id' => 'navbarTogglerMenu',
                        'item_class' => 'nav-item',
                        'link_class' => 'lazy text-decoration-none text-light text-opacity-50',
                        'depth' => 1,
                    ));
                endif;
                ?>
            </div>
<!--            column-04-->
            <div class="col-lg-4 col-12">
                <p class="fw-bold pb-3 mb-0 text-white fs-3 text-lg-start text-center">آخرین مقالات </p>
                <div class="col-lg col-12 row mx-0 justify-content-center gap-3">
                    <?php
                    $args2 = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'order' => 'DESC',
                        'posts_per_page' => '2',
                        'ignore_sticky_posts' => true
                    );
                    $loop = new WP_Query($args2);
                    if ($loop->have_posts()) :
                        $i = 0;
                        /* Start the Loop */
                        while ($loop->have_posts()) :
                            $loop->the_post(); ?>
                            <div class="row col-12 all-white">
                                <?php get_template_part('template-parts/cards/title-side-image'); ?>
                            </div>
                        <?php
                        endwhile;
                    endif;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part('template-parts/layout/footer/copyright'); ?>
</div>
