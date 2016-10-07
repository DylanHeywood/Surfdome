<header class='smallbg2'>
    <section id="smallhead">
        <section id="headercontent">
<?php

require_once("../resources/templates/top.php");
require_once("../resources/templates/basket.php");
?>
<section id="left"><br><br>
<?php
    include("../resources/templates/navi.php");
    include("../resources/templates/navi2.php");
    include("../resources/templates/advert.php");
    include("../resources/templates/tags.php");
    echo "</section>";
$product = $url['4'];
echo "<section class='margintop' id='products'>";
echo "<div id='breadcrumb'><a href='./'> Home </a> > ";
        $qry = "SELECT * FROM products WHERE Name = ? AND Active = 1 AND Deleted = 1";
        $stmt = $con->prepare($qry);
        $product = str_replace("-"," ",$product);
        $stmt->bind_param('s', $product);
        $stmt->execute();
        $result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $name = $row['Name'];
    $desc = $row['Description'];
    $id = $row['ID'];
    $over = $row['Overview'];
    $qry2 = "SELECT * from subcategories WHERE ID = ?";
            $stmt2 = $con->prepare($qry2);
            $stmt2->bind_param('s', $row['SubcategoryID']);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            while($row2 = $result2->fetch_assoc())
            {
                $subID = $row2['ID'];
                $subcat = $row2['Name'];
                $qry3 = "SELECT * from categories WHERE ID = ?";
                $stmt3 = $con->prepare($qry3);
                $stmt3->bind_param('s', $row2['categoryID']);
                $stmt3->execute();
                $result3 = $stmt3->get_result();
                while($row3=$result3->fetch_assoc())
                {
                    $cat = $row3['Name'];
                }
            }
        }
$cat = strtolower($cat);
$cat = ucfirst($cat);
$subcat = strtolower($subcat);
$subcat = ucfirst($subcat);
$catlink = str_replace(" ","-",$cat);
$subcatlink = str_replace(" ","-",$subcat);
echo "<a href='./".$catlink."'>".$cat."</a> > <a href='./".$catlink."/".$subcatlink."'>".$subcat."</a> > 
".$name;
echo "</div>
<div id='returnpage'>
<b><a class='nostyle' href=\"javascript:history.back()\">< back to previous page</a></b>
</div>
<div id='productimages'>
    <div id='productimage'>";
        $qry = "SELECT * FROM images WHERE ProductID = ? LIMIT 3";
        $stmt = $con->prepare($qry);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
$i=1;
        while ($row = $result->fetch_assoc()) {
            if($i == 1)
            {
                $img1 = $row['URL'];
                echo "<img id='mainimage'  data-zoom-image='".$img1."' src='".$img1."'>";
            }
            elseif ($i == 2)
            {
                $img2 = $row['URL'];
            }
            elseif ($i == 3)
            {
                $img3 = $row['URL'];
            }
            $i=$i+1;
        }
   echo "</div>
    <div class='productimages'>
        <div class='displayimage'><img onclick='image(this.src)' src='".$img1."'></div>";
        if(isset($img2))
        {
            echo "<div class='displayimage'><img onclick='image(this.src)' src='".$img2."'></div>";
        }
        if(isset($img3))
        {
            echo "<div class='displayimage'><img onclick='image(this.src)' src='".$img3."'></div>";
        }
    echo "</div>
</div>
<div id='productinfo'>
<h1>".$name."</h1>
<div id='pricestock'>
    <div id='price'>";
        $qry = "SELECT Price as cost,SUM(QTY) as stock FROM purchases WHERE ProductID = ?";
$stmt = $con->prepare($qry);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $qry2 = "SELECT SUM(QTY) as sold FROM purchases WHERE ProductID = ?";
            $stmt2 = $con->prepare($qry2);
            $stmt2->bind_param('i', $id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            while ($row2 = $result2->fetch_assoc()) {
                $stock = $row['stock']-$row2['sold'];
            }
            echo "£".$row['cost'];
        }
    echo "</div>
    <div id='stock'>
        <p>Product Code: <b>".$id."</b></p>";
        echo "<p>Availablity: <b>";
        if($stock=0)
        {
            echo "Out Of Stock";
        }
        elseif($stock>0 and $stock<5)
        {
            echo "Low Stock";
        }
        else
        {
            echo "In Stock";
        }
        echo "</b></p>
    </div>
    <hr>
    <div id='productdesc'>
        <h4>Quick Overview</h4>
        <p>".$over."</p>
    </div>
    <hr>
    <form action='./add-to-bag/' method='post'>
    <input hidden value='".$id."' name='product'>
    <div id='productsize'>
    <h4>Size:</h4>
    <select name='size'>";
        $qry2 = "SELECT * from sizes";
        $stmt2 = $con->prepare($qry2);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        while ($row2 = $result2->fetch_assoc()) {
            echo "<option value='".$row2['ID']."'>".$row2['Size']."</option>";
        }
    echo "</select>
    </div><Hr>
    <div id='productsize'>
         <h4>Colour:</h4>
        <select name='colour'>";
            $qry2 = "SELECT * from colours";
            $stmt2 = $con->prepare($qry2);
            $stmt2->bind_param('i', $row['ColourID']);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            while ($row2 = $result2->fetch_assoc()) {
                echo "<option value='".$row2['ID']."'>".$row2['Colour']."</option>";
            }
        echo "</select>
    </div><hr>
    <div id='productqty'>
    <h4>Quantity</h4>
    <span onclick='minus()' id='plus'>-</span>
    <input style='border:none' id='jsqty' type='text' name='qty' class='sizes' value='1'>
    <span onclick='plus()' id='plus'>+</span>
    </div>
    <input style='border:none' type='submit' id='buybtn' value='Add To Cart'>
    </input>
    </div>
    </div>
    </form>
    <div id='description'>
        <div id='desctitle'>
            <h1>Product Description</h1>
        </div>
        <p>";
        echo $desc;
        echo "</p>
    </div>
    <div class='allproducts'>
        <h1>Recommended</h1>
        <div class='product'>";
            $qry = "SELECT * FROM products WHERE SubCategoryID = ? ORDER BY uuid() LIMIT 1";
            $stmt = $con->prepare($qry);
            $stmt->bind_param('s',$subcat);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc())
            {
                echo "<div class='product'>
                        <div class='productimg'>
                        test
                            <img src='".$row['URL']."'>
                        </div>
                </div>";
            }
            echo "<div class='productimg'>
                
            </div>
        </div>
        <div class='product'>
        <div class='productimg'></div>
        </div>
        <div class='product'>
        <div class='productimg'></div>
        </div>
    </div>
</div>  
</div>
     </section>";