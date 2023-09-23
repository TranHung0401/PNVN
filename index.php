<?php
if (!isset($_SESSION)) {
    //session_set_cookie_params(['SameSite' => 'None']);
    session_start();
}
ob_start();
error_reporting(0);
define('_source', './sources/');
define('_lib', './admin/lib/');
define('_source_lib', 'sources/lib/');
//session_destroy();
global $d;
global $lang;
include _lib . "config.php";
include_once _lib . "function.php";
include_once _lib . "class.php";
$d = new func_index($config['database']);
include_once _source_lib . "lang.php";
include_once _source_lib . "info.php";
include_once _source_lib . "function.php";
include _source_lib . "file_router_index.php";
$ZERO_PATH = _lib . "Mobile_Detect.php";
require_once($ZERO_PATH);
$detect = new Mobile_Detect;
if (!isset($_SESSION['token'])) {
    token();
}

?>
<!DOCTYPE html>
<html lang="<?= _lang ?>">

<head>
    <base href="<?= URLPATH ?>" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include _source . "module/seo.php" ?>
    <?php include _source . "templates/css.php" ?>
    <?php if ($com != '') { ?>
        <?= $row['seo_head'] ?>
    <?php } ?>
</head>


<body>
    <?php //include 'limit.php';
    ?>

    <?php include _source . "all.php"; ?>
    <?php include _source . "_header.php"; ?>
    <?php include _source . "module/slider.php"; ?>

    <div class="wrapper <?php if ($com != '') echo 'wrapper-detail'; ?>">
        <?php include _source . $source . ".php"; ?>

    </div>

    <?php //include _source . "module/doi-tac.php"; 
    ?>
    <?php include _source . "_footer.php"; ?>
    <?php include _source . "module/hotrotructuyen.php" ?>
    <?php //include _source . "module/phone.php"; 
    ?>
    <?php //include _source . "module/mxh_fix.php"; 
    ?>
    <?php include _source . "templates/js.php" ?>
    <?php include 'sitemap/seo_footer.inc'; ?>
    <?php if ($com != '') { ?>
        <?= $row['seo_body'] ?>
    <?php } ?>
</body>

</html>

<?php $d->disconnect() ?>