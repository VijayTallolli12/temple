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
                <h3>Report Genration</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Report Genration</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <h5>Seva Report Genration</h5>
                </div>
                <br>
                <form action="<?= site_url("Excel_export/download_seva_details_excel"); ?>" method="post">
                    <div class="row">
                        <div class="col-md-4">Start Date</div>
                        <div class="col-md-8 form-group">
                            <input type="date" class="form-control" name="start_date" required>
                        </div>
                        <div class="col-md-4">End Date</div>
                        <div class="col-md-8 form-group">
                            <input type="date" class="form-control" name="end_date" required>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-sm-8 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <h5>Kanike Report Genration</h5>
                </div>
                <br>
                <form action="<?= site_url("Excel_export/download_kanike_details_excel"); ?>" method="post">
                    <div class="row">
                        <div class="col-md-4">Start Date</div>
                        <div class="col-md-8 form-group">
                            <input type="date" class="form-control" name="start_date" required>
                        </div>
                        <div class="col-md-4">End Date</div>
                        <div class="col-md-8 form-group">
                            <input type="date" class="form-control" name="end_date" required>
                        </div>
                        <div class="col-md-4"></div>
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