<div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6 ">
    <div class="card">
        <div id="active_reservation_data" class="card-content">
            <img class="text-center" src="./resources/img/loading.gif" alt="Loading" style="text-align:center;width:48px;height:48px;">
        </div>
    </div>
    <div class="card">
        <div class="card-content" id="total_staff_data">
            <img class="text-center" src="./resources/img/loading.gif" alt="Loading" style="text-align:center;width:48px;height:48px;">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-9">
                            <br>
                            <h3 style="margin-left:5%" class="panel-title">Month Wise Profit Data</h3>
                        </div>
                        <!-- <div class="col-md-3">
                        <select name="year" class="form-control" id="operator">
                                <option value="">Select Year</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                         
                
                            </select>
                        </div> -->
                    </div>
                </div>
                <br>
                <div class="panel-body">
                <canvas  id="chartjs_bar"></canvas> 
                </div>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title"><span class="icon"><i class="mdi mdi-account-check"></i></span> Reservation</p>
            </header>
            <div class="card-content p-0" id="summ_reservation_data">
                <img class="text-center" src="./resources/img/loading.gif" alt="Loading" style="text-align:center;width:48px;height:48px;">
            </div>
            <header class="card-header p-0">
                <p class="p-2 m-0 ml-auto"><a href="http://localhost/barkomatic-main/dashboard/ship/index.php?page=reservation" class="text-right">View Full List</a></p>
            </header>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title"><span class="icon"><i class="mdi mdi-account-check"></i></span> Staff</p>
            </header>
            <div class="card-content p-0" id="summ_staff_data">
                <img class="text-center" src="./resources/img/loading.gif" alt="Loading" style="text-align:center;width:48px;height:48px;">
            </div>
            <header class="card-header p-0">
                <p class="p-2 m-0 ml-auto"><a href="http://localhost/barkomatic-main/dashboard/ship/index.php?page=assign-staff" class="text-right">View Full List</a></p>
            </header>
        </div>
    </div>
</div>
