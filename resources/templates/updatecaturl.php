<?php
    $url = $_POST['url'];
    $id = $_POST["id"];
    $qry = "UPDATE categories SET PictureURL = ? WHERE ID = ?";
    echo $qry;
    $stmt = $con->prepare($qry);
    $stmt->bind_param('si',$url,$id);
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