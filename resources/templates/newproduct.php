<?php
if(isset($_SESSION['producterror'])) {
    echo "<form action='./admin/products/create2/' method='post' enctype='multipart/form-data'>
    <br><h1> Add new product</h1>
        <br>";
        echo $_SESSION['producterror'];
        if($_SESSION['producterror']=="name"){echo"<h3>Please enter a valid name</h3>";}
        echo "<label>Product Name: </label><br>
        <input type='text' class='changepasswordinput' value='" . $_SESSION['productname'] . "' id='name' name='name'><br><br>";
        if($_SESSION['producterror']=="desc"){echo"<h3>Please enter a valid description</h3>";}
        echo "<label>Product Description:</label><Br>
        <textarea required class='changepasswordinput' id='firstname' name='description'>" . $_SESSION['productdesc'] . "</textarea><Br><br>";
        if($_SESSION['producterror']=="over"){echo"<h3>Please enter a valid overview</h3>";}
        echo "<label>Product Overview:</label><Br>
        <textarea required class='changepasswordinput' id='firstname' name='overview'>" . $_SESSION['productover'] . "</textarea><Br><br>
        ";
        if($_SESSION['producterror']=="cat"){echo"<h3>Please enter a valid category</h3>";}
        echo "<label>Product category: </label><br>";
    $qry3 = "SELECT * FROM categories WHERE Deleted=1";
    $stmt3 = $con->prepare($qry3);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    echo "<select id='cata' name='category'>";
    while ($row3 = $result3->fetch_assoc()) {
        if ($row3['ID'] == $_SESSION['productcat']) {
            echo "<option selected value= '" . $row3['ID'] . "'>" . $row3['Name'] . "</option>";
        } else {
            echo "<option value= '" . $row3['ID'] . "'>" . $row3['Name'] . "</option>";
        }
    }
    echo "</select><br><br>";
    if($_SESSION['producterror']=="price"){echo"<h3>Please enter a valid price</h3>";}
        echo "<label>Product Price: </label><br>
        £<input type='string' class='changepasswordinput' value='" . $_SESSION['productprice'] . "' id='pricechange' name='price' placeholder='9.99'><br><br>
        <input type='submit' value='Next' name='submit'>
        </form>";
    unset($_SESSION['producterror']);
}
else
    {
    ?>
    <form action="./admin/products/create2/" method="post" enctype="multipart/form-data">
        <br>
        <h1> Add new product</h1>
        <br>
        <label>Product Name: </label><br>
        <input type='text' class="changepasswordinput" id="name" name='name'><br><br>
        <label>Product Description:</label><Br>
        <textarea required="" class="changepasswordinput" id="firstname" name="description"></textarea><Br><br>
        <label>Product Overview:</label><Br>
        <textarea required="" class="changepasswordinput" id="firstname" name="overview"></textarea><Br><br>
        <?php echo "<label>Product category: </label><br>";
        $qry3 = "SELECT * FROM categories WHERE Deleted=1";
        $stmt3 = $con->prepare($qry3);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
        echo "<select id='cata' name='category'>";
        while ($row3 = $result3->fetch_assoc()) {
            echo "<option value= '" . $row3['ID'] . "'>" . $row3['Name'] . "</option>";
        }
        echo "</select><br><br>"; ?>
        <label>Product Price: </label><br>
        £<input type='string' class="changepasswordinput" id="pricechange" name='price' placeholder="9.99"><br><br>
        <input type="submit" value="Next" name="submit">
    </form>
    <?php
}
?>
<script>
</script>