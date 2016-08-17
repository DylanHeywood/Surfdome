<?php
    $name = $_POST['name'];
    $id = $_POST["id"];
    $qry = "SELECT PictureURL FROM categories WHERE ID = ?";
    $stmt = $con->prepare($qry);
    $stmt->bind_param('i',$id);
    $stmt->execute();
$r = $stmt->get_result();
while($row = $r->fetch_assoc())
{
    $link = $row['PictureURL'];
    echo $link;
}
$stmt->close();




$qry = "INSERT INTO categories VALUES(null,?,?,1,1)";
    $stmt = $con->prepare($qry);
    $stmt->bind_param('ss',$name,$link);
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

$qry = "UPDATE subcategories SET categoryID=? WHERE categoryID=?";
$stmt = $con->prepare($qry);
$stmt->bind_param('ii',$new,$id);
$stmt->execute();

$qry = "UPDATE categories SET Deleted = 0 WHERE ID=?";
echo "<br><br>".$qry;
$stmt = $con->prepare($qry);
$stmt->bind_param('i',$id);
$stmt->execute();

$qry = "UPDATE categories SET Active = 0 WHERE ID=?";
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
        header("Location: ./admin/category");
    }
?>