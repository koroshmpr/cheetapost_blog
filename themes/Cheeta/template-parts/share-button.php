<div class="d-flex justify-content-center my-3">
    <div class="col-12 col-lg-6 d-grid d-lg-flex gap-4 justify-content-center align-items-center">
        <p class="fs-4 fw-bold text-center mb-0">
            <span class="text-primary">اشتراک </span>گذاری
        </p>
        <?php
        // Get the current post URL
        $postUrl = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        // Get the post title and encode it for use in the share links
        $postTitle = urlencode(get_the_title());
        // Get the author's Twitter handle (replace "twitter" with your user meta key)
        $twitterHandle = get_the_author_meta('twitter');
        // Get the website name for use in the Twitter share link
        $websiteName = get_bloginfo('name');
        ?>
        <ul class="d-flex list-unstyled gap-2 m-0 align-items-center justify-content-center">
            <li>
                <a class="bg-white px-2 py-1 rounded-circle shadow-sm"
                   href="https://www.aparat.com/share?url=<?php echo urlencode($postUrl); ?>">
                    <?php get_template_part('template-parts/svg/social/aparat'); ?>
                </a>
            </li>
            <li>
                <a class="bg-white px-2 py-1 rounded-circle shadow-sm"
                   href="https://telegram.me/share/url?url=<?php echo urlencode($postUrl); ?>&text=<?php echo $postTitle; ?>">
                    <?php get_template_part('template-parts/svg/social/telegram'); ?>
                </a>
            </li>
            <li>
                <a class="bg-white px-2 py-1 rounded-circle shadow-sm"
                   href="https://www.youtube.com/share?url=<?php echo urlencode($postUrl); ?>">
                    <?php get_template_part('template-parts/svg/social/youtube'); ?>
                </a>
            </li>
            <li>
                <a class="bg-white px-2 py-1 rounded-circle shadow-sm"
                   href="https://www.instagram.com/share?url=<?php echo urlencode($postUrl); ?>">
                    <?php get_template_part('template-parts/svg/social/instagram'); ?>
                </a>
            </li>
            <li>
                <a class="bg-white px-2 py-1 rounded-circle shadow-sm"
                   href="https://twitter.com/intent/tweet?text=<?php echo urlencode('Check out this awesome post from ' . $websiteName . ': ') . $postTitle; ?>&url=<?php echo urlencode($postUrl); ?>&via=<?php echo urlencode($twitterHandle); ?>">
                    <?php get_template_part('template-parts/svg/social/twitter'); ?>
                </a>
            </li>
            <li>
                <a class="bg-white px-2 py-1 rounded-circle shadow-sm"
                   href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($postUrl); ?>&title=<?php echo $postTitle; ?>">
                    <?php get_template_part('template-parts/svg/social/linkedin'); ?>
                </a>
            </li>
        </ul>
    </div>
</div>