<?php
if(Validate::validateName($_POST['name']))
{
    $name = $_POST['name'];
}
else
{
    $_SESSION['producterror']="name";
    $_SESSION['productname']=$_POST['name'];
    $_SESSION['productdesc']=$_POST['description'];
    $_SESSION['productover']=$_POST['overview'];
    $_SESSION['productprice']=$_POST['price'];
    $_SESSION['productcat']=$_POST['category'];
    header("LOCATION: http://dev.idro.org.uk/~dylan.heywood/surfdomeCOPY/admin/products/create/");
}
if(Validate::validateName($_POST['description']))
{
    $desc = $_POST['description'];
}
else
{
    $_SESSION['producterror']="desc";
    $_SESSION['productname']=$_POST['name'];
    $_SESSION['productdesc']=$_POST['description'];
    $_SESSION['productover']=$_POST['overview'];
    $_SESSION['productprice']=$_POST['price'];
    $_SESSION['productcat']=$_POST['category'];
    header("LOCATION: http://dev.idro.org.uk/~dylan.heywood/surfdomeCOPY/admin/products/create/");
}
if(Validate::validateName($_POST['overview']))
{
    $over = $_POST['overview'];
}
else
{
    $_SESSION['producterror']="over";
    $_SESSION['productname']=$_POST['name'];
    $_SESSION['productdesc']=$_POST['description'];
    $_SESSION['productover']=$_POST['overview'];
    $_SESSION['productprice']=$_POST['price'];
    $_SESSION['productcat']=$_POST['category'];
    header("LOCATION: http://dev.idro.org.uk/~dylan.heywood/surfdomeCOPY/admin/products/create/");
}
if(Validate::validateCost($_POST['price']))
{
    $price = $_POST['price'];
}
else
{
    $_SESSION['producterror']="price";
    $_SESSION['productname']=$_POST['name'];
    $_SESSION['productdesc']=$_POST['description'];
    $_SESSION['productover']=$_POST['overview'];
    $_SESSION['productprice']=$_POST['price'];
    $_SESSION['productcat']=$_POST['category'];
    header("LOCATION: http://dev.idro.org.uk/~dylan.heywood/surfdomeCOPY/admin/products/create/");
}
$cat = $_POST['category'];
?>
<form action="./admin/products/add/" method="post" enctype="multipart/form-data">
    <br>
    <h1> Add new product</h1>
    <br>
    <label>Subcategory: </label><br>
    <?php
    $qry3 = "SELECT * FROM subcategories WHERE Deleted=1 AND CategoryID = $cat";
    $stmt3 = $con->prepare($qry3);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    echo "<select id='cata' name='subcat'>";
    while ($row3 = $result3->fetch_assoc()) {
        echo "<option value= '" . $row3['ID'] . "'>" . $row3['Name'] . "</option>";
    }
    echo "</select><br><br>
    <label>Brand: </label><br>";

    $qry3 = "SELECT * FROM brands WHERE ACTIVE = 1";
    $stmt3 = $con->prepare($qry3);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    echo "<select id='cata' name='brand'>";
    while ($row3 = $result3->fetch_assoc()) {
        echo "<option value= '" . $row3['ID'] . "'>" . $row3['Name'] . "</option>";
    }
    echo "</select><br><br>
        <label>Gender: </label><br>
              <select id='cata' name='gender'>
              <option value=1 selected>Male</option>
              <option value=2 >Female</option>
              <option value=3 >Other</option>
              </select>";
    ?><br><Br>
    <label>Product Image: </label><br>
    <input style="margin-left: 100px" type="file" name="imageSRC" id="fileToUpload"><br><Br>
    <?php
    echo "
                <input type='text' hidden value='" . $name . "' name='name'>
                <input type='text' hidden value='" . $desc . "' name='description'>
                <input type='text' hidden value='" . $over . "' name='overview'>
                <input type='text' hidden value='" . $price . "' name='price'>
            ";
    ?>
    <input type="submit" value="Create Product" name="submit">

