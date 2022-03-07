<?php
require "../../resources/config.php";
require "../library/PHPMailer/src/Exception.php";
require "../library/PHPMailer/src/PHPMailer.php";
require "../library/PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['action']) && $_POST['action'] == 'search_sched_form') {
    search_available_schedule($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'srch_sched_ftr_form') {
    session_start();
    if(isset($_SESSION['first_name']) && $_SESSION['first_name'] != "") {
        go_schedule($con);
    } else {
        echo '<p class="text-center text-danger">Sorry, you need to create an account first and sign in as passenger.</p>';
    } 
}

if(isset($_POST['action']) && $_POST['action'] == 'smmry_dptr_slctd_sched_form') {
    session_start();
    reservation($con);
}

//* search available schedule
function search_available_schedule($c) {
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
    $srch_ss = $_POST['srch_ship_sched'];
    $sslf = $_POST['srch_sched_loc_from'];
    $sslt = $_POST['srch_sched_loc_to'];
    $ssld = date('Y-m-d', strtotime($_POST['srch_sched_loc_depart']));

    $sql_slct = "SELECT 
                tbl_ship_sd.ship_name,
                tbl_ship_sd.ship_logo,
                tbl_ship_sched.depart_date,
                tbl_ship_sched.depart_time,
                tbl_ship_sched.location_from,
                tbl_ship_sched.port_from,
                tbl_ship_sched.location_to,
                tbl_ship_sched.port_to,
                tbl_ship_acctyp.accomodation_name,
                tbl_ship_acctyp.price,
                tbl_ship_acctyp.id,
                tbl_tcket.tckt_promo,
                tbl_tcket.tckt_stats,
                tbl_tcket.tckt_dscnt,
                tbl_tcket.tckt_owner,
                tbl_tcket.tckt_price
                FROM tbl_ship_detail tbl_ship_sd
                JOIN tbl_ship_schedule tbl_ship_sched
                JOIN tbl_ship_has_accomodation_type tbl_ship_acctyp
                JOIN tbl_tckt tbl_tcket ON tbl_ship_sd.ship_name = tbl_tcket.tckt_owner
                WHERE tbl_ship_sd.ship_name=? AND tbl_ship_sched.depart_date=? AND tbl_ship_sched.location_from=? AND tbl_ship_sched.location_to=?";
    $stmt = $c->prepare($sql_slct);
    echo $c -> error;
    $stmt->bind_param("ssss", $srch_ss,$ssld,$sslf,$sslt);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    if(!empty($row)) {
        echo '
        <div>
        <div class="form-group accomm_type" name="sample_list" >
                <select onchange="selectOnChange(this)" name="srch_sched_accomm_type" id="slct_accomm_type" class="form-control select">
                <option value="0" data-price="0" data-name="None" >Ordinary</option> 
         ';
         $stmt2 = $c->prepare("SELECT * FROM tbl_ship_has_accomodation_type WHERE ship_reside=?"); 
         $stmt2->bind_param("s", $srch_ss);
         $stmt2->execute();
         $result2 = $stmt2->get_result();
        while($row1 = $result2->fetch_assoc()){
            echo '<option value="'.$row1["id"].'" data-price="'.$row1["price"].'" data-name="'.$row1["accomodation_name"].'">'.$row1["accomodation_name"].'</option>
                ';
        }
                echo ' 
                </select>
                </div>
       ';
    $output = '
                
                <div class="row pl-4 border rounded-fill m-auto">
                <br>
                <div class="col-sm-4">
                    <div class="form-group text-center">
                        <input type="text" name="srch_sched_time" value="'.$row["depart_time"].'" class="form-control border-top-0 rounded-0 text-center"  readonly>
                    </div>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="form-group pt-2 text-center">
                        <img src="data:image/jpeg;base64,'.base64_encode($row["ship_logo"]).'" alt="" width="70">
                        <input type="text" name="srch_sched_ship_nm" value="'.$row["ship_name"].'" class="bg-light border-0" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" id="cost"  name="srch_sched_price_display" value="'.$row["tckt_price"].'" class="form-control border-0 p-0 bg-light text-center" readonly>
                        <input type="hidden" name="srch_sched_price" value="'.$row["tckt_price"].'" class="form-control border-0 p-0 bg-light text-center" readonly>
                        <small>Ticket Price</small>
                        <br>
                        <br>
                        <input type="text" id="AcommondationPrice"  name="srch_sched_Accom_price" value="" class="form-control border-0 p-0 bg-light text-center" readonly>
                        <input type="hidden" id="AcommondationPrice" name="srch_sched_Accom_price" value="" class="form-control border-0 p-0 bg-light text-center" readonly>
                        <small>Accomodation Price</small>
                        <br>
                        <br>
                        <br>
                        <br>
                        <input type="text" id="total"  name="srch_sched_price_display" value="P'.$row["tckt_price"].'" class="form-control border-0 p-0 bg-light text-center" readonly>
                        <input type="hidden" id="total" name="srch_sched_total_price" value="'.$row["tckt_price"].'" class="form-control border-0 p-0 bg-light text-center" readonly>
                        <small>Total Price</small>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" id="srch_sched_filter_btn" value="GO" class="btn btn-success">
                    </div>
                </div>
            </div>';
    echo $output;
} else {
    echo '<p class="text-danger text-center lead">No Available Schedules!</p>';
}
    $stmt->close();
}

