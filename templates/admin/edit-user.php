<?php require_once '../../php/auth-page-controller.php'; ?>
<input type="hidden" id="auth" name="auth" value="<?php echo $auth; ?>">
<a href="#admin/manage" class="uk-button uk-button-link uk-icon tm-back"><span uk-icon="icon: chevron-left; "></span>Back</a>

<div class="uk-child-width-expand@s uk-margin-small-top uk-flex-top" uk-grid style="border-bottom: 1px solid #ebebeb;">
    <div>

        <div class="uk-flex uk-flex-wrap ">
            <div class="uk-width-1-1">
                <h2 class="uk-h3">EDIT User</h2>
            </div>
            <div class="uk-width-1-1">
                <ul class="uk-breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#admin/manage">Users</a></li>
                    <li class="uk-disabled"><a href="#">Edit</a></li>
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
            <h5>Edit User</h5>

            <div class="uk-margin">
                <div class="uk-position-relative">
                    <span class="uk-form-icon ion-edit"></span>
                    <input name="id" type="hidden" id="id">
                    <input name="name" class="uk-input" type="text" placeholder="Name*" required id="name">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-position-relative">
                    <span class="uk-form-icon ion-android-person"></span>
                    <input name="username" class="uk-input" type="text" placeholder="Username*" required id="username">
                </div>
            </div>
            
            <div class="uk-margin">
                <select class="uk-select" name="user_type" id="user_type">
                    <?php include_once '../../php/option-user-controller.php'; ?>
                </select>
            </div>

            <div class="uk-margin">
                <input type="submit" class="uk-button uk-button-primary" name="edit_user_submit" id="submit_edit_btn" value="Submit">
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
    var user_info = sessionStorage.getItem('user_info');
    var user = user_info.split(",");
    
    var uid = user[1].split(":");
    var uid2 = uid[1].replace(/['"]+/g,"");
    
    var id = user[3].split(":");
    var id2 = id[1].replace(/['"]+/g,"");
    id2 = id2.replace("}","");
    
    var username = user[2].split(":");
    var username2 = username[1].replace(/['"]+/g,"");
    username2 = username2.replace("}","");
    
    var name = user[0].split(":");
    var name2 = name.split(",");
    name2[1] = name2[1].replace(/['"]+/g,"");
    
    $("#name").val(name2[1]);
    $("#user_type").val(uid2);
    $("#username").val(username2);
    $("#id").val(id2);
</script>