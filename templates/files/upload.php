<?php 
require_once '../../php/auth-page-controller.php'; ?>
<input type="hidden" id="auth" name="auth" value="<?php echo $auth; ?>">
<div class="uk-child-width-expand@s uk-margin-small-top uk-flex-top" uk-grid>
    <div>

        <div class="uk-flex uk-flex-wrap ">
            <div class="uk-width-1-1">
                <h2 class="uk-h3">Upload Files</h2>
            </div>
            <div class="uk-width-1-1">
                <ul class="uk-breadcrumb">
                    <li class="uk-disabled"><a href="#">Home</a></li>
                    <li class="uk-disabled"><a href="#files/manage">Files</a></li>
                    <li class="uk-disabled"><a href="#">Upload</a></li>
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

        <form class="uk-form-stacked uk-panel" method="POST" id="upload_form" enctype='multipart/form-data'>
            <div class="uk-margin">
                <input type="hidden" id="filename" name="filename">
                <label class="uk-form-label" for="form-stacked-text">File Category</label>
                <select class="uk-select" id="file_type" name="file_type">
                    <?php include '../../php/option-file-controller.php'; ?>
                </select>
            </div>
            <label class="uk-form-label" for="form-stacked-text">Date</label>
            <div class="uk-margin uk-child-width-expand@s" uk-grid>
                <div class="uk-width-1-3">
                    <label class="uk-form-label" for="form-stacked-text">Month</label>
                    <select class="uk-select" id="month" name="month">
                        <?php include '../../php/option-month-controller.php'; ?>
                    </select>
                </div>
                <div class="uk-width-1-3">
                    <label class="uk-form-label" for="form-stacked-text">Day</label>
                    <select class="uk-select" id="day" name="day">
                        <?php include '../../php/option-day-controller.php'; ?>
                    </select>
                </div>
                <div class="uk-width-1-3">
                    <label class="uk-form-label" for="form-stacked-text">Year</label>
                    <select class="uk-select" id="year" name="year">
                        <?php include '../../php/option-year-controller.php'; ?>
                    </select>
                </div>
            </div>
            <div class="uk-margin">
                <div class="test-upload uk-placeholder uk-text-center">
                    <span uk-icon="icon: cloud-upload"></span>
                    <span class="uk-text-middle">Upload FILES by dropping them here or</span>
                    <div uk-form-custom>
                        <input type="file" multiple name="file" id="file" accept="application/pdf, .doc, .docx">
                        <span class="uk-link">selecting one</span>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div>
    </div>
</div>
<progress id="progressbar" class="uk-progress" value="0" max="100" hidden></progress>
<script>
    var auth = $('#auth').val();
    if(auth == "restricted") {
        window.location.replace("index.php#restricted/page");
    }
</script>
<script>
    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var currentYear = (new Date).getFullYear();
    $('#year').val(currentYear);
    var currentMonth = monthNames[(new Date).getMonth()];
    $('#month').val(currentMonth);
    var currentDay = (new Date).getDate();
    $('#day').val(currentDay);
    var type_id;
    
    function daysInMonth(month, year) {
        var day = new Date(year, month, 0).getDate();
        return day;
    }

    function getMonthFromString(mon) {

        var d = Date.parse(mon + "1, 2012");
        if (!isNaN(d)) {
            return new Date(d).getMonth() + 1;
        }
        return -1;
    }

    $('#year, #month').change(function() {

        if ($('#year').val().length > 0 && $('#month').val().length > 0) {

            $('#day').prop('disabled', false);
            $('#day').find('option').remove();

            var month_value = getMonthFromString($('#month').val());
            var daysInSelectedMonth = daysInMonth(month_value, $('#year').val())

            for (var i = daysInSelectedMonth; i >= 1; i--) {
                $('#day').append($("<option></option>").attr("value", i).text(i));
            }

        } else {
            $('#day').prop('disabled', true);
        }

    });

    var result = "";
    (function($) {

        var bar = $("#progressbar")[0];
        var result_file = "";

        UIkit.upload('.test-upload', {

            url: 'php/upload-file-controller.php',
            multiple: true,

            beforeSend: function() {
                
            },
            beforeAll: function() {

            },
            load: function() {

            },
            error: function() {
                
            },
            
            fail: function() {
                
            },
            
            complete: function() {
                var file_name = arguments[0].responseText;
                result_file += file_name + ",";
                type_id = $("#file_type").find(":selected").val();
                var month = $("#month").find(":selected").val();
                var day = $("#day").find(":selected").val();
                var year = $("#year").find(":selected").val();
                
                $.ajax({
                    url: "php/save-file-controller.php",
                    method: "POST",
                    data: {type_id:type_id,month:month,day:day,year:year,file_name:file_name},
                    success: function(results) {
                        setTimeout(function() {
                    
                            if(results == "existed") {
                                Swal.fire(
                                    'FAILED!',
                                    'File Already Existed.',
                                    'error'
                                )
                            }else if(results == "upload fail") {
                                Swal.fire(
                                    'FAILED!',
                                    'File failed uploading.',
                                    'error'
                                )
                            }else if (results == "DB fail") {
                                Swal.fire(
                                    'FAILED!',
                                    'Contact Admin.',
                                    'error'
                                )
                            }else if (results == "success") {
                                Swal.fire(
                                    'SUCCESS!',
                                    'File Uploaded.',
                                    'success'
                                )
                            }
                        }, 2200);

                    }
                });
            },

            loadStart: function(e) {
                
                Swal.fire({
                    title: 'Waiting file to be uploaded',
                    timer: 2000,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                    didClose: () => {
                        
                    }
                });

            },

            progress: function(e) {

                bar.max = e.total;
                bar.value = e.loaded;

            },

            loadEnd: function(e) {
                
            },

            completeAll: function() {
                
            }
        });

    })(jQuery);
</script>