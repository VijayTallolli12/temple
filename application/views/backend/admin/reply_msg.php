<style>
    #main {
        background-color: #f2f7ff;
    }

    p {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100px;
        max-height: 50px;
    }
</style>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Reply Message</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reply Message</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">

                <form action="<?= site_url("admin/send_message") ?>" method="post">
                    <input type="hidden" name="id" value="<?= $reply_id ?>">
                    <input type="hidden" name="page_id" value="<?= $page_id ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Reply Message</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <textarea name="reply_msg" id="default" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-sm-8 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>