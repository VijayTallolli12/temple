<script src="<?= site_url("vendor/perfect-scrollbar/perfect-scrollbar.min.js"); ?>"></script>
<script src="<?= site_url("assets/backend/js/bootstrap.bundle.min.js"); ?>"></script>

<script src="<?= site_url("vendor/apexcharts/apexcharts.js"); ?>"></script>

<script src="<?= site_url("vendor/simple-datatables/simple-datatables.js"); ?>"></script>
<script src="<?= site_url("assets/backend/js/jquery.min.js"); ?>"></script>
<script src="<?= site_url("assets/backend/js/mazer.js"); ?>"></script>

<script src="<?= site_url("vendor/toastify/toastify.js"); ?>"></script>

<script src="<?= site_url("vendor/fontawesome/all.min.js"); ?>"></script>

<script src="<?= site_url("vendor/tinymce/tinymce.min.js"); ?>"></script>
<script src="<?= site_url("vendor/tinymce/plugins/code/plugin.min.js"); ?>"></script>

<script src="<?= site_url("assets/backend/js/extensions/sweetalert2.js") ?>"></script>
<script src="<?= site_url("vendor/sweetalert2/sweetalert2.all.min.js") ?>"></script>

<script src="<?= site_url("assets/backend/js/jquery-validation/lib/jquery.js"); ?>"></script>
<script src="<?= site_url("assets/backend/js/jquery-validation/dist/jquery.validate.js"); ?>"></script>
<script src="<?= site_url("assets/backend/js/jquery-validation/dist/additional-methods.js"); ?>"></script>

<script>
    tinymce.init({
        selector: '#default',
        branding: false
    });
    tinymce.init({
        selector: '#default1',
        branding: false
    });
    tinymce.init({
        selector: '#default2',
        branding: false
    });
    tinymce.init({
        selector: '#default3',
        branding: false
    });
</script>
<!-- Include Choices JavaScript -->
<script src="<?= site_url("vendor/choices.js/choices.min.js"); ?>"></script>

<!-- custom scripts -->
<script src=" <?= site_url("assets/backend/js/custom.js"); ?>"></script>
<script src=" <?= site_url("assets/backend/js/validation.js"); ?>"></script>

<!-- filepond -->
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

<script>
    // register desired plugins...
    FilePond.registerPlugin(
        // preview the image file type...
        FilePondPluginImagePreview,
    );

    // Filepond: Multiple Files
    FilePond.create(document.querySelector('.multiple-files-filepond'), {
        allowImagePreview: true,
        allowMultiple: true,
        allowFileEncode: false,
        required: false,
        storeAsFile: true,
        credits: false
        // acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
        // fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
        //     // Do custom type detection here and return with promise
        //     resolve(type);
        // })
    });

    // Filepond: Multiple Files for Favicon
    FilePond.create(document.querySelector('.multiple-files-filepond-favicon'), {
        allowImagePreview: true,
        allowMultiple: true,
        allowFileEncode: false,
        required: false,
        storeAsFile: true,
        credits: false
        // acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
        // fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
        //     // Do custom type detection here and return with promise
        //     resolve(type);
        // })
    });
</script>