//* summary departure
function go_schedule($c) {
    $srch_st = $_POST['srch_sched_time'];
    $srch_sat = $_POST['srch_sched_accomm_type'];
    $srch_ssnm = $_POST['srch_sched_ship_nm'];
    $srch_accomprice = $_POST['srch_sched_Accom_price'];
    if ($srch_sat == 0) {
         
        $sql_srch_slct = "SELECT 
        tbl_sd.ship_logo,
        tbl_sd.ship_name,
        tbl_sched.location_from,
        tbl_sched.location_to,
        tbl_sched.depart_date,
        tbl_sched.depart_time,
        tbl_acctyp.accomodation_name,
        tbl_acctyp.seat_type,
        tbl_acctyp.aircon,
        tbl_sched.port_from,
        tbl_sched.port_to,
        tbl_acctyp.price,
        tbl_tcket.tckt_promo,
        tbl_tcket.tckt_stats,
        tbl_tcket.tckt_dscnt,
        tbl_tcket.tckt_owner,
        tbl_tcket.tckt_price
        FROM tbl_ship_detail tbl_sd
        JOIN tbl_ship_schedule tbl_sched
        JOIN tbl_ship_has_accomodation_type tbl_acctyp
        JOIN tbl_tckt tbl_tcket ON tbl_sd.ship_name = tbl_tcket.tckt_owner
        WHERE tbl_sched.depart_time=? AND tbl_sd.ship_name=?";
$stmt = $c->prepare($sql_srch_slct);
$stmt->bind_param('ss', $srch_st,$srch_ssnm);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array();
$output = '
<hr class="mb-0">
<div class="section bg-light pl-5 pr-5 pb-5 pt-3">
<div class="header_title text-center"><h3 class="">Summary</h3></div>
<hr style="border: 1px dotted #eee;">
<div id="smmry_dptr">
<div class="form-group">
    <img src="data:image/jpeg;base64,'.base64_encode($row["ship_logo"]).'" alt="LOGO" width="70"> <span>'.$row["ship_name"].'</span>
    <input type="hidden" name="summry_dptr_shp_name" value="'.$row["ship_name"].'">
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group text-center">
            <p>
                <span>LOCATION</span><br>
                <span>'.$row["location_from"].'</span>
                <span><i class="fa fa-long-arrow-right ml-2 mr-2"></i></span>
                <span>'.$row["location_to"].'</span>
            </p>
            <input type="hidden" name="summry_dptr_loc_from" value="'.$row["location_from"].'">
            <input type="hidden" name="summry_dptr_loc_to" value="'.$row["location_to"].'">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group text-center">
            <p>DEPARTURE DATE<br><span>'.$row["depart_date"].'</span> <span>'.$row["depart_time"].'</span></p>
            <input type="hidden" name="summry_dptr_date" value="'.$row["depart_date"].'">
            <input type="hidden" name="summry_dptr_time" value="'.$row["depart_time"].'">
        </div>
    </div>
</div>
<hr style="border: 1px dotted #eee;">
<div class="row text-center">
    <div class="col-4">
        <div class="form-group">
            <p>ACCOMODATION<br><span>No Aircon</span></p>
            <input type="hidden" name="summry_dptr_accom_name" value="No Aircon">
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <p>SEAT TYPE<br><span>'.$row["seat_type"].'</span></p>
            <input type="hidden" name="summry_dptr_sttyp" value="'.$row["seat_type"].'">
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <p>AIRCON<br><span>No</span></p>
            <input type="hidden" name="summry_dptr_arcn" value="NO">
        </div>
    </div>
</div>
<hr style="border: 1px dotted #eee;">
<div class="form-group">
    <p>
        PORT<br><span>'.$row["port_from"].'</span>
        <span><i class="fa fa-long-arrow-right ml-2 mr-2"></i></span>
        <span>'.$row["port_to"].'</span>
    </p>
    <input type="hidden" name="summry_dptr_port_from" value="'.$row["port_from"].'">
    <input type="hidden" name="summry_dptr_port_to" value="'.$row["port_to"].'">
</div>
<hr style="border: 1px dotted #eee;">
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <p>
               TOTAL PRICE<br><span>₱ '.$row["tckt_price"].'</span>
            </p>
            <input type="hidden" name="summry_dptr_price" value="'.$row["tckt_price"].'">
        </div>
    </div>
    <div class="col-6 text-right">
        <div class="form-group">
            <input type="submit" name="summry_dptr_btn" id="summry_dptr_btn" class="btn btn-success rounded-0" value="RESERVE">
        </div>
    </div>
</div>
<hr style="border: 1px dotted #eee;" class="mt-0">
</div>
</div>';
echo $output;
$stmt->close();

    }
    else{
    //$srch_sp = $_POST['srch_sched_price'];
    $sql_srch_slct = "SELECT 
                    tbl_sd.ship_logo,
                    tbl_sd.ship_name,
                    tbl_sched.location_from,
                    tbl_sched.location_to,
                    tbl_sched.depart_date,
                    tbl_sched.depart_time,
                    tbl_acctyp.accomodation_name,
                    tbl_acctyp.seat_type,
                    tbl_acctyp.aircon,
                    tbl_sched.port_from,
                    tbl_sched.port_to,
                    tbl_acctyp.price,
                    tbl_tcket.tckt_promo,
                    tbl_tcket.tckt_stats,
                    tbl_tcket.tckt_dscnt,
                    tbl_tcket.tckt_owner,
                    tbl_tcket.tckt_price
                    FROM tbl_ship_detail tbl_sd
                    JOIN tbl_ship_schedule tbl_sched
                    JOIN tbl_ship_has_accomodation_type tbl_acctyp
                    JOIN tbl_tckt tbl_tcket ON tbl_sd.ship_name = tbl_tcket.tckt_owner
                    WHERE tbl_sched.depart_time=? AND tbl_acctyp.id=? AND tbl_sd.ship_name=?";
    $stmt = $c->prepare($sql_srch_slct);
    $stmt->bind_param('sss', $srch_st,$srch_sat,$srch_ssnm);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    if ($srch_sat!=0) {
        $total =$row["tckt_price"] + $row["price"] ;
    }
    $output = '
    <hr class="mb-0">
    <div class="section bg-light pl-5 pr-5 pb-5 pt-3">
        <div class="header_title text-center"><h3 class="">Summary</h3></div>
        <hr style="border: 1px dotted #eee;">
        <div id="smmry_dptr">
            <div class="form-group">
                <img src="data:image/jpeg;base64,'.base64_encode($row["ship_logo"]).'" alt="LOGO" width="70"> <span>'.$row["ship_name"].'</span>
                <input type="hidden" name="summry_dptr_shp_name" value="'.$row["ship_name"].'">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group text-center">
                        <p>
                            <span>LOCATION</span><br>
                            <span>'.$row["location_from"].'</span>
                            <span><i class="fa fa-long-arrow-right ml-2 mr-2"></i></span>
                            <span>'.$row["location_to"].'</span>
                        </p>
                        <input type="hidden" name="summry_dptr_loc_from" value="'.$row["location_from"].'">
                        <input type="hidden" name="summry_dptr_loc_to" value="'.$row["location_to"].'">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group text-center">
                        <p>DEPARTURE DATE<br><span>'.$row["depart_date"].'</span> <span>'.$row["depart_time"].'</span></p>
                        <input type="hidden" name="summry_dptr_date" value="'.$row["depart_date"].'">
                        <input type="hidden" name="summry_dptr_time" value="'.$row["depart_time"].'">
                    </div>
                </div>
            </div>
            <hr style="border: 1px dotted #eee;">
            <div class="row text-center">
                <div class="col-4">
                    <div class="form-group">
                        <p>ACCOMODATION<br><span>'.$row["accomodation_name"].'</span></p>
                        <input type="hidden" name="summry_dptr_accom_name" value="'.$row["accomodation_name"].'">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <p>SEAT TYPE<br><span>'.$row["seat_type"].'</span></p>
                        <input type="hidden" name="summry_dptr_sttyp" value="'.$row["seat_type"].'">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <p>AIRCON<br><span>'.$row["aircon"].'</span></p>
                        <input type="hidden" name="summry_dptr_arcn" value="'.$row["aircon"].'">
                    </div>
                </div>
            </div>
            <hr style="border: 1px dotted #eee;">
            <div class="form-group">
                <p>
                    PORT<br><span>'.$row["port_from"].'</span>
                    <span><i class="fa fa-long-arrow-right ml-2 mr-2"></i></span>
                    <span>'.$row["port_to"].'</span>
                </p>
                <input type="hidden" name="summry_dptr_port_from" value="'.$row["port_from"].'">
                <input type="hidden" name="summry_dptr_port_to" value="'.$row["port_to"].'">
            </div>
            <hr style="border: 1px dotted #eee;">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <p>
                            TOTAL PRICE<br><span>₱ '.$total.'</span>
                        </p>
                        <input type="hidden" name="summry_dptr_price" value="'.$total.'">
                    </div>
                </div>
                <div class="col-6 text-right">
                    <div class="form-group">
                        <input type="submit" name="summry_dptr_btn" id="summry_dptr_btn" class="btn btn-success rounded-0" value="AVAIL">
                    </div>
                </div>
            </div>
            <hr style="border: 1px dotted #eee;" class="mt-0">
        </div>
    </div>';
    echo $output;
    $stmt->close();
}
}  

