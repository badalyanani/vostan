<?php
    ob_start();
    require_once('header.php');
    if(!isset($basedir)) {
        $basedir = "";
    }
?>
<!DOCTYPE html>
<html class="no-js">
    <script>
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = cname + "=" + cvalue + "; " + expires;
        }
        var hash = document.location.hash.substring(1) || "";
        setCookie("v_root", hash, 365);
    </script>
    <head>
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Yerevak Technology</title>
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="stylesheet" href="<?= $basedir ?>vendor/jquery/css/jquery-ui-1.10.3.custom.min.css" media="screen">
        <link rel="stylesheet" href="<?= $basedir ?>vostan_lib/vostan.css">
        <script src="<?= $basedir ?>vendor/jquery/js/jquery-1.10.1.min.js"></script>
        <script src="<?= $basedir ?>vendor/kjs/kinetic-v5.1.0.min.js"></script>
        <script src="<?= $basedir ?>vendor/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="<?= $basedir ?>vendor/jquery/js/jquery.ui.touch-punch.js"></script>
    </head>
    <body>
        <script src="<?= $basedir ?>vostan_lib/vostan.js"></script>
        <script src="<?= $basedir ?>vostan_lib/vostan_view.js"></script>
        <script src="<?= $basedir ?>vostan_lib/vostan_user.js"></script>
    </body>
</html>
