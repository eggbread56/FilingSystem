<?php require_once '../php/auth-page-controller.php'; ?>
<input type="hidden" id="auth" name="auth" value="<?php echo $auth; ?>">
<h2 class="uk-h3 uk-margin-remove-bottom">Dashboard</h2>
<div class="uk-width-1-1">
    <ul class="uk-breadcrumb">
        <li class="uk-disabled"><a href="#">Home</a></li>
    </ul>
</div>
<div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-4@xl">
    <div>
        <div class="uk-card uk-card-default uk-card-body" style="background-color: #ab467b; color: white;">
            <h2 style="color: white;margin-bottom:0px"><?php include '../php/count-today-controller.php'; ?></h2>
            <span class="uk-label uk-label-success" style="background-color: #631f43;">
                Today's Files
            </span>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-default uk-card-body" style="background-color: #e38c3b; color: white;">
            <h2 style="color: white;margin-bottom:0px"><?php include '../php/count-week-controller.php'; ?></h2>
            <span class="uk-label uk-label-success" style="background-color: #783e08;">
                This Week's Files
            </span>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-default uk-card-body" style="background-color: #3c3465; color: white;">
            <h2 style="color: white;margin-bottom:0px"><?php include '../php/count-month-controller.php'; ?></h2>
            <span class="uk-label uk-label-success" style="background-color: #262338;">
                This Month's Files
            </span>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-default uk-card-body" style="background-color: #2e879b; color: white;">
            <h2 style="color: white;margin-bottom:0px"><?php include '../php/count-sem-controller.php'; ?></h2>
            <span class="uk-label uk-label-success" style="background-color: #16525f;">
                Total Files
            </span>
        </div>
    </div>
</div>
<div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@l">
    <div>
        <div class="uk-card uk-card-default" style="background-color: #3e454c; color: white;">
            <div class="uk-card-header">
                File Tracker
                <div class="uk-flex-right" style="margin-right:0px">
                    <form style='margin-bottom:0px;' class="uk-grid-small" uk-grid>
                        <div class="uk-width-1-3">
                            <label>Semester:</label>
                            <select class="uk-select" id="sem" name="sem" width="20px">
                                <option value="1">1st Semester</option>
                                <option value="2">2nd Semester</option>
                                <option value="3">Summer</option>
                            </select>
                        </div>
                        <div class="uk-width-1-3">
                            <label>Year:</label>
                            <select class="uk-select" id="year" name="year" width="20px">
                                <?php include '../php/option-year-controller.php'; ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="uk-card-body" id="chart">
                <canvas id="chart1"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    var auth = $('#auth').val();
    if (auth == "restricted") {
        window.location.replace("index.php#restricted/page");
    }
</script>

<script>
    $(document).ready(function() {
        var d = new Date();
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var currMonth = monthNames[d.getMonth()];
        var firstSem = ['August','September','October','November','December'];
        var secondSem = ['January','February','March','April','May'];
        var summer = ['June','July'];
        if(jQuery.inArray(currMonth, firstSem) !== -1) {
            $('#sem').val("1");
        }else if(jQuery.inArray(currMonth, secondSem) !== -1) {
            $('#sem').val("2");
        }else if(jQuery.inArray(currMonth, summer) !== -1) {
            $('#sem').val("3");
        }
        var barGraph;
        showGraph(barGraph);
        $('#year, #sem').change(function() {
            $('#chart1').remove();
            $('#chart').fadeIn('slow').html('<canvas id="chart1"></canvas>');
            showGraph(barGraph);
        });
    });
    
    function showGraph(barGraph) {
        var year = $('#year').val();
        var sem = $('#sem').val();
        
        var label_arr = [];
        var data_arr = [];
        
        if(barGraph) {
            barGraph.destroy();
        }
        console.log(barGraph);
        var graphTarget = $("#chart1");
        Chart.defaults.global.defaultFontColor = 'white';
        barGraph = new Chart(graphTarget, {
            type: 'bar',
            data: {},
            options: {
                legend: {
                    display: false
                 },
//                events: [],
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        
        $.ajax({
            url: "php/get-file-controller.php",
            dataType: "json",
            type: "post",
            data: {year:year,sem:sem},
            success: function(result) {
                var chartdata = {
                    labels: result[0],
                    datasets: [
                        {
                            label: 'Files',
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(36, 31, 66, 0.2)',
                                'rgba(110, 9, 17,0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(36, 31, 66, 0.2)',
                                'rgba(110, 9, 17,0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(36, 31, 66, 0.2)',
                                'rgba(110, 9, 17,0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(36, 31, 66, 1)',
                                'rgba(110, 9, 17,1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(36, 31, 66, 1)',
                                'rgba(110, 9, 17,1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(36, 31, 66, 1)',
                                'rgba(110, 9, 17,1)'
                            ],
                            borderWidth: 1,
                            data: result[1]
                        }
                    ]
                };
                barGraph.data = chartdata;
                barGraph.update();
            }
        });
    }
</script>
