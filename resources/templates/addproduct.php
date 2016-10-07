<?php
$name = $_POST['name'];
$target_dir = "../../surfdomeIMAGES/";
$target_file = $target_dir . basename($_FILES["imageSRC"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$check = getimagesize($_FILES["imageSRC"]["tmp_name"]);
if(move_uploaded_file($_FILES['imageSRC']['tmp_name'], $target_file))
{
    $image = "../surfdomeIMAGES/".$_FILES['imageSRC']['name'];
    echo $image;
}
else
{
    $image = "https://placeholdit.imgix.net/~text?txtsize=28&bg=0099ff&txtclr=ffffff&txt=300%C3%97300&w=300&h=300&fm=png";
}
$desc = $_POST['description'];
$over = $_POST['overview'];
$price = $_POST['price'];
$sub = $_POST['subcat'];
$brand = $_POST['brand'];
$gender = $_POST['gender'];
echo $name."<br>".$desc."<br>".$name."<br>".$over."<br>".$price."<br>".$sub."<br>".$brand."<br>".$gender;
$qry = "INSERT INTO products VALUES (null,?,?,?,?,?,?,1,1)";
$stmt = $con->prepare($qry);
$stmt->bind_param('ssssss',$name,$desc,$brand,$over,$sub,$gender);
$stmt->execute();
$qry = "SELECT ID FROM products WHERE Name = ? AND Description = ?";
$stmt = $con->prepare($qry);
$stmt->bind_param('ss',$name,$desc);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc())
{
    $id = $row['ID'];
}
$date = date("Y-m-d");
$qry = "INSERT INTO images VALUES (null,?,?)";
$stmt = $con->prepare($qry);
$stmt->bind_param('ss',$image,$id);
$stmt->execute();
$opt = mt_rand(1000, 100000000);
$qry = "INSERT INTO purchases VALUES (null,?,?,2000,?,?)";
$stmt = $con->prepare($qry);
$stmt->bind_param('ssss',$id,$date,$price,$opt);
$stmt->execute();
header("Location: http://dev.idro.org.uk/~dylan.heywood/surfdomeCOPY/admin/products/");
