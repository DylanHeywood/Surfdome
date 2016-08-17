<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$urlexplode=(explode("?",$actual_link));
$id = $urlexplode[1];
echo "<form method='POST' action='./admin/products/change-product/'>";
$qry = "SELECT * FROM products WHERE ID = ?";
$stmt = $con->prepare($qry);
$stmt->bind_param('i',$id);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc())
{
    echo "<label>Product Name: </label><br>
<input value='".$row['Name']."' required class='changepasswordinput' id='firstname' name='name' type='text'>
<Br><br>";
    echo "<label>Product Description: </label><br>
<textarea required class='changepasswordinput' id='firstname' name='description'>".$row['Description']."</textarea>
<Br><br>";
    echo "<label>Product Overview: </label><br>
<textarea required class='changepasswordinput' id='firstname' name='overview'>".$row['Overview']."</textarea>
<Br><br>";
    echo "<label>Product Subcategory: </label><br>";
    $qry3 = "SELECT * FROM subcategories WHERE Deleted=1";
    $stmt3 = $con->prepare($qry3);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    echo "<select name='subcategory'>";
    while ($row3 = $result3->fetch_assoc()) {
        echo "<option ";
        if($row3['ID'] == $row['SubcategoryID'])
        {
            echo "selected ";
        }
        echo "value= '" . $row3['ID'] . "'>" . $row3['Name'] . "</option>";
    }
    echo "</select><br><br>";
    echo "<label>Product Brand: </label><br>";
    $qry3 = "SELECT * FROM brands WHERE Deleted=1";
    $stmt3 = $con->prepare($qry3);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    echo "<select name='brand'>";
    while ($row3 = $result3->fetch_assoc()) {
        echo "<option ";
        if($row3['ID'] == $row['BrandID'])
        {
            echo "selected ";
        }
        echo "value= '" . $row3['ID'] . "'>" . $row3['Name'] . "</option>";
    }
    echo "</select><br><br>";
    echo "<label>Product Gender: </label><br>";
    $qry3 = "SELECT * FROM gender";
    $stmt3 = $con->prepare($qry3);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    echo "<select name='gender'>";
    while ($row3 = $result3->fetch_assoc()) {
        echo "<option ";
        if($row3['ID'] == $row['GenderID'])
        {
            echo "selected ";
        }
        echo "value= '" . $row3['ID'] . "'>" . $row3['Gender'] . "</option>";
    }
    echo "</select><br><br>";
    echo "<input type='submit' value='Update Product'><br><br>";
}
