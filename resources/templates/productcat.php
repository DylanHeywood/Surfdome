<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$urlexplode=(explode("?",$actual_link));
if(isset($urlexplode[1]))
{
    $qry = "SELECT ID FROM categories WHERE Name = ?";
    $stmt = $con->prepare($qry);
    $name = str_replace('-', ' ', $urlexplode[1]);
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($r = $result->fetch_array())
    {
        $catID = $r['ID'];
    }
    $qry = "SELECT ID,Name FROM subcategories WHERE CategoryID = ? AND Active = 1 AND Deleted = 1";
    $stmt = $con->prepare($qry);
    $stmt->bind_param('s', $catID);
    $stmt->execute();
    $result = $stmt->get_result();
    echo "<h1> Now choose a subcategory </h1><br>";
    while ($r = $result->fetch_array())
    {
        $subcatID = $r['ID'];
        $one = strtolower($r['Name']);
        $final = str_replace(" ", "-", $one);
        echo "<a href='./admin/products/subcategories?" . $final . "'><div class='prodcats'>
            " . $r['Name'] . "
        </div></a>";
    }
}
else {
    echo "<section id='center'>";
    $qry = "SELECT * FROM categories WHERE Deleted = 1 AND Active = 1 ORDER BY ID DESC;";
    echo "<div class='adminlist'>";
    echo "<br><br>";
    echo "<div class='admntop'></div>";
    $result = mysqli_query($con, $qry);
    $counter = 1;
    while ($r = $result->fetch_array()) {
        $one = strtolower($r['Name']);
        $final = str_replace(" ", "-", $one);
        echo "<a href='./admin/products/categories?" . $final . "'><div class='prodcats'>
            " . $r['Name'] . "
        </div></a>";

    }
}