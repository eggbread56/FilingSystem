<?php require_once '../../php/auth-page-controller.php'; ?>
<input type="hidden" id="auth" name="auth" value="<?php echo $auth; ?>">
<a href="#admin/manage" class="uk-button uk-button-link uk-icon tm-back"><span uk-icon="icon: chevron-left; "></span>Back</a>

<div class="uk-child-width-expand@s uk-margin-small-top uk-flex-top" uk-grid style="border-bottom: 1px solid #ebebeb;">
    <div>

        <div class="uk-flex uk-flex-wrap ">
            <div class="uk-width-1-1">
                <h2 class="uk-h3">ADD User</h2>
            </div>
            <div class="uk-width-1-1">
                <ul class="uk-breadcrumb">
                    <li class="uk-disabled"><a href="#">Home</a></li>
                    <li class="uk-disabled"><a href="#admin/manage">Users</a></li>
                    <li class="uk-disabled"><a href="#">Add</a></li>
                </ul>
            </div>
        </div>
    </div>
    <br />
    <br />
    <div>

    </div>
</div>
<div class="uk-child-width-1-2@s" uk-grid>
    <div>

        <form class="uk-form-stacked uk-panel" method="POST">
            <h5>Add User</h5>

            <div class="uk-margin">
                <div class="uk-position-relative">
                    <span class="uk-form-icon ion-edit"></span>
                    <input name="admin_role" type="hidden" value="1">
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
                <select class="uk-select" name="user_type">
                    <?php include_once '../../php/option-user-controller.php'; ?>
                </select>
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
                    <span class="ion-forward"></span>&nbsp; Add User
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    var auth = $('#auth').val();
    if(auth == "restricted") {
        window.location.replace("index.php#restricted/page");
    }
</script>
<script>
    $(document).ready(function() {
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
