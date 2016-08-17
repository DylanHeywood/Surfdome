<?php
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo $actual_link."<br>";
    $urlexplode=(explode("?",$actual_link));
    $id = $urlexplode[1];
    echo $id;
    $qry = "UPDATE categories SET Deleted = 0 WHERE ID = ?";
    echo $qry;
    $stmt = $con->prepare($qry);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $stmt->close();
    $qry2 = "SELECT ID FROM subcategories WHERE categoryID = ?";
    $stmt2 = $con->prepare($qry2);
    $stmt2->bind_param('i',$id);
    $stmt2->execute();
    $result = $stmt2->get_result();
    while ($row = $result->fetch_assoc()) {
        $subcatID = $row['ID'];
    }
    $qry = "UPDATE subcategories SET Deleted = 0 WHERE ID = ?";
    $stmt = $con->prepare($qry);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $stmt->close();

    $qry = "UPDATE products SET Deleted = 0 WHERE ID = ?";
    $stmt = $con->prepare($qry);
    $stmt->bind_param('i',$subcatID);
    $stmt->execute();
    $stmt->close();
    if (isset($_SERVER["HTTP_REFERER"]))
    {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    else
    {
        header("Location: ./admin/category");
    }
?>