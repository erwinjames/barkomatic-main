<?php
require_once "../resources/config.php";
  
//query to get data from the table
$query = "SELECT * FROM shipping_subscribed";
//execute query
$result = $con->query($query);
//loop through the returned data
$data = array();
foreach ($result as $row) {
 $date = date("m",strtotime($row['date']));
  $data[] = $row;
  $data[] =
}
//free memory associated with result
$result->close();
//close connection
$con->close();
//now print the data
print json_encode($data);

?>