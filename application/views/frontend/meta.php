<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $page_title ?> - <?= WEBSITE ?></title>
<link rel="canonical" href="<?= $base ?>">
<!-- <meta property="og:locale" content="kn-IN"> -->
<meta property="og:locale" content="en_US">

<meta property="og:site_name" content="Shiroorumatha" />



<?php if (empty($facebook)) { ?>
    <meta name="description" content="<?= (isset($pagedescription)) ? $pagedescription : DESCRIPTION; ?>">
    <meta property="og:url" content="<?= $base ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= $page_title ?>" />
    <meta property="og:description" content="<?= (isset($pagedescription)) ? $pagedescription : DESCRIPTION; ?>" />
    <meta property="og:image" content="<?= site_url($featuredImage) ?>" />
<?php } else {
    if ($facebook == "upcoming_event_details") {
        $event_detail = $upcoming_event_details;
    }
    if (!empty($event_detail['description'])) {
        $page = $event_detail['description'];
        $page = strip_tags($page);
    }
?>
    <meta property="og:url" content="<?= site_url("events/" . $event_detail['seo_title']); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?= $event_detail['title'] ?>" />
    <meta property="og:description" content="<?= (isset($page)) ? $page : DESCRIPTION; ?>" />
    <?php if ($facebook == "upcoming_event_details") { ?>
        <meta property="og:image" content="<?= site_url($event_detail['image']); ?>" />
    <?php  } else { ?>
        <meta property="og:image" content="<?= site_url($event_detail['featured_image']); ?>" />
    <?php } ?>
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="<?= (isset($page)) ? $page : DESCRIPTION; ?>" />
    <meta name="twitter:title" content="<?= $event_detail['title'] ?>" />
    <meta name="twitter:site" content="@SriShiroorMatha" />
    <?php if ($facebook == "upcoming_event_details") { ?>
        <meta property="twitter:image" content="<?= site_url($event_detail['image']); ?>" />
    <?php  } else { ?>
        <meta name="twitter:image" content="<?= site_url($event_detail['featured_image']); ?>" />
    <?php } ?>

    <meta name="twitter:creator" content="@SriShiroorMatha" />
<?php } ?>
<meta property="fb:admins" content="#" />
<meta property="og:image:width" content="256" />
<meta property="og:image:height" content="256" />
<!-- Twitter -->

<script>
    var base_url = "<?= site_url() ?>";
</script>

<meta name="theme-color" content="#7E4555">

<link rel="manifest" href="<?= site_url("manifest.json") ?>">

<script>
    if ('serviceWorker' in navigator) {
        // console.log(base_url);
        navigator.serviceWorker.register("<?= site_url("sw.js") ?>")

    }
</script>