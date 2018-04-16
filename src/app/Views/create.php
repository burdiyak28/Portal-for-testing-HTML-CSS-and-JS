<style>
    .responsive-box {
        position: relative;
        width: 100%; /* Произвольная ширина, которая требуется для блока */
    }

    .responsive-box::before {
        content: "";
        display: block;
        padding-top: 60%; /* С помощью этого padding мы задаем высоту равную ширине блока */
    }

    .responsive-box-child {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }
    #panel-html, #panel-css, #panel-js, #panel-result {
        border: 1px #a9a9a9 solid;
    }
</style>
<script>
    window.localStorage.clear();
    window.localStorage.setItem('html', '<?=(isset($html) ? $html : '')?>');
    window.localStorage.setItem('css', '<?=(isset($css) ? $css : '')?>');
    window.localStorage.setItem('js', '<?=(isset($js) ? $js : '')?>');
    $(window).bind('storage', function (e) {
        if (e.originalEvent.key === 'js') {

            setTimeout(function () {
                var iframe = document.getElementById('result');
                iframe.src = iframe.src;
            }, 100);

        }
    });
</script>

<input type="hidden" name="snipId" id="snipId" value="<?=$projectId?>">

<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                        </button> <a class="navbar-brand" href="<?=SITE_FULL?>">Home</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <form class="navbar-form navbar-right" method="post" action="<?=SITE_FULL?>/home/logout">
                            <button type="submit" class="btn btn-link">
                                Logout
                            </button>
                        </form>
                        <form class="navbar-form navbar-right" method="post" action="<?=SITE_FULL?>/create/fork/<?=(isset($projectId) ? $projectId : '')?>">
                            <button type="submit" class="btn btn-link" <?=((isset($disableFork) && $disableFork) ? 'disabled' : '')?>>
                                Fork
                            </button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="<?=((isset($disableSave) && $disableSave) ? 'disabled' : '')?>">
                                <a href="#" id="saveSnipet">Save</a>
                            </li>
                        </ul>
                    </div>

                </nav>
            </div>
        </div>

    <div class="row">
        <div class="col-md-6">
            <div class="tabbablAe" id="tabs">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#panel-html" data-toggle="tab">HTML</a>
                    </li>
                    <li>
                        <a href="#panel-css" data-toggle="tab">CSS</a>
                    </li>
                    <li>
                        <a href="#panel-js" data-toggle="tab">JavaScript</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="panel-html">
                        <div class="responsive-box">
                            <div class="responsive-box-child">
                                <iframe src="<?=SITE_FULL?>/include/html.html" frameborder="no" width="100%" height="100%" scrolling="no"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="panel-css">
                        <div class="responsive-box">
                            <div class="responsive-box-child">
                                <iframe src="<?=SITE_FULL?>/include/css.html" frameborder="no" width="100%" height="100%" scrolling="no"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="panel-js">
                        <div class="responsive-box">
                            <div class="responsive-box-child">
                                <iframe src="<?=SITE_FULL?>/include/js.html" frameborder="no" width="100%" height="100%" scrolling="no"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="responsive-box" id="panel-result">
                <div class="responsive-box-child">
                    <iframe id="result" src="<?=SITE_FULL?>/include/result.html" frameborder="no" width="100%" height="100%" scrolling="no"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>