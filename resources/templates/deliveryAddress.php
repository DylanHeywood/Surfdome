<?php

if(isset($_POST))
{

}
$qry2 = "SELECT * FROM deliveryaddresses WHERE UserID = ? LIMIT 1";
$stmt = $con->prepare($qry2);
$stmt->bind_param('s', $id);
$stmt->execute();
$result = $stmt->get_result();
while($row=$result->fetch_assoc())
{
    $addr1 = $row['Address'];
    $city = $row['City'];
    $county = $row['County'];
    $country = $row['Country'];
    $postcode = $row['Postcode'];
}
$arr = array ('FirstLine'=>$addr1,'City'=>$city,'County'=>$county,'Country'=>$country,'Postcode'=>$postcode);
echo json_encode($arr);