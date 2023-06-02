<section class="bg-info bg-opacity-25 py-5 mb-5 position-relative">
    <div class="position-absolute top-100 left-0 w-100 translate-middle-y">
        <?php get_template_part('template-parts/svg/shape'); ?>
    </div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-lg-6 d-lg-flex d-block pt-4 pt-lg-0 gap-5 text-center justify-content-center align-items-center order-2 order-lg-1">
                <img class="animate__animated animate__fadeInLeft pb-3 pb-lg-0"
                     src="<?= get_field('tracking-img')['url']; ?>"
                     alt="<?= get_field('tracking-img')['title']; ?>">
                <div>
                    <h4 class="fw-bold fs-4">پیگیری سفارشات در چیتاپست</h4>
                </div>
            </div>
            <div class="col-12 col-lg-6 pt-3 pt-lg-0 order-1 order-lg-2">
                <ul class="track-tab nav nav-tabs border-0 gap-1 justify-content-center">
                    <li class="nav-item">
                        <button class="nav-link nav-link active fw-bold" type="button">
                            رهگیری بسته
                        </button>
                    </li>
                    <li class="nav-item">
                        <a href="<?= get_field('second_link'); ?>" class="nav-link nav-link fw-bold">استعلام قیمت</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= get_field('third_link'); ?>" class="nav-link nav-link fw-bold">ارسال بسته</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= get_field('fourth_link'); ?>" class="nav-link nav-link fw-bold">نمایندگی</a>
                    </li>
                </ul>
                <div class="tab-content pt-4">
                    <div class="tab-pane fade show active">
                        <div class="input-group">
                            <div class="form-floating col">
                                <input maxlength="12" pattern="[0-9]{12}" required id="barcode" type="text"
                                       class="form-control shadow-sm" placeholder="کد 12 رقمی رهگیر">
                                <label for="barcode">کد رهگیری</label>
                            </div>
                            <button class="btn text-primary fw-bold fs-6 position-absolute end-0 top-50 translate-middle text-shadow"
                                    type="button" onclick="barcode()" id="submit_barcode">
                                رهگیری
                            </button>
                            <script>
                                function barcode() {
                                    var inputData = document.getElementById("barcode");
                                    if (inputData && inputData.value && inputData.value.length == 12 && !(isNaN(inputData.value))) {
                                        window.open(
                                            "<?= get_field('first_link');?>" + inputData.value.toString(),
                                            "_blank"
                                        )
                                        return;
                                    }else if (isNaN(inputData.value)) {
                                        alert("فقط عدد مجاز است!");
                                        return false;
                                    }

                                    else {
                                        alert("کد 12 رقمی رهگیری را وارد کنید");
                                        return;
                                    }
                                }
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>