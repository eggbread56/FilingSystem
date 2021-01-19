<?php require_once '../../php/auth-page-controller.php'; ?>
<input type="hidden" id="auth" name="auth" value="<?php echo $auth; ?>">
    <div class="uk-flex uk-flex-wrap ">
        <div class="uk-width-1-1">
            <h2 class="uk-h3">Manage Users</h2>
        </div>
        <div class="uk-width-1-1">
            <ul class="uk-breadcrumb">
                <li class="uk-disabled"><a href="#">Home</a></li>
                <li class="uk-disabled"><a href="#">Users</a></li>
            </ul>
        </div>
    </div>
    <br />
    <br />

<div class="uk-child-width-expand@s uk-margin-small-top uk-flex-middle" uk-grid>
    <div class="uk-width-expand">
        <div class="uk-child-width-expand@s" uk-grid>
            <div class="uk-width-expand">
                <form class="uk-search uk-search-default uk-width-1-4">
                    <span uk-search-icon></span>
                    <input class="uk-search-input uk-flex-wrap-stretch" id="search" type="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </div>
    <div class="uk-width-auto">
        <a href="#admin/add-user" class="uk-button uk-button-primary uk-icon uk-align-right"><span uk-icon="icon: plus; "></span> Add User</a>
    </div>
</div>
<hr class="uk-divider-icon">

<?php include '../../php/fetch-user-controller.php'; ?>
<script>
    var auth = $('#auth').val();
    if(auth == "restricted") {
        window.location.replace("index.php#restricted/page");
    }
</script>
<script>
    $("#search").keyup(function() {
        search_table($(this).val());
    });

    function search_table(value) {
        $('#user-table tr').each(function() {
            var found = 'false';
            $(this).each(function() {
                if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                    found = 'true';
                }
            });
            if (found == 'true') {
                $(this).show(500);
            } else if (found == 'false') {
                $(this).hide(500);
            }
        });
    }

    $("button").on('click', function() {
        var id = $(this).attr("data-id");
        var type = $(this).attr("data-type");
        var tr = $(this).closest('tr');

        if (type == "delete-user") {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "php/delete-user-controller.php?id=" + id,
                        success: function(result) {
                            if (result == "success") {
                                tr.fadeOut(1000, function() {
                                    $(this).remove();
                                });
                                Swal.fire(
                                    'Deleted!',
                                    'User has been deleted.',
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    'Unsuccessful Deletion!',
                                    'Consult Admin',
                                    'error'
                                )
                            }
                        }
                    });
                }
            })
        } else if (type == "edit-user") {
            $.ajax({
                url: "php/select-user-controller.php?id=" + id,
                dataType: 'json',
                success: function(result) {
                    sessionStorage.setItem('user_info', JSON.stringify(result));
                    window.location.hash = 'admin/edit-user';
                }
            });
        }
    });
</script>