<?php
require_once"modules/config.php";
session_start();
if (isset($_GET['item_number'])) {
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
      $sql_em = "SELECT 
       tbl_pass_reserv.reservation_number,
                        tbl_pass_reserv.ship_name,
                        tbl_pass_reserv.passenger_name,
                        tbl_pass_reserv.location_from,
                        tbl_pass_reserv.location_to,
                        tbl_pass_reserv.depart_date,
                        tbl_pass_reserv.depart_time,
                        tbl_pass_reserv.accomodation,
                        tbl_pass_reserv.reservation_date,
                        tbl_pass_reserv.expiration,
                        tbl_pass_reserv.status,
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
     from tbl_passenger_reservation tbl_pass_reserv
     JOIN tbl_ship_detail tbl_sd ON tbl_pass_reserv.ship_name = tbl_sd.ship_name
     JOIN tbl_ship_schedule tbl_sched ON tbl_sd.id = tbl_sched.id
     JOIN tbl_ship_has_accomodation_type tbl_acctyp ON tbl_sched.id = tbl_acctyp.id
     JOIN tbl_tckt tbl_tcket ON tbl_sd.ship_name = tbl_tcket.tckt_owner
     WHERE tbl_pass_reserv.reservation_number=? LIMIT 1";
     
      $s = $con->prepare($sql_em);
      $s->bind_param('s',$_GET['item_number']);
      $s->execute();
      $result2 = $s->get_result();
      while ($row = $result2->fetch_array()){
?>

<!DOCTYPE html>
<head>
<style>

.bodydiv {       
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  min-height: 100vh;
                  color: #454f54;
                  background-color: #f4f5f6;
                  background-image: linear-gradient(to bottom left, #abb5ba, #d5dadd);
                }
                
                .ticket {
              
                  display: grid;
                  grid-template-rows: auto 1fr auto;
                  max-width: 4rem;
                }
.ticket__header, .ticket__body, .ticket__footer {

  padding: 1.25rem;
  background-color: white;
  border: 1px solid #abb5ba;
  box-shadow: 0 2px 4px rgba(41, 54, 61, 0.25);
}
.ticket__header {

  font-size: 1.5rem;
  border-top: 0.25rem solid #dc143c;
  border-bottom: none;
  box-shadow: none;
}
.ticket__wrapper {
  
  box-shadow: 0 2px 4px rgba(41, 54, 61, 0.25);
  border-radius: 0.375em 0.375em 0 0;
  overflow: hidden;
}
.ticket__divider {
  
  position: relative;
  height: 1rem;
  background-color: white;
  margin-left: 0.5rem;
  margin-right: 0.5rem;
}
.ticket__divider::after {
  
  content: '';
  position: absolute;
  height: 50%;
  width: 100%;
  top: 0;
  border-bottom: 2px dashed #e9ebed;
}
.ticket__notch {

  position: absolute;
  left: -0.5rem;
  width: 1rem;
  height: 1rem;
  overflow: hidden;
}
.ticket__notch::after {
   
  content: '';
  position: relative;
  display: block;
  width: 2rem;
  height: 2rem;
  right: 100%;
  top: -50%;
  border: 0.5rem solid white;
  border-radius: 50%;
  box-shadow: inset 0 2px 4px rgba(41, 54, 61, 0.25);
  box-sizing: border-box;
}
.ticket__notch--right {
  
  left: auto;
  right: -0.5rem;
}
.ticket__notch--right::after {
  
  right: 0;
}
.ticket__body {
  
  border-bottom: none;
  border-top: none;
}
.ticket__body > * + * {

  margin-top: 1.5rem;
  padding-top: 1.5rem;
  border-top: 1px solid #e9ebed;
}
.ticket__section > * + * {
    margin: 0;
  margin-top: 0.25rem;
}
.ticket__section > h3 {
  font-size: 1.125rem;
  margin-bottom: 0.5rem;
}
.ticket__header, .ticket__footer {
  font-weight: bold;
  font-size: 1.25rem;
  display: flex;
  justify-content: space-between;
}
.ticket__footer {
  border-top: 2px dashed #e9ebed;
  border-radius: 0 0 0.325rem 0.325rem;
}
</style>
</head>
<body>
<div class="bodydiv">
<article class='ticket>
<header class='ticket__wrapper'>
  <div class='ticket__header'>
    <?php echo $_GET['item_number'] ;?> 🎟
  </div>
</header>
<div class='ticket__divider'>
  <div class='ticket__notch'></div>
  <div class='ticket__notch ticket__notch--right'></div>
</div>
<div class='ticket__body'>
  <section class='ticket__section'>
    <h3>Your Tickets</h3>
    <p><?php echo $row['accomodation'] ?? 'Accomodation'; ?></p>
    <p><?php echo $row['seat_type'] ?? 'No seats'?></p>
  </section>
  <section class='ticket__section'>
    <h3>Delivery Address</h3>
    <p>Addis ababa, 2321 px.box</p>
    <p>Ethiopia</p>
  </section>
  <section class='ticket__section'>
    <h3>Payment Method</h3>
    <p>Mastercard **** 3232</p>
  </section>
</div>
<footer class='ticket__footer'>
  <span>Total Paid</span>
  <span>£173.20</span>
</footer>
</article>
</div>
</body>
</html>

<?php  
      }
}else{
  echo "2";
}
 ?>