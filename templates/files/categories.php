<?php require_once '../../php/auth-page-controller.php'; ?>
<input type="hidden" id="auth" name="auth" value="<?php echo $auth; ?>">
<div class="uk-child-width-expand@s uk-margin-small-top uk-flex-top" uk-grid>
    <div>

        <div class="uk-flex uk-flex-wrap ">
            <div class="uk-width-1-1">
                <h2 class="uk-h3">Add File Categories</h2>
            </div>
            <div class="uk-width-1-1">
                <ul class="uk-breadcrumb">
                    <li class="uk-disabled"><a href="#">Home</a></li>
                    <li class="uk-disabled"><a href="#files/manage">Files</a></li>
                    <li class="uk-disabled"><a href="#">Categories</a></li>
                </ul>
            </div>
        </div>
    </div>
    <br />
    <br />
    <div>

    </div>
</div>
<hr class="uk-divider-icon">
<div class="uk-child-width-expand@s" uk-grid>
    <div>

        <form class="uk-form-stacked uk-panel" method="POST">
            <h5>Add Category</h5>

            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">File Category Name</label>
                <div class="uk-form-controls">
                    <input type="hidden" id="id" value="0" name="id">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Some text..." name="category" required>
                </div>
            </div>
            <div class="uk-margin">
                <textarea class="uk-textarea" rows="5" placeholder="Description" name="description" id="description"></textarea>
            </div>
            <div class="uk-margin">
                <p uk-margin>
                    <input type="submit" class="uk-button uk-button-primary" value="Submit" name="add_category_submit">
                </p>
            </div>
        </form>
    </div>

    <div>

        <div class="uk-card uk-card-default uk-card-body uk-width-1-1">
            <h5 class="uk-card-title">Categories</h5>

            <div class="uk-panel uk-panel-scrollable" style="height: 300px">
                <?php include_once '../../php/fetch-category-controller.php'; ?>
            </div>
        </div>
    </div>
</div>
<script>
    var auth = $('#auth').val();
    if(auth == "restricted") {
        window.location.replace("index.php#restricted/page");
    }
</script>
<script>
    $("button").on('click', function() {
        var id = $(this).attr("data-id");
        var type = $(this).attr("data-type");
        var tr = $(this).closest('tr');

        if (type == "edit") {
            $.ajax({
                url: "php/select-category-controller.php?id=" + id,
                dataType: 'json',
                success: function(result) {
                    $('#form-stacked-text').val(result.name);
                    $('textarea#description').val(result.description);
                    $('#id').val(result.id);
                }
            });
        } else if (type == "delete") {
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
                        url: "php/delete-category-controller.php?id=" + id,
                        success: function(result) {
                            if(result == "success") {
                                tr.fadeOut(1000, function() {
                                $(this).remove();
                                });
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }else if($result == "fail") {
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
        } 
    });
</script>