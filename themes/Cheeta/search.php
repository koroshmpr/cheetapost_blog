 <?php get_header(); ?>
<div class="container py-5">
    <div class="w-100 mb-5 mx-auto">
        <form class="w-100 pb-3"
              method="get"
              action="<?php echo esc_url(home_url('/')); ?>">
            <div class="input-group">
                <input id="search-form" type="search" name="s"
                       class="form-control bg-light py-3"
                       placeholder="جستجو"
                       aria-label="Search">

                <button type="submit" class=" btn bg-primary text-white px-lg-5 px-3 d-flex align-items-center">
                    <i class="bi bi-search fs-5"></i>
                </button>
            </div>
        </form>
        <div class="d-block d-lg-flex align-items-center">
            نتیجه جستجو برای :
            <h1 class="fw-bold ms-3"> <?= the_search_query(); ?> </h1>
        </div>

    </div>
    <?php
    if (have_posts()) { ?>
        <div class="row my-2 row-cols-lg-3 justify-content-lg-between row-cols-1">
            <?php while (have_posts()) {
                the_post();
                get_template_part('template-parts/cards/title-under-image');
            } ?>
        </div>
    <?php
    $links = paginate_links(array(
        'type' => 'array',
        'prev_next' => true,
    ));

    if ($links) : ?>
        <nav aria-label="page navigation example">
            <ul class="pagination justify-content-center align-items-center">
                <?php
                foreach ($links as $link) {
                    echo '<li class="page-item me-4">';
                    echo $link;
                    echo '</li>';
                }
                ?>
            </ul>
        </nav>
    <?php endif;

    } else {
        echo '<h2 class="headline headline--small-plus">نتیجه ای یافت نشد</h2>';
    }
    ?>

</div>


<?php get_footer(); ?>
