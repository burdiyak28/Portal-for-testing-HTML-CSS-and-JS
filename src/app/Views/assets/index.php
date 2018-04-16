<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Create snip</title>

    <link rel="stylesheet" href="<?=SITE_FULL?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?=SITE_FULL?>/css/style.css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?=SITE_FULL?>/js/jquery-3.3.1.min.js"></script>
</head>
<body>
<?php
require_once ROOT_VIEW_DIRECTORY . '/' . $viewFile . '.php';
?>
<div class="container-fluid" style="margin-top: 50px">
    <div class="row footer">
        <div class="footer-top">
            <div class="container">
                <div class="col-md-3 col-xs-12 text-center">
                    <a href="#"><i class="fa fa-facebook fa-2x"></i>Facebook</a>
                </div>
                <div class="col-md-3 col-xs-12 text-center">
                    <a href="#"><i class="fa fa-twitter fa-2x"></i>Twitter</a>
                </div>
                <div class="col-md-3 col-xs-12 text-center">
                    <a href="#"><i class="fa fa-github fa-2x"></i>Github</a>
                </div>
                <div class="col-md-3 col-xs-12 text-center">
                    <a href="#"><i class="fa fa-google-plus fa-2x"></i>Google</a>
                </div>
            </div>
        </div>

        <div class="copyright">
            <div class="container">

                <div class="row text-center">
                    <p>Copyright © 2017 All rights reserved</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=SITE_FULL?>/js/bootstrap.min.js"></script>
<script src="<?=SITE_FULL?>/js/particles.min.js"></script>
<script src="<?=SITE_FULL?>/js/salvatore.min.js"></script>

<script src="<?=SITE_FULL?>/js/main.js"></script>
</body>
</html>