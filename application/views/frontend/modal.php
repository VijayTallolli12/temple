<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg popup-modal" style="max-width:48%;">
        <div class="modal-content">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $this->db->where('status', '1');
                    $banner = $this->db->get('popup_management')->result_array();
                    foreach ($banner  as $key => $value) {
                        if ($key == 0) {
                    ?>
                            <div class="carousel-item active">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?= $value['title']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="text-align: center;">
                                    <img class="" src="<?= site_url($value['image']); ?>" alt="<?= $value['title'] ?>" style="height:400px;width:auto;">
                                </div>
                                <?php if (!empty($value['link'])) { ?>
                                    <div class="modal-footer">
                                        <a href="<?= $value['link']; ?>" class="sigma_btn-custom">Visit Link</a>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <div class="carousel-item">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?= $value['title']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="text-align: center;">
                                    <img class="" src="<?= site_url($value['image']); ?>" alt="<?= $value['title'] ?>" style="height: 400px;width:auto;">
                                </div>
                                <?php if (!empty($value['link'])) { ?>
                                    <div class="modal-footer">
                                        <a href="<?= $value['link']; ?>" class="sigma_btn-custom">Visit Link</a>
                                    </div>
                                <?php } ?>
                            </div>
                    <?php }
                    } ?>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev" style="margin-top: 5rem;height:25rem;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next" style="margin-top: 5rem;height:25rem;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>