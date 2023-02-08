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
<section class="section">
    <div class="container">
        <!-- Cart Table Start -->
        <?php if ($this->cart->total_items() > 0) { ?>
            <table class="sigma_responsive-table">

                <thead>
                    <tr>
                        <th class="remove-item"></th>
                        <th>Seva Name</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->cart->contents() as  $items) {
                        $name1 = str_replace('-', '(', $items['name']);
                        $final_name = str_replace('_', ')', $name1);
                    ?>
                        <tr>
                            <td class="remove">
                                <a href="<?= site_url("payment/remove_cart/" . $items['rowid']) ?>" class="close-btn close-danger remove-from-cart">
                                    <span></span>
                                    <span></span>
                                </a>
                            </td>
                            <td data-title="E Seva">
                                <div class="sigma_cart-product-wrapper">
                                    <div class="sigma_cart-product-body">
                                        <h6> <a href="#"><?= $final_name; ?></a> </h6>
                                    </div>
                                </div>
                            </td>
                            <td data-title="Amount"> <strong><i class="far fa-rupee-sign"></i> <?= $items['price']; ?></strong> </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>

            <div class="col-12 mb-2" style="text-align: center;">
                <h4>
                    No Seva's Present
                </h4>
            </div>
        <?php } ?>
        <!-- Cart Table End -->
        <div class="row pb-4 pr-4" id="e_seva_list_nav">
            <div class="col-md-12" style="text-align: center;">
                <a href="<?= site_url("seva/e-seva"); ?>" class="sigma_btn-custom">
                    <i class="far fa-chevron-left" style="padding-right: 3px;"></i> Go To Seva
                </a>
                <?php if ($this->cart->total_items() > 0) { ?>
                    <a href="<?= site_url("seva/seva_payment"); ?>" class="sigma_btn-custom flex-end">
                        Continue <i class="far fa-chevron-right"></i>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<div class="row mobile_list">
    <div class="col-2 text-start">
        <span>
            <a href="<?= site_url("seva/e-seva"); ?>" class="d-inline-flex text-white">
                <i class="fas fa-chevron-left"></i>
            </a>
        </span>
    </div>
    <div class="col-4 text-start">
        <span>
            <i class="far fa-rupee-sign"></i>
            <?php if ($this->cart->total() > 0) {
                echo $this->cart->total();
            } else {
                echo 0;
            } ?>
        </span>
    </div>
    <div class="col-6 text-end">
        <?php if ($this->cart->total_items() > 0) { ?>
            <span style="margin-left: 1%;">
                <a href="<?= site_url("seva/seva_payment"); ?>" style="color: white;">
                    Continue
                </a>
            </span>
        <?php } ?>
    </div>
</div>