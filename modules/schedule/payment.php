<?php
require "../../resources/config.php";

if (isset($_GET['reservation']) && isset($_GET['passengersId'])) {
   get_PssngerInfo($con);
   get_ContactInfo($con);
}

//fetch passenger info
function get_PssngerInfo($c){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $passengerId = $_GET['passengersId'];
    $sql_srch_slct = "SELECT 
                    tbl_pssnger_accnt.username,
                    tbl_pssnger_dtls.first_name,
                    tbl_pssnger_dtls.lastname,
                    tbl_pssnger_dtls.gender,
                    tbl_pssnger_dtls.dob,
                    tbl_pssnger_dtls.email
                    FROM tbl_passenger_account tbl_pssnger_accnt
                    JOIN tbl_passenger_detail tbl_pssnger_dtls ON tbl_pssnger_accnt.id = tbl_pssnger_dtls.id
                    WHERE tbl_pssnger_dtls.id=?";
    $stmt = $c->prepare($sql_srch_slct);
    echo $c -> error;
    $stmt->bind_param('s',$passengerId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $output = '
    <div class="col-sm-3 text-center">
                        <p class="Name" style="font-size: 15px;"><span>Name</span></p>
                        <p class="" style=" font-size: 13px;">'.$row['first_name'].'</p><br>
                    </div>
                    <div class="col-sm-3 text-center">
                        <p class="LName" style="font-size: 15px;"><span>last Name</span></p>
                        <p class="" style=" font-size: 13px;">'.$row['lastname'].'</p><br>
                    </div>
                    <div class="col-sm-3 text-center">
                        <p class="Gender" style="font-size: 15px;"><span>Gender</span></p>
                        <p class="" style=" font-size: 13px;">'.$row['gender'].'</p><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 text-center">
                        <p class="Bdate" style="font-size: 15px;"><span>Birthdate</span></p>
                        <p class="" style=" font-size: 13px;">'.$row['dob'].'</p><br>
                    </div>

   ';
    echo $output;
    $stmt->close();

}

//fetch contact info
function get_ContactInfo($c){
echo "<h1>success</h1>";
}
?>