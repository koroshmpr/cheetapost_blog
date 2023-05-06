<?php get_template_part('template-parts/layout/header/topArea'); ?>

<nav class="sticky__nav <?=  is_admin() ? 'is__admin' : ' ';  ?> pt-1 <?php !is_single()? 'pb-1' : '' ?> start-0 end-0 z-top bg-white">
    <div class="container d-flex align-items-center justify-content-between start-0 end-0">
        <div class="d-flex gap-5">
            <!--            logo -->
            <?php if (get_field('logo_type', 'option') == 'image') { ?>
                <a class="logo-brand" href="/" aria-label="logo">
                    <img src="<?= get_field('brand_logo_img', 'option')['url']; ?>"
                         alt="<?= get_field('brand_logo_img', 'option')['title']; ?>">
                </a>
            <?php }
            if (get_field('logo_type', 'option') == 'svg') { ?>
                <a class="logo-brand" href="/" aria-label="logo">
                    <span><?= get_field('brand_logo', 'option'); ?></span>
                </a>
            <?php } ?>
            <!--        main menu-->
            <div class="navbar navbar-expand-lg d-none d-lg-inline my-auto ms-1">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <?php
                        $locations = get_nav_menu_locations();
                        $menu = wp_get_nav_menu_object($locations['headerMenuLocation']);
                        if ($menu) :
                            wp_nav_menu(array(
                                'theme_location' => 'headerMenuLocation',
                                'menu_class' => 'navbar-nav gap-2 align-items-center desktop-menu flex-wrap',
                                'container' => false,
                                'menu_id' => 'navbarTogglerMenu',
                                'item_class' => 'nav-item', // Add 'dropdown' class to top-level menu items
                                'link_class' => 'nav-link', // Add 'nav-link' and 'dropdown-toggle' classes to menu item links
                                'depth' => 2,
                            ));
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex gap-lg-3 align-items-center justify-content-center">
            <a class="pb-1 pb-lg-0" href="#" data-bs-toggle="offcanvas" data-bs-target="#searchSection" aria-controls="searchSection" aria-label="search">
                <?php get_template_part('template-parts/svg/search'); ?>
            </a>
            <a href="https://services.cheetapost.com/login" class="btn bg-primary px-5 py-3 text-white fw-bold d-none d-lg-inline">ارسال بسته</a>
            <div class="d-lg-none d-flex align-items-center">
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasMainMenu" aria-controls="offcanvasMainMenu" aria-labelledby="offcanvasMainMenu" aria-label="menu-icon">
                    <i class="bi bi-list fs-1"></i>
                </button>
            </div>
        </div>
    </div>
    <?php if(is_single() ) {
    get_template_part('template-parts/loop/post-detail-sticky');
    } ?>
</nav>
<div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="offcanvasMainMenu"
     aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header bg-white border-5 border-bottom border-secondary shadow-sm">
        <a class="offcanvas-title logo-brand" id="offcanvasNavbarLabel" href="/">
            <?php if (get_field('logo_type', 'option') == 'image') { ?>
                <a class="" href="/">
                    <img src="<?= get_field('brand_logo_img', 'option')['url']; ?>"
                         alt="<?= get_field('brand_logo_img', 'option')['title']; ?>">
                </a>
            <?php }
            if (get_field('logo_type', 'option') == 'svg') { ?>
                <a class="d-flex align-items-end gap-2" href="/">
                    <span><?= get_field('brand_logo', 'option'); ?></span>
                    <p class="text-primary fw-bolder fs-2">برترین <span class="text-secondary">خدمات</span></p>
                </a>
            <?php } ?>
        </a>
        <button type="button" class="btn-close text-reset fs-4" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <?php
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($locations['headerMenuLocation']);
        if ($menu) :
            wp_nav_menu(array(
                'theme_location' => 'headerMenuLocation',
                'menu_class' => 'navbar-nav gap-3 p-3',
                'container' => false,
                'menu_id' => 'navbarTogglerMenu',
                'item_class' => 'nav-item text-center',
                'link_class' => 'lazy text-decoration-none fs-3 text-white fw-bold',
                'depth' => 1,
            ));
        endif;
        ?>
    </div>
</div>
<!--search offcanvas-->
<div class="offcanvas offcanvas-top" tabindex="-1" id="searchSection" aria-labelledby="searchHeader">
    <div class="offcanvas-header">
        <h5 id="searchHeader">جستجوی مقالات</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex justify-content-center align-items-center">
        <?php get_template_part('template-parts/search-bar', '', ['place' => 'Desktop']) ?>
    </div>
</div>

