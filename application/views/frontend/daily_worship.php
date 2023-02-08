<style>
    img {
        width: auto;
        height: 50%;
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
        <div class="row justify-content-center">
            <?php
            if (sizeof($daily_worship) > 0) {
                foreach ($daily_worship as $key => $value) {

            ?>
                    <div class="col-md-5 sigma_box m-3">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="section-title-2 section-title-2 text-start">
                                    <h4 class="title"><?= $value['name']; ?></h4>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="clearfix">
                                    <?php
                                    if ($value['image'] != "") {
                                        if ($key % 2 == 0) {
                                    ?>
                                            <img class="col-md-5 p-3  rounded float-sm-start" src="<?= site_url($value['image']); ?>" alt="post" style="width: auto;height: 210px;">

                                        <?php
                                        } else { ?>
                                            <img class="col-md-5 p-3 rounded float-sm-end" src="<?= site_url($value['image']); ?>" alt="post" style="width: auto;height: 210px;">
                                    <?php }
                                    } ?>
                                    <div class="d-inline "><?= $value['description']; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>