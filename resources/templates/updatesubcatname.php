<?php
$name = $_POST['name'];
$id = $_POST["id"];
$qry = "SELECT categoryID FROM subcategories WHERE ID = ?";
$stmt = $con->prepare($qry);
$stmt->bind_param('i',$id);
$stmt->execute();
$r = $stmt->get_result();
while($row = $r->fetch_assoc())
{
    $catID = $row['categoryID'];
    echo $catID;
}

$qry = "INSERT INTO subcategories VALUES(null,?,1,1,?)";
$stmt = $con->prepare($qry);
$stmt->bind_param('ss',$name,$catID);
$stmt->execute();
$stmt->close();

$qry = "SELECT ID FROM categories ORDER BY ID DESC LIMIT 1";
$stmt = $con->prepare($qry);
$stmt->execute();
$r = $stmt->get_result();
while($row = $r->fetch_assoc())
{
    $new = $row['ID'];
}

$qry = "UPDATE products SET SubcategoryID=? WHERE SubcategoryID=?";
$stmt = $con->prepare($qry);
$stmt->bind_param('ii',$new,$id);
$stmt->execute();

$qry = "UPDATE subcategories SET Deleted = 0 WHERE ID=?";
echo "<br><br>".$qry;
$stmt = $con->prepare($qry);
$stmt->bind_param('i',$id);
$stmt->execute();

$qry = "UPDATE subcategories SET Active = 0 WHERE ID=?";
echo "<br><br>".$qry;
$stmt = $con->prepare($qry);
$stmt->bind_param('i',$id);
$stmt->execute();
if (isset($_SERVER["HTTP_REFERER"]))
{
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
else
{
    header("Location: ./");
}
?>