//* reservation
function reservation($c) {
    $sdsn = $_POST['summry_dptr_shp_name'];
    $sdlf = $_POST['summry_dptr_loc_from'];
    $sdlt = $_POST['summry_dptr_loc_to'];
    $sdd = date('Y-m-d',strtotime($_POST['summry_dptr_date']));
    $sdt = $_POST['summry_dptr_time'];
    $sdan = $_POST['summry_dptr_accom_name'];
    $pssgr_name = $_SESSION['first_name']." ".$_SESSION['lastname']; 
    $success = 0;
    $rsrvtn_num = rand(1000000,9999999);
    $rsrvtn_date = date('Y-m-d');
    $exp = date('Y-m-d',strtotime($rsrvtn_date. '+2 days'));
    
    $sql_rsrtn = "INSERT INTO tbl_passenger_reservation (reservation_number,ship_name,passenger_name,location_from,location_to,depart_date,depart_time,accomodation,reservation_date,expiration)
                 VALUES (?,?,?,?,?,?,?,?,?,?)";

    $stmt = $c->prepare($sql_rsrtn);
    $stmt->bind_param('ssssssssss',$rsrvtn_num,$sdsn,$pssgr_name,$sdlf,$sdlt,$sdd,$sdt,$sdan,$rsrvtn_date,$exp);
    
    if($stmt->execute()) {
        $stmt->close();
        $success = 1;
    }
    if($success == 1) {
        reservation_confirmation($c,$sdsn,$rsrvtn_num);
    }
}
//* send email reservation confirmation
function reservation_confirmation($c,$sdsn,$rsrvtn_num) {
    $sql_rsrvtn = "SELECT * FROM tbl_passenger_reservation";
    $stmt = $c->prepare($sql_rsrvtn);
    $stmt->execute();
    $stmt->store_result();
    $stmt->fetch();
    $num = $stmt->num_rows();
    if($num > 0) {
        $stmt->close();
        $sql_em = "SELECT 
                    tbl_sd.email,
                    tbl_pr.ship_name,
                    tbl_pr.expiration,
                    tbl_pr.reservation_number
                    FROM tbl_ship_detail tbl_sd
                    JOIN tbl_passenger_reservation tbl_pr ON tbl_sd.ship_name = tbl_pr.ship_name
                    WHERE tbl_sd.ship_name=?";
        $s = $c->prepare($sql_em);
        $s->bind_param('s', $sdsn);
        $s->execute();
        $result = $s->get_result();
        $row = $result->fetch_array();

        if(!empty($row)) {
            $pssngr_id = $_SESSION['id'];
            $avail = 'avail';
            $shipname = $row['ship_name'];
            echo "http://localhost:8080/barkomatic-main/payment.php?reservetionId=$rsrvtn_num&&userId=$pssngr_id&&typOfpymnt=$avail&&shipName=$shipname";
        } else {
            echo "row is empty! - 2";
        }
    } else {
        echo "row is empty! - 1";
    }

}



