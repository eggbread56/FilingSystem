<?php //session_start(); ?>
<div class="uk-flex uk-flex-wrap ">
    <div class="uk-width-1-1">
        <h2 class="uk-h3">Manage Files</h2>
    </div>
    <div class="uk-width-1-1">
        <ul class="uk-breadcrumb">
            <li class="uk-disabled"><a href="#">Home</a></li>
            <li class="uk-disabled"><a href="#">Files</a></li>
        </ul>
    </div>
</div>

<br />

<div class="uk-child-width-expand@s uk-margin-small-top uk-flex-middle" uk-grid>
    <div>
        <div class="uk-flex-left">
            <form style='margin-bottom:0px;'>
                <select class="uk-select" id="file_type" name="file_type">
                    <option value="0">All</option>
                    <?php include '../../php/option-file-controller.php'; ?>
                </select>
            </form>
        </div>
    </div>

    <div>
        <div class="uk-flex-right">
            <form class="uk-search uk-search-default uk-flex-right uk-flex-wrap-stretch uk-width-1-1">
                <span uk-search-icon></span>
                <input class="uk-search-input uk-flex-wrap-stretch" id="search" type="search" placeholder="Search...">
            </form>
        </div>
    </div>


</div>
<hr class="uk-divider-icon">

<ul class="uk-comment-list" id="file-table">
    <?php include '../../php/fetch-file-controller.php'; ?>
</ul>
<script>
    $("#search").keyup(function() {
        search_table($(this).val());
    });

    $('#file_type').change(function() {
        $(this).find(":selected").each(function() {

            if ($(this).val() != 0) {
                search_table($(this).text());
            } else if ($(this).val() == 0) {

                $('.file_row').each(function() {
                    $('.file_row').css('display', 'block');
                });
            }
        });
    });

    function search_table(value) {
        $('.file_row').each(function() {
            var found = 'false';
            var ftype = $('#file_type').find(":selected").text();
            if (ftype == "All") {
                $(this).each(function() {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                        found = 'true';
                    }
                });
            } else {

                $(this).each(function() {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0 && $(this).text().toLowerCase().indexOf(ftype.toLowerCase()) >= 0) {
                        found = 'true';
                    }
                });
            }
            if (found == 'true') {
                $(this).show(500);
            } else if (found == 'false') {
                $(this).hide(500);
            }
        });
    }
    
    $('#aaf').on("click",function(){
        $(this).closest('li').first().fadeOut(1000, function() {
            $(this).closest('li').first().remove();
        });
        $(this).closest('ul').first().fadeIn(1000, function() {
            var new_li = "<li><p class='uk-text-success' style='margin-bottom:0px'>DOWNLOADED</p></li>";
            $(this).append(new_li);
        });
        
    })
    
    $("button").on('click', function() {
        var id = $(this).attr("data-id");
        var type = $(this).attr("data-type");
        var file = $(this).attr("data-file");
        var tr = $(this).closest('tr');

        if (type == "delete-file") {
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
                        url: "php/delete-file-controller.php?id=" + id,
                        success: function(result) {
                            if (result == "success") {
                                $("button").parents('li:eq(1)').fadeOut(1000, function() {
                                    $(this).remove();
                                });
                                Swal.fire(
                                    'Deleted!',
                                    'File has been deleted.',
                                    'success'
                                )
                            } else if(result == "fail") {
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
        }else if (type == "view-file") {
            sessionStorage.setItem("view_file", file);
            window.location.hash = 'files/view';
        }else if (type == "request-file") {
            var uid = $(this).attr("data-uid");
            var fid = $(this).attr("data-fid");
            $.ajax({
                url: "php/add-request-controller.php",
                type: "POST",
                data: {uid:uid,id:id,fid:fid},
                success: function(result) {
                    if(result == "success") {
                        $("button").closest('li').first().fadeOut(1000, function() {
                            $(this).closest('li').first().remove();
                        });
                        $(".uk-text-danger").closest('li').first().fadeOut(1000, function() {
                            $(this).remove();
                        });
                        $("button").closest('ul').first().fadeIn(1000, function() {
                            var new_li = "<li><p class='uk-text-success' style='margin-bottom:0px'>PENDING REQUEST</p></li>";
                            $(this).closest('ul').first().append(new_li);
                        });
                        Swal.fire(
                            'Download Requested!',
                            'Waiting for Admin Approval.',
                            'success'
                        )
                    }else {
                        Swal.fire(
                            'Failed!',
                            'Consult Admin',
                            'error'
                        )
                    }
                }
            });
        }
    });
</script>