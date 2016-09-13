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
           <a href='./final-payment/paypal/'><img class='payment' src='http://www.hikashop.com/images/payment/paypalexpress.png' alt=''></a>
           <a href='./final-payment/card/'><div class='payment'>Pay with card </div></a>
        </form>
        
        </div>
        
        <div class='summary'>
            <h1 id='summaryh1'>Order Summary - ".count($_SESSION['purchases'])." item(s)</h1><br>
            <hr style='opacity:0.4'>
            <div class='deliveryaddr'>";
            $qry = "SELECT * FROM deliveryaddresses WHERE UserID = ? LIMIT 1";
            $qry2 = "SELECT * FROM users WHERE Email = ?";
            $stmt = $con->prepare($qry2);
            $stmt->bind_param('s', $useremail);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc())
            {
                $name = $row['FirstName'];
                $name = $name." ".$row['Surname'];
                $ID = $row['ID'];
            }
            $stmt = $con->prepare($qry);
            $stmt->bind_param('s', $ID);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc())
            {
                $address = $row['Address'];
                $city = $row['City'];
                $county = $row['County'];
                $postcode = $row['Postcode'];
                $country = $row['Country'];
            }
            echo "<div class='deliverleft'><h4>Delivery Address</h4><br>
                    ".$name."<br>".$address."<br>".$city."<br>".$county."<br>".$country."<br>".$postcode."<br><br> <u id='changeAddr' onclick='changeAddress()'>change address</u>";
                       echo "<form method='post' action=''><select id='addresses' onchange='updateAddress()' name='address'>";
                        $qry = "SELECT Address,ID from deliveryaddresses WHERE UserID = ?";
                        $stmt = $con->prepare($qry);
                        $stmt->bind_param('s', $ID);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc())
                        {
                            echo "<option value='".$row['ID']."'>".$row['Address']."</option>";
                        }
                  echo "</select></form></div>";
            echo "</div>
        </div>

    
        ";
