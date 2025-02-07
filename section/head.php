<?php

if ($page) {
    $cssversion = filemtime("module/$page/style.css");
    $urlserver = "module/" . $page;
} else {
    $cssversion = filemtime("dashboard/style.css");
    $urlserver = "dashboard";
}

$tPc = "d-none d-md-block d-lg-block";
$tMobile = "d-block d-md-none d-lg-none";
$customcss = filemtime("assets/css/custom.css");

?>

<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Dashboard &mdash; SPK</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

<!-- CSS Libraries -->
<link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
<link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons.min.css">
<link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons-wind.min.css">
<link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">

<!-- Template CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/custom.css?v=<?= $customcss ?>">
<link rel="stylesheet" href="assets/css/components.css">


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://office.katib.id/assets/vendor/datatables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="https://office.katib.id/assets/vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="https://office.katib.id/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="https://office.katib.id/assets/vendor/jquery-selectric/public/selectric.css">
<link rel="stylesheet" href="https://office.katib.id/assets/vendor/datatables/Select-1.3.1/css/select.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!-- Module Page JS File -->
<link rel="stylesheet" href="<?= $urlserver ?>/style.css?v=<?= $cssversion ?>">

<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->