<section class="bg-info bg-opacity-25 py-5 mb-5 position-relative">
    <div class="position-absolute top-100 left-0 w-100 translate-middle-y">
        <?php get_template_part('template-parts/svg/shape'); ?>
    </div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-lg-6 d-lg-flex d-block pt-4 pt-lg-0 gap-5 text-center justify-content-center align-items-center order-2 order-lg-1">
                <img class="animate__animated animate__fadeInLeft pb-3 pb-lg-0" src="<?= get_field('tracking-img')['url']; ?>"
                     alt="<?= get_field('tracking-img')['title']; ?>">
                <div>
                    <h4 class="fw-bold fs-4">پیگیری سفارشات در چیتاپست</h4>
                </div>
            </div>
            <div class="col-12 col-lg-6 pt-3 pt-lg-0 order-1 order-lg-2">
                <ul class="track-tab nav nav-tabs border-0 gap-1 justify-content-center">
                    <li class="nav-item">
                        <button class="nav-link nav-link active fw-bold"  type="button">
                            رهگیری بسته
                        </button>
                    </li>
                    <li class="nav-item">
                        <a href="https://services.cheetapost.com/pricing" class="nav-link nav-link fw-bold">استعلام قیمت</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://services.cheetapost.com/login" class="nav-link nav-link fw-bold">ارسال بسته</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://cheetapost.com/agencies/" class="nav-link nav-link fw-bold" >نمایندگی</a>
                    </li>
                </ul>
                <div class="tab-content pt-4">
                    <div class="tab-pane fade show active">
                        <div class="input-group">
                            <div class="form-floating col">
                                <input type="text" class="form-control shadow-sm"
                                       placeholder="name@example.com">
                                <label for="rahgiri">کد رهگیری</label>
                            </div>
                            <a href="https://cheeta.frotel.com/"
                               class="btn text-primary fw-bold fs-6 position-absolute end-0 top-50 translate-middle text-shadow"
                               type="button" id="button-addon1">رهگیری
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>