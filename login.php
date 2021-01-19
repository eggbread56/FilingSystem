<?php
    session_start();
    session_destroy();
    require_once 'php/connection-db.php';
    require_once 'php/login-controller.php';
?>
<html>

<head>
    <title>Filing System</title>
    <link rel="stylesheet" type="text/css" href="custom-css/custom-css.css">
    <link rel="stylesheet" type="text/css" href="uikit-css/uikit.min.css">
    <link rel="stylesheet" type="text/css" href="custom-css/notyf.min.css">
    <link rel="stylesheet" type="text/css" href="custom-css/ionicons.min.css">
    <link rel="icon" type="image/svg+xml" href="images/document.svg">
</head>

<body>
    <div class="content-background">
        <div class="uk-section-large">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
                    <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                    <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
                        <div class="uk-card uk-card-default" uk-scrollspy="cls: uk-animation-fade; delay: 300; repeat: true" id="card">
                            <div class="uk-card-header" style="border-bottom-width: 0px">
                            </div>
                            <div class="uk-card-body" style="padding-top: 0px">
                                <center>
                                    <img class="uk-border-circle" width="50%" height="50%" src="images/archive.png"><br /><br />
                                </center>
                                <form method="POST">
                                    <fieldset class="uk-fieldset">

                                        <div class="uk-margin">
                                            <div class="uk-position-relative">
                                                <span class="uk-form-icon ion-android-person"></span>
                                                <input name="username" class="uk-input" type="text" placeholder="Username" id="username">
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <div class="uk-position-relative">
                                                <span class="uk-form-icon ion-locked"></span>
                                                <input name="password" class="uk-input" type="password" placeholder="Password" id="password">
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <button type="submit" class="uk-button uk-button-primary" name="login_submit">
                                                <span class="ion-forward"></span>&nbsp; Login
                                            </button>
                                        </div>

                                        <hr />

                                        <center>
                                            <p>
                                                You don't have an account yet?
                                            </p>
                                            <a href="register.php" class="uk-button uk-button-default">
                                                <span class="ion-android-person-add"></span>&nbsp; Register
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
    <script src="custom-js/jquery.js"></script>
    <script src="uikit-js/uikit.min.js"></script>
    <script src="uikit-js/uikit-icons.min.js"></script>
    <script src="custom-js/custom-js.js"></script>
    <script src="custom-js/notyf.min.js"></script>
    <script>
        $(document).ready(function() {

            var searchParams = new URLSearchParams(window.location.search);
            if (searchParams.has('fail')) {
                var param = searchParams.get('fail');
                if (param == 1) {
                    var notyf = new Notyf();
                    
                    $('#username').addClass('uk-form-danger');
                    $('#password').addClass('uk-form-danger');
                    
                    setTimeout(function() {
                        notyf.alert('Wrong Credentials!');
                    }, 500);
                }
            }
            $('#username').on('keyup', function() {
                $('#username').removeClass('uk-form-danger');
            });
            
            $('#password').on('keyup', function() {
                $('#password').removeClass('uk-form-danger');
            });
        });
    </script>
</body>

</html>