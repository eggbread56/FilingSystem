<?php require_once '../../php/auth-page-controller.php'; ?>
<input type="hidden" id="auth" name="auth" value="<?php echo $auth; ?>">
    <div class="uk-flex uk-flex-wrap ">
        <div class="uk-width-1-1">
            <h2 class="uk-h3">Manage Request</h2>
        </div>
        <div class="uk-width-1-1">
            <ul class="uk-breadcrumb">
                <li class="uk-disabled"><a href="#">Home</a></li>
                <li class="uk-disabled"><a href="#">Files</a></li>
                <li class="uk-disabled"><a href="#">Request</a></li>
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
</div>
<hr class="uk-divider-icon">

<?php include '../../php/fetch-request-controller.php'; ?>
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
        
        if (type == "decline-request") {
            Swal.fire({
                title: 'Decline Request?',
                text: "You are declining this download request!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Decline'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "php/edit-request-controller.php",
                        type: "post",
                        data: {id:id,value:3},
                        success: function(result) {
                            if (result == "success") {
                                tr.fadeOut(1000, function() {
                                    $(this).remove();
                                });
                                Swal.fire(
                                    'Declined!',
                                    'Download request has been declined.',
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Consult Admin',
                                    'error'
                                )
                            }
                        }
                    });
                }
            });
        } else if (type == "approve-request") {
            Swal.fire({
                title: 'Approve Request?',
                text: "You are approving this download request!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Approve'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "php/edit-request-controller.php",
                        type: "post",
                        data: {id:id,value:1},
                        success: function(result) {
                            if (result == "success") {
                                tr.fadeOut(1000, function() {
                                    $(this).remove();
                                });
                                Swal.fire(
                                    'Approved!',
                                    'Download Request has been granted.',
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Consult Admin',
                                    'error'
                                )
                            }
                        }
                    });
                }
            });
        }
    });
</script>