<?php $user_array_img = get_field('profile_image', 'user_' . $post->post_author);
if ($user_array_img) { ?>
    <img class="rounded-circle" width="42" height="42" src="<?php echo $user_array_img['url'] ?>"
         alt="<?php echo $user_array_img['alt'] ?>">
<?php } else {
    ?>
    <img width="30" height="30" src="<?= get_field('favicon', 'option')['url']; ?>" alt="">
    <?php
} ?>