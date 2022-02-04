<?php require "./resources/config.php";
    session_start(); 
    if(isset($_SESSION['admin_id']) && $_SESSION['admin_id'] != NULL) { ?>
        <!DOCTYPE html>
        <html lang="en" class="">
        <head>
            <?php require "./resources/templates/_dashboard-head.php"; ?>
        </head>
        <body class="pt-0">
            <div id="app">
                <?php require "./resources/templates/_dashboard-top-nav.php"; ?>
                <?php require "./resources/templates/_dashboard-aside-nav-left.php"; ?>
                <?php if($_GET['page'] == 'passenger-signup' || $_GET['page'] == 'passenger-booking') { ?>
                    <section class="section main-section p-0">
                <?php } else if($_GET['page'] == 'assign-employee' || $_GET['page'] == 'assign-staff' ||  $_GET['page'] == 'tickets') { ?>
                    <section class="section main-section pt-0">
                <?php } else { ?>
                    <section class="section main-section">
                <?php } ?>
                    <?php 
                        if($_GET['page'] == 'dashboard') {
                            require "./resources/templates/_dashboard_landing.php";
                        }
                        if($_GET['page'] == 'assign-staff') {
                            require "./resources/templates/_dashboard_assign_task.php";
                        }
                        if($_GET['page'] == 'profile') {
                            require "./resources/templates/_dashboard_profile.php";
                        }
                        if($_GET['page'] == 'pass-account') {
                            require "./resources/templates/_dashboard_pass_account.php";
                        }
                        if($_GET['page'] == 'tickets') {
                            require "./resources/templates/_dashboard_ticket.php";
                        }
                    ?>
                </section>
            </div>
        </body>
        </html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback();

function load_monthwise_data(year, title)
{
    var temp_title = title + ' '+year+'';
    $.ajax({
        url:"modules/graphFetch.php",
        method:"POST",
        data:{year:year},
        dataType:"JSON",
        success:function(data)
        {
            drawMonthwiseChart(data, temp_title);
        }
    });
}

function drawMonthwiseChart(chart_data, chart_main_title)
{
    var jsonData = chart_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Month');
    data.addColumn('number', 'Profit');
    $.each(jsonData, function(i, jsonData){
        var month = jsonData.month;
        var profit = parseFloat($.trim(jsonData.profit));
        data.addRows([[month, profit]]);
    });
    var options = {
        title:chart_main_title,
        hAxis: {
            title: "Months"
        },
        vAxis: {
            title: 'Profit'
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));
    chart.draw(data, options);

    console.log(chart);
}

</script>

<script>
    
$(document).ready(function(){

    $('#year').change(function(){
        var year = $(this).val();
        if(year != '')
        {
            load_monthwise_data(year, 'Month Wise Profit Data For');
        }
    });

});

</script>




<?php } else { ?>
    <span class="text-danger display-4">BAD GATEWAY!</span>
<?php } ?>
