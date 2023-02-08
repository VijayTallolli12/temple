<style>
    img {
        width: auto;
        height: 75%;
    }

    .sigma_post-single-thumb {
        width: auto;
        height: 75%;
    }
</style>
<!-- partial:partia/__subheader.html -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image:url(<?= site_url("assets/frontend/img/textures/3.jpg") ?>)">
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
<!-- partial -->
<section class="section">
    <div class="container">
        <?php
        if (sizeof($activities) > 0) {
            foreach ($activities as $key => $value) {
        ?>
                <div class="sigma_box pb-0 m-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sigma_icon-block icon-block-3 mb-0">
                                <div class="sigma_icon-block-content">
                                    <h4> <?= $value['title']; ?> </h4>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($value['image'] != "") {
                        ?>
                            <div class="col-md-4 p-2 ms-md-3 rounded">
                                <img src="<?= site_url($value['image']); ?>">
                            </div>
                        <?php
                        } ?>
                        <?= $value['description']; ?>
                    </div>
                </div>
                <br>
        <?php }
        }
        ?>
    </div>
</section>