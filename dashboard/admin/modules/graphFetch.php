<?php
require_once "../resources/config.php";
if(isset($_POST["year"]))
{
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $stmt2 = $con->prepare("SELECT * FROM shipping_subscribed WHERE year = '2022'"); 
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    while ($row2 = $result2->fetch_assoc()) {
 {
  $output[] = array(
   'month'   => date("m",strtotime($row2['year']));
   'profit'  => floatval($row["money_sent"])
  );
 }
 echo json_encode($output);
}

?>