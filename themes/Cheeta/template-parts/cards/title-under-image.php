<article class="position-relative card__title-under-image">
    <a class="row p-2 rounded" href="<?php the_permalink(); ?>">
        <img class="post-cover object-fit rounded p-0" src="<?php echo the_post_thumbnail_url(); ?>"
             alt="<?= get_the_title(); ?>">
        <span class="category-badge bg-primary border border-2 border-white border-start-0 fw-bold text-shadow text-white shadow-sm text-decoration-none py-2 px-3 small">
                     <?php
                     $category_detail = get_the_category($post->ID);
                     $category_count = count($category_detail);
                     $i = 0;
                     foreach ($category_detail as $category) {
                         echo $category->name;
                         if (++$i !== $category_count) {
                             echo ' - ';
                         }
                     }
                     ?>
            </span>
        <div>
            <div>
                <h5 class="fs-5 fw-bold"> <?= get_the_title(); ?></h5>
                <p class="fs-6 text-justify"><?= wp_trim_words(get_the_content(), 35); ?></p>
            </div>
        </div>
    </a>
</article>