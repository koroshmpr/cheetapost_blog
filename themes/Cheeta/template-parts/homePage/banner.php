<div class="container">
    <a href="<?= get_field('banner_link' , 'option')['url']; ?>">
        <img class="d-none d-lg-block w-100 rounded-2" width="1320" height="122" src="<?= get_field('banner_commercial' , 'option')['url']; ?>"
             alt="<?= get_field('banner_commercial' , 'option')['alt']; ?>">
        <img class="d-lg-none w-100 rounded-2 h-auto" src="<?= get_field('banner_commercial_mobile' , 'option')['url']; ?>"
             alt="<?= get_field('banner_commercial_mobile' , 'option')['alt']; ?>">
    </a>
</div>