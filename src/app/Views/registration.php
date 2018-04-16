<?php
if (isset($errorMessage)) {
    echo '<div class="alert alert-danger">';
    foreach ($errorMessage as $message) {
        echo $message . '<br>';
    }
    echo '</div>';
}
?>

<div class="registration">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">

            <div class="inner-form">

                <h2>SIGN UP</h2>

                <form role="form" method="post" action="<?=SITE_FULL?>/registration/registration">
                    <div class="row">

                        <div class="col-md-12">
                            <label>Email</label>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Password</label>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Confirm Password</label>
                            <div class="form-group">
                                <input type="password" name="confirmPassword" id="confirm-password" class="form-control"
                                       placeholder="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">
                                <span>Create Account</span>
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

