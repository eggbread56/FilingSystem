<?php
    session_start();
    session_destroy();
    require_once 'php/connection-db.php';
    require_once 'php/register-controller.php';
?>
<html>

<head>
    <title>Filing System</title>
    <link rel="stylesheet" type="text/css" href="custom-css/custom-css.css">
    <link rel="stylesheet" type="text/css" href="uikit-css/uikit.min.css">
    <link rel="stylesheet" type="text/css" href="custom-css/notyf.min.css">
    <link rel="stylesheet" type="text/css" href="custom-css/ionicons.min.css">
    <link rel="icon" type="image/svg+xml" href="images/document.svg"><!--Icons made by "https://www.flaticon.com/authors/smalllikeart" -->
</head>

<body>

    <div class="content-background">
        <div class="uk-section-large">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
                    <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                    <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
                        <div class="uk-card uk-card-default" uk-scrollspy="cls: uk-animation-fade; delay: 300; repeat: true">
                            <div class="uk-card-header">
                                Register Page
                            </div>
                            <div class="uk-card-body">
                                <form method="POST">
                                    <fieldset class="uk-fieldset">

                                        <div class="uk-margin">
                                            <div class="uk-position-relative">
                                                <span class="uk-form-icon ion-edit"></span>
                                                <input name="name" class="uk-input" type="text" placeholder="Name*" required>
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <div class="uk-position-relative">
                                                <span class="uk-form-icon ion-android-person"></span>
                                                <input name="username" class="uk-input" type="text" placeholder="Username*" required>
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <div class="uk-position-relative">
                                                <span class="uk-form-icon ion-locked"></span>
                                                <input name="password" id="password" class="uk-input" type="password" placeholder="Password*" required>
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <div class="uk-position-relative">
                                                <span class="uk-form-icon ion-locked"></span>
                                                <input name="password_confirmation" id="second_password" class="uk-input" type="password" placeholder="Repeat Password*" required>
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <button type="submit" class="uk-button uk-button-primary" name="register_submit" id="submit_btn">
                                                <span class="ion-forward"></span>&nbsp; Register
                                            </button>
                                        </div>

                                        <hr />

                                        <center>
                                            <p>
                                                Already have an account?
                                            </p>
                                            <a href="login.php" class="uk-button uk-button-default">
                                                <span class="ion-android-person"></span>&nbsp; Login
                                            </a>
                                        </center>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- scripts -->
    <?php include_once 'php/console-log.php'; ?>
    <script src="custom-js/jquery.js"></script>
    <script src="custom-js/custom-js.js"></script>
    <script src="uikit-js/uikit.min.js"></script>
    <script src="uikit-js/uikit-icons.min.js"></script>
    <script src="custom-js/notyf.min.js"></script>
    <script>
        $(document).ready(function() {

            var searchParams = new URLSearchParams(window.location.search);
            if (searchParams.has('success')) {
                var param = searchParams.get('success');
                if (param == 1) {
                    var notyf = new Notyf();

                    setTimeout(function() {
                        notyf.confirm('Registration Successful!');
                    }, 500);
                }
            }

            var second_password = "";
            var password = "";
            $('#second_password').on('keyup', function() {
                second_password = $('#second_password').val();
                password = $('#password').val();
                if (second_password == "") {
                    $('#second_password').removeClass('uk-form-success');
                    $('#second_password').removeClass('uk-form-danger');
                    $('#submit_btn').attr('disabled', false);
                } else if (password == second_password) {
                    $('#second_password').addClass('uk-form-success');
                    $('#second_password').removeClass('uk-form-danger');
                    $('#submit_btn').attr('disabled', false);
                } else {
                    $('#second_password').addClass('uk-form-danger');
                    $('#second_password').removeClass('uk-form-success');
                    $('#submit_btn').attr('disabled', true);
                }
            });
        });
    </script>
</body>

</html>