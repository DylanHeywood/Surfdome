<?php
if (isset($_SESSION['UserLoggedIn']) || isset($_COOKIE['UserLoggedIn'])) {}
else
{
header("LOCATION: ../login/");
}
if(isset($_SESSION['UserLoggedIn']))
{
$useremail = $_SESSION['UserLoggedIn'];
}
elseif(isset($_COOKIE['UserLoggedIn']))
{
$useremail = $_COOKIE['UserLoggedIn'];
}
?>

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
        echo "<a href='./basket/'>Your Basket</a> > Checkout </div><br><br>";
        echo "<h1 style='float: left!important;'>Delivery Options </h1><br><br>";

echo "<div class='deliveryoptn'>
        
        <form method='post'>
           
            <div class='deliveroptns'>
                <input type='radio' checked onclick='updateDel(this)' name='delivery' value='1'> Standard - <b>free</b><br>
                <div id='del1' class='deliveryinfo'>Delivered within 2-4 working days</div>
            </div>
            <div class='deliveroptns'>
                <input type='radio' onclick='updateDel(this)' name='delivery' value='2'> Next day - <b>£4.99</b><br>
                <div id='del2' class='deliveryinfo'>Order by 9pm for next day delivery</div>
            </div>
            <div class='deliveroptns'>
                <input type='radio' onclick='updateDel(this)' name='delivery' value='3'> Collection - <b>free</b><br>
                <div id='del3' class='deliveryinfo'>Please provide valid ID upon collection</div>
            </div>
           <a href='./final-payment/paypal/'><img class='payment' src='http://www.paypal.com/en_US/i/btn/x-click-but6.gif' alt=''></a>
           <a href='./final-payment/card/'><img class='payment' src='http://nvee.co.uk/images/worldpay.png' alt=''></a>
        </form>
        
        </div>
        
        <div class='summary'>
            <h1 id='summaryh1'>Order Summary - ".count($_SESSION['purchases'])." item(s)</h1><br>
            <hr style='opacity:0.4'>
            <div class='deliveryaddr'>";
$overtotal = 0;
            $qry2 = "SELECT * FROM users WHERE Email = ?";
            $stmt = $con->prepare($qry2);
            $stmt->bind_param('s', $useremail);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row=$result->fetch_assoc())
            {
                $id = $row['ID'];
                echo "<input id='hiddenID' style='display:none' value='".$id."'></input>";
                $name = $row['FirstName']." ".$row['Surname'];
            }
            echo "<div class='deliverleft'><h4>Delivery Address</h4><br>";
            echo $name."<br>";
            echo "</div>";
            echo "<div id='addressdiv'></div>
            <h4 onclick='changeAddress()' id='changeAddr'>Change Delivery Address</h4>
            <select onchange='updateAddress()' id='addresses'>";
            $qry = "SELECT * FROM deliveryaddresses where UserID = ?";
            $stmt = $con->prepare($qry);
            $stmt->bind_param('s', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row=$result->fetch_assoc())
            {
                echo "<option value='".$row['ID']."'>".$row['Address']."</option>";
            }
            echo "</select></div>
        <div class='checkoutProduct'>";

            foreach($_SESSION['purchases'] as $row)
            {
                $qry = "SELECT * FROM images WHERE ProductID = ? LIMIT 1";
                $stmt = $con->prepare($qry);
                $stmt->bind_param('s', $row['0']);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row2 = $result->fetch_assoc())
                {
                    $img = $row2['URL'];
                }
                $qry = "SELECT * FROM products WHERE ID = ? LIMIT 1";
                $stmt = $con->prepare($qry);
                $stmt->bind_param('s', $row['0']);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row2 = $result->fetch_assoc())
                {
                    $name = $row2['Name'];
                }
                $qry = "SELECT * FROM colours WHERE ID = ? LIMIT 1";
                $stmt = $con->prepare($qry);
                $stmt->bind_param('s', $row['3']);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row2 = $result->fetch_assoc())
                {
                    $colour = $row2['Colour'];
                }
                $qry = "SELECT * FROM sizes WHERE ID = ? LIMIT 1";
                $stmt = $con->prepare($qry);
                $stmt->bind_param('s', $row['2']);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row2 = $result->fetch_assoc())
                {
                    $size = $row2['Size'];
                }
                $qry3 = "SELECT Price from purchases WHERE ProductID = ". $row['0']." LIMIT 1";
                $stmt3 = $con->prepare($qry3);
                $stmt3->execute();
                $result3 = $stmt3->get_result();
                while($row3 = $result3->fetch_assoc())
                {
                    $price = $row3['Price'];
                }
                $qty = $row[1];
                echo "<div class='checkoutProducts'>
                        <div class='checkoutImage'>
                        <img src='".$img."' alt=''>
                        </div>
                        <div class='checkoutDetails'>
                        <div class='checkoutName'><h4>".$name."</h4></div>
                        <div class='checkoutInfo'>size: ".$size."<br>".$colour."</div>
                        <div class='checkoutCost'>".$qty." x  £".$price."</div>
                </div></div>";
                echo "<div class='checkoutTotal'><h4>Total: £".$qty*$price."</h4></div><Br><hr>";
                $overtotal = $overtotal + ($qty*$price);
            }
           echo "<div class='checkoutDeliveries'>
                    <div class='left'><h4>Sub Total</h4></div><div id='subtotal' class='right'>£".$overtotal."</div><br>
                    <div class='left'>Delivery</div><div id='deliveryCost' class='right'>Free</div>
                 </div><br><hr>
            <div class='grandTotal'>
                <div class='left'>Grand Total</div><div id='overallTotal' class='right'><h3>£".$overtotal."</h3></div>
            <div>
        </div>

    
        ";
