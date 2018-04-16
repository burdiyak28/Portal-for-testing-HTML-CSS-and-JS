<?php
if (isset($errorMessage)) {
    echo '<div class="alert alert-danger">';
    foreach ($errorMessage as $message) {
        echo $message . '<br>';
    }
    echo '</div>';
}
?>
<div class="login">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">

            <div class="inner-form">

                <h2>SIGN IN</h2>

                <form role="form" method="post" action="<?=SITE_FULL?>/login/login">
                    <div class="row">

                        <div class="col-md-12">
                            <label>Email</label>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div id="forgot-label">
                                <label>Password</label>
                                <label>
                                    <a id="forgot" href="<?=SITE_FULL?>/forgot">Forgot Password?</a>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">
                                <span>Sign in</span>
                            </button>
                        </div>


                        <div class="col-md-12">
                            <div class="create-account">
                                <a class="btn btn-primary btn-block" href="<?=SITE_FULL?>/registration" role="button">Create Account</a>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>