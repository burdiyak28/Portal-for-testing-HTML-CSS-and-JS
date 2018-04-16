<div class="container-fluid" id="home">

    <div class="row main">
        <div id="particles-js"></div>
        <div class="col-md-6 col-xs-12">
            <h1 class="description">
                Description
            </h1>
            <p>
                Welcome to the main page. Here you can create code for
                web page views and share it with other programmers. To begin with, you need to click on the button
                called Create, which is at the bottom of this text. If you want to share you code, you have to click on
                Login to create your own account. In the section FAQ you can see the 3 most frequently asked questions
                and answers to them.
            </p>

            <div class="create-signin-btn">
                <a id="create-btn" href="<?= SITE_FULL ?>/create" class="btn btn-success btn-lg"
                   role="button">Create</a>
                <a id="signin-btn" href="<?= SITE_FULL ?>/login" class="btn btn-primary" role="button">Login</a>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="panel-group" id="accordion">
                <h2>
                    FAQ
                </h2>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a class="panel-title" data-toggle="collapse" data-parent="#accordion"
                           href="#collapseOne">Question 1. How can I create a snippet?</a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            First you have to click the Create button, then the page for the code will open. There is
                            the ability to select a writing language. Below is an editor for writing code.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a class="panel-title" data-toggle="collapse" data-parent="#accordion"
                           href="#collapseTwo">Question 2. How to register on the site?</a>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="panel-body">
                            You have to click the Login button, then a new window opens, in which you will need to
                            select the Create Account option.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a class="panel-title" data-toggle="collapse" data-parent="#accordion"
                           href="#collapseThree">Question 3. How to save the written code?</a>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="panel-body">
                            The first thing to keep your code, you must be logged in. If you have already logged in, you
                            must click on the Saves button.
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sx-12">
            <div id="next-bottom">
                <a href="#popular" id="next" class="glyphicon glyphicon-chevron-down"></a>
            </div>
        </div>
    </div>

    <div class="row popular">
        <div class="col-md-12 col-xs-12">
            <h2>Popular</h2>
            <div id="popular">
                <p>
                    <bold>Sort by:</bold>
                </p>
            </div>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true">
                    Choose
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="<?= SITE_FULL ?>/home/index/popular">Popular</a></li>
                    <li><a href="<?= SITE_FULL ?>/home/index/new">New</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="row masonry" data-columns>
        <?php foreach ($snipets as $snip): ?>
            <div class="thumbnail">
                <div class="thumb-data">
                    <p><?= (isset($snip['create']) ? substr($snip['create'], 0, 11) . ' Created' : $snip['views'] . ' Views') ?></p>
                </div>
                <div class="caption">
                    <a href="<?= SITE_FULL ?>/create/snip/<?= $snip['id'] ?>" class="btn btn-primary" role="button">More...<i
                                class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>