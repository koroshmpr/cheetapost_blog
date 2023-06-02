<form class="search-form d-flex gap-1 align-items-center col-lg-8 col-12" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input id="search-form-<?= $args['place'] ?>" type="search" name="s" class="py-3 form-control text-primary bg-light bg-opacity-25" placeholder="جستجو" aria-label="Search">
        <button type="submit" class=" btn bg-primary text-white px-lg-5 px-3 d-flex align-items-center">
            <i class="bi bi-search fs-5"></i>
        </button>
    </div>
</form>

<div class="position-absolute bg-white container-fluid top-100 start-50 translate-middle-x overflow-scroll search-overlay__results z-top search-box-overflow">

</div>