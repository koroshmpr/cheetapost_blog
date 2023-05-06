<div class="bg-primary py-3 rounded-bottom mb-2">
    <div class="container">
        <div class="d-flex justify-content-lg-between align-items-center justify-content-center">
            <!--topbar menu-->
            <?php
            $locations = get_nav_menu_locations();
            $menu = wp_get_nav_menu_object($locations['topHeaderMenuLocation']);
            if ($menu) :
                wp_nav_menu(array(
                    'theme_location' => 'topHeaderMenuLocation',
                    'menu_class' => 'navbar-nav d-none d-lg-flex flex-row gap-3',
                    'container' => false,
                    'menu_id' => 'navbarTogglerMenu',
                    'item_class' => 'nav-item text-center',
                    'link_class' => 'lazy text-decoration-none text-white fw-bold',
                    'depth' => 1,
                ));
            endif;
            ?>
            <div>
                <?php get_template_part('template-parts/social-media')?>
            </div>
        </div>
        <!--        social media-->

    </div>
</div>