<?php
    $qry = "INSERT INTO categories VALUES (null,?,?,1,1)";
    echo $qry;
    $name = $_POST['name'];
    $url = $_POST['url'];
    $stmt = $con->prepare($qry);
    $stmt->bind_param('ss',$name,$url);
    $stmt->execute();
    $stmt->close();
    header("Location: ./admin/category");
?>