<?php
$qry = "INSERT INTO subcategories VALUES (null,?,1,1,?)";
echo $qry."<br>";
$name = $_POST['name'];
echo $name;
$cat = $_POST['category'];
echo "<br>".$cat;
$stmt = $con->prepare($qry);
$stmt->bind_param('ss',$name,$cat);
$stmt->execute();
header("Location: ./");
?>