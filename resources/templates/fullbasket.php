<header class='smallbg'>
    <section id="smallhead">
        <section id="headercontent">
<?php
require_once("../resources/templates/top.php");
require_once("../resources/templates/basket.php");
?>
            <section id="left"><br><br>
<?php
$fulltotal = 0;
include("../resources/templates/navi.php");
include("../resources/templates/navi2.php");
include("../resources/templates/advert.php");
include("../resources/templates/tags.php");
echo "</section>";
echo "<section class='margintop' id='products'>";
echo "<div id='breadcrumb'><a href='./'> Home </a> > ";
        echo "Your Basket</div><br><br>";
        echo "<h1 style='float: left!important;'>Your Basket </h1><br><br>";
    echo "<div class='baskethead'>
            <div class='basketheadsection'>
                Your Item
            </div>
            <div class='basketheadsection'>
                Details
            </div>
            <div class='basketheadsection'>
                Quantity
            </div>
            <div class='basketheadsection'>
                Item Price
            </div>
            <div class='basketheadsection'>
                Total
            </div>
          </div>
          <div class='basketcontent'>";
    if(!isset($_SESSION['purchases']))
    {
        echo "SORRY YOU HAVE NOTHING IN YOUR BASKET";
    }
else
{
    foreach($_SESSION['purchases'] as $row)
    {
        echo "<div class='basketheadsection'>";
        $qry = "SELECT * FROM images WHERE ProductID = ? LIMIT 1";
        $stmt = $con->prepare($qry);
        $stmt->bind_param('s', $row['0']);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row2 = $result->fetch_assoc())
        {
            echo "<br>";
            echo "<img style='width: 100%; height: 100%;' src='".$row2['URL']."'>";
        }
        echo "</div>";
        echo "<div class='basketheadsection'>";
        $qry = "SELECT * FROM products WHERE ID = ? LIMIT 1";
        $stmt = $con->prepare($qry);
        $stmt->bind_param('s', $row['0']);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row2 = $result->fetch_assoc())
        {
            echo "<br>";
            echo $row2['Name'];
            $qry = "SELECT * FROM colours WHERE ID = ? LIMIT 1";
            $stmt = $con->prepare($qry);
            $stmt->bind_param('s', $row['3']);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row2 = $result->fetch_assoc())
            {
                echo "<br>";
                $colour = $row2['Colour'];
                echo "colour: ". $row2['Colour'];
            }
            $qry = "SELECT * FROM sizes WHERE ID = ? LIMIT 1";
            $stmt = $con->prepare($qry);
            $stmt->bind_param('s', $row['2']);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row2 = $result->fetch_assoc())
            {
                $size = $row2['Size'];
                echo "<br>";
                echo "size: ". $row2['Size'];
            }
            echo "<br>id: ".$row['0'];
        }
        echo "</div>";
        echo "<div class='basketheadsection'>";
                $qty = $row[1];
        echo "<div class='sizes qtysym' onclick='minus()'>-</div>";
        echo "<form class='basketform' method='post'>";
        echo "<input type='text' name='id' hidden value='$row[0]'>";
        echo "<input type='text' name='colour' hidden value='$row[3]'>";
        echo "<input type='text' name='size' hidden value='$row[2]'>";
        echo "<input style='border:1px solid #777' id='jsqty' type='text' name='qtybask' class='sizes qtybask' value='".$qty."'>";
        echo "<div class='sizes qtysym' onclick='plus()'>+</div><br>";
        echo "<input type='submit'onclick='' formaction='./updatebasket/' class='basketbtn' value='update'><br>
              <input type='submit'onclick='' formaction='./removebasket/' class='basketbtn' value='remove'>";
        echo "</div>";
        echo "<div class='basketheadsection'>";
                    $qry3 = "SELECT Price from purchases WHERE ProductID = ". $row['0']." LIMIT 1";
                    $stmt3 = $con->prepare($qry3);
                    $stmt3->execute();
                    $result3 = $stmt3->get_result();
                    while($row3 = $result3->fetch_assoc())
                    {
                        $price = $row3['Price'];
                        echo $price;
                    }
        echo "</div>";
        echo "<div class='basketheadsection'>";
                echo $qty*$price;
        $fulltotal = $fulltotal+($qty*$price);
        echo"</div><br><br><hr style='opacity: 0.1'>";
    }

    echo "<div id='basktotal'>Basket Total: £".$fulltotal.
    "<br><a href='./checkout/'><div style='border:none' type='submit' id='buybtn' value='Pay Securely'>Pay Securely</div></a><br><Br>
    <img src='http://www.footasylum.com/images/core/bskt_card_icons.gif'>
    </div><Br>";
}