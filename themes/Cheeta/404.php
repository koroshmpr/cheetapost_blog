<?php
get_header();
?>

    <section class="py-5 d-flex flex-column justify-content-center align-items-center">
        <article class="z-top position-relative text-center">
            <div class="fw-bolder my-auto text-dark d-flex align-items-center justify-content-center gap-1">
                <div class="animate__animated animate__slideInLeft animate__delay-1s mb-0" style="font-size:120px">4</div>
                <img class="img-thumbnail border-3 border-dark rounded-circle animate__animated animate__headShake shadow-sm" width="150" height="150"
                     src="<?= get_field('tracking-img', '44')['url']; ?>"
                     alt="<?= get_field('tracking-img' , '44')['title']; ?>">
                <div class="animate__animated animate__slideInRight animate__delay-1s mb-0" style="font-size:120px">4</div>
            </div>
            <p>برگه یافت نشد!</p>
            <h3>برگه شما در حال حاضر حذف شده!</h3>
            <p>میتونید با برگشت به صفحه ی اصلی از بقیه وبسایت استفاده کنید</p>
            <a href="/" class="btn bg-primary text-white shadow-sm">بازگشت به صفحه اصلی</a>
        </article>
    </section>
<?php
get_footer();
