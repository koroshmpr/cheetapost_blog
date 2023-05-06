<section class="bg-dark py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center pb-3">
            <div>
                <h4 class="mb-0 fw-bold text-white">ویدیوها و پادکست‌ها</h4>
            </div>
            <a class="text-white fw-bold" href="<?php echo site_url('/podcast'); ?>">مشاهده همه ></a>
        </div>
        <div class="row gap-5 pt-3 pt-lg-0">
            <?php
            $args = array(
                'post_type' => 'podcast',
                'post_status' => 'publish',
                'order' => 'DESC',
                'posts_per_page' => '1',
                'ignore_sticky_posts' => true,
            );

            $loop = new WP_Query($args);
            if ($loop->have_posts()) :
                $i = 0;
                /* Start the Loop */
                while ($loop->have_posts()) :
                    $loop->the_post(); ?>
                    <div class="col-12 col-lg-7">
                        <article class="rounded card__title-on-image object-fit position-relative"
                                 style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')">
                            <span class="position-absolute top-50 start-50 translate-middle fs-3"
                                  data-bs-toggle="modal" data-bs-target="#exampleModal<?php the_ID(); ?>">
                             <?php
                             $size = 100;
                             get_template_part('template-parts/svg/play-fill', null, array('size' => $size));
                             ?>

                            </span>
                            <a href="<?php the_permalink(); ?>"
                               class="d-flex h-100 flex-column justify-content-between p-3 align-items-start">
                                <div class="col-11 d-flex gap-2 align-items-center justify-content-start">
                                    <?php get_template_part('template-parts/cards/post-detail/author-image'); ?>
                                    <div>
                                        <div class="fs-6 text-center">
                                            ارسال توسط
                                            <span class="fw-bolder">
                        <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                    </span>
                                        </div>
                                        <div class="fw-normal fs-6">
                                            <?php echo get_the_date('d  F , Y'); ?>
                                        </div>
                                    </div>

                                </div>
                                <div>
                                    <div class="px-2">
                                        <?php
                                        $category_detail = get_the_terms($post->ID, 'podcast_categories'); ?>
                                        <h5 class="fs-6 fw-bold text-primary">
                                            <?php
                                            $category_count = count($category_detail);
                                            $i = 0;
                                            foreach ($category_detail as $category) {
                                                echo $category->name;
                                                if (++$i !== $category_count) {
                                                    echo ' - ';
                                                }
                                            }
                                            ?>
                                        </h5>
                                        <p class="text-white fs-5"> <?= get_the_title(); ?></p>
                                    </div>
                                </div>
                            </a>
                            <!-- Modal -->
                        </article>
                    </div>
                <?php
                endwhile;
            endif;
            wp_reset_postdata(); ?>
            <div class="col-lg col-12 row mx-0 justify-content-center gap-3">
                <?php
                $args2 = array(
                    'post_type' => 'podcast',
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'posts_per_page' => '4',
                    'ignore_sticky_posts' => true,
                    'offset' => 1,
                );
                $loop = new WP_Query($args2);
                if ($loop->have_posts()) :
                    $i = 0;
                    /* Start the Loop */
                    while ($loop->have_posts()) :
                        $loop->the_post(); ?>
                        <div class="col-12">
                            <a class="card__title-side-image" href="<?php the_permalink(); ?>">
                                <div class="row gap-2 align-items-center justify-content-center">
                                    <div class="position-relative col-4 rounded p-0 overflow-hidden">
                                        <img class="w-100 object-fit" src="<?php echo the_post_thumbnail_url(); ?>"
                                             alt="<?= get_the_title(); ?>">
                                        <span class="position-absolute top-50 start-50 translate-middle fs-3"
                                              data-bs-toggle="modal" data-bs-target="#exampleModal<?php the_ID(); ?>">
                                           <?php
                                           $size = 30;
                                           get_template_part('template-parts/svg/play-fill', null, array('size' => $size));
                                           ?>
                                        </span>
                                    </div>
                                    <div class="row gap-2 col">
                                        <div class="d-flex gap-2 align-items-center px-0">
                                            <?php
                                            $category_detail = get_the_terms($post->ID, 'podcast_categories');?>
                                            <h5 class="fs-6 mb-0 text-white">
                                                <?php
                                                $category_count = count($category_detail);
                                                $i = 0;
                                                foreach ($category_detail as $category) {
                                                    echo $category->name;
                                                    if (++$i !== $category_count) {
                                                        echo ' - ';
                                                    }
                                                }
                                                ?>
                                            </h5>
                                            <div class="vr text-white"></div>
                                            <span class="fw-normal fs-6 d-flex gap-1 align-items-center text-white">
                                              <?php get_template_part('template-parts/svg/clock');
                                              echo get_the_date('d  F , Y'); ?>
                                            </span>
                                        </div>
                                        <p class="fs-6 mb-0 text-dark px-0 text-white"><?= get_the_title(); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    endwhile;
                endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>