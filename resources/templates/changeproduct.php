<?php
$name = $_POST['name'];
echo $name."<br>";
$desc = $_POST['description'];
echo $desc."<br>";
$overview = $_POST['overview'];
echo $overview."<br>";
$subcat = $_POST['subcategory'];
echo $subcat."<br>";
$brand = $_POST['brand'];
echo $brand."<br>";
$gender = $_POST['gender'];
echo $gender."<br>";
$qry = "SELECT ID FROM products WHERE Name=?";
$stmt = $con->prepare($qry);
$stmt->bind_param('s',$name);
$stmt->execute();
$result=$stmt->get_result();
while($r = $result->fetch_assoc())
{
    $oldID = $r['ID'];
}
$qry = "INSERT INTO products VALUES(null,?,?,?,?,?,?,1,1)";
$stmt = $con->prepare($qry);
$stmt->bind_param('ssssss',$name,$desc,$brand,$overview,$subcat,$gender);
$stmt->execute();

$qry = "UPDATE products SET Deleted=0,Active=0 WHERE ID=?";
$stmt = $con->prepare($qry);
$stmt->bind_param('i',$oldID);
$stmt->execute();
$qry = "UPDATE purchases SET ProductID=?";
$stmt = $con->prepare($qry);
$stmt->bind_param('i',$oldID);
$stmt->execute();
//header("Location: ../");
