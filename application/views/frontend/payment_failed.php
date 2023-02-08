<!-- partial:partia/__subheader.html -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image:url(<?= site_url("assets/frontend/img/textures/3.jpg"); ?>)">
    <div class="container">
        <div class="sigma_subheader-inner">
            <div class="sigma_subheader-text">
                <h1><?= $page_title ?></h1>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="btn-link" href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $page_title ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Form Start -->
<div class="section" style="padding-top: 50px !important;">
    <div class="container">
        <div class="sigma_box pb-0 m-0">
            <div class="row">
                <div style="text-align:center;">
                    <i class="far fa-times-circle" style="font-size: 100px;color: red;"></i>
                    <div>
                        <p class="mb-0" style="font-size: 50px;">Payment Failed</p>
                        <p class="mb-0" style="font-size: 30px;">Please Try Again Later</p>
                    </div>
                    <div class="pb-4">
                        <a href="<?= site_url("home"); ?>" class="sigma_btn-custom">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form End -->