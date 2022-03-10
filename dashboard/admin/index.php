<?php require "./resources/config.php";
    session_start(); 
    if(isset($_SESSION['admin_id']) && $_SESSION['admin_id'] != NULL) { 
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
      
      
        $query = "SELECT dates,year(dates) as dateYear,SUM(payment_gross) as totalProfit FROM user_subscriptions  WHERE payment_status = 'Completed' ORDER BY dateYear";
        //execute query
        $result = $con->query($query);
        //loop through the returned data
        $data = array();

        foreach ($result as $row) {
         $date = date("m",strtotime($row['dates']));
    if ($date=="01") {
             $month = "January";
         }
    if ($date=="02") {
            $month = "February";
        }
    if ($date=="03") {
            $month = "March";
        }
    if ($date=="04") {
            $month = "April";
        }
    if ($date=="05") {
            $month = "May";
        }
    if ($date=="06") {
            $month = "June";
        }
    if ($date=="07") {
             $month = "July";
         }
    if ($date=="08") {
            $month = "Agaust";
        }
     if ($date=="09") {
            $month = "September";
        }
     if ($date=="10") {
            $month = "October";
        }
     if ($date=="11") {
            $month = "November";
        }
    if ($date=="12") {
            $month = "December";
        } 

    $productname[] =$month;
    $sale[]= $row['totalProfit'];
        }
    
          
        ?>
    
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
        <script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');

      var datesYear = <?php echo json_encode($productname);?>;
      var sales1 =  <?php echo json_encode($sale);?>;

      $(document).ready(function() {
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($productname);?>,
                        datasets: [{
                            label:" Total Profit",
                            backgroundColor: [
                                "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data: <?php echo json_encode($sale);?>,
                        }]
                    },
                    options: {
                        legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
                }
                
                });
                console.log(myChart);
                var selectOption = $('#operator');
    selectOption.on('change', function() {  
        var option = $("#operator").val();
        myChart.data.labels = option;
        if (option == 'All') {
           myChart.datesYear.labels = sales1,
           myChart.datesYear.datasets[0].datasets = datesYear;
        } else {
          myChart.datesYear.datasets[0].datasets = datesYear;
        }
        myChart.update();
    });
            });

  

 
    </script>

        </html>
<?php } else { ?>
    <span class="text-danger display-4">BAD GATEWAY!</span>
<?php } ?>
