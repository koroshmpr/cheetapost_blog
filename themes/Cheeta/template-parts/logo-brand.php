<?php if (get_field('logo_type' ,'option') == 'image' ) { ?>
    <a class="logo-brand col d-flex fw-bold align-items-center justify-content-center" href="/">
        <img class="me-lg-3" src="<?= get_field('brand_logo_img' , 'option')['url'] ;?>"
             alt="<?= get_field('brand_logo_img' , 'option')['title'] ;?>">
        <span class="d-none d-lg-inline"> <?= get_field('brand_name' , 'option') ;?> </span>
    </a>
<?php }
if (get_field('logo_type' , 'option') == 'svg') { ?>
     <a class="logo-brand col d-flex fw-bold align-items-center justify-content-center" href="/">
        <span class="col"><?= get_field('brand_logo' , 'option') ;?></span>
        <span class="col d-none d-lg-inline"> <?= get_field('brand_name' , 'option') ;?> </span>
    </a>
<?php }?>