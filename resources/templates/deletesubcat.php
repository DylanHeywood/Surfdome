<?php
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo $actual_link."<br>";
    $urlexplode=(explode("?",$actual_link));
    $id = $urlexplode[1];
    echo $id;
    $qry = "UPDATE subcategories SET Deleted = 0 WHERE ID = ?";
    echo $qry;
    $stmt = $con->prepare($qry);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $stmt->close();
    $qry = "UPDATE products SET Deleted = 0 WHERE ID = ?";
    $stmt = $con->prepare($qry);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $stmt->close();
    header("Location: ./");