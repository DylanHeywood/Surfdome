<?php
$total = 0;
if(isset($_SESSION['purchases'])) {
    $items = count($_SESSION['purchases']);
    foreach($_SESSION['purchases'] as $row)
    {
        $qry3 = "SELECT Price from purchases WHERE ProductID = ". $row[0]." LIMIT 1";
        $stmt3 = $con->prepare($qry3);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
        while($row3 = $result3->fetch_assoc())
        {
            $cost = $row3['Price'];
        }
        foreach ($_SESSION['purchases'] as $row)
        {
            $total = $total + ($row[1] * $cost);
        }
    }
}
else
{
    $items = 0;
}
echo "<section class='basket'>";
if(isset($_COOKIE['UserLoggedIn']) || isset($_SESSION['UserLoggedIn']))
{
   echo "<a href='./html/logout'><section class='basketlogin'>LOGOUT</section></a>";
}
else
{
    echo "<a href='./html/login'><section class='basketlogin'>LOG IN</section></a>";
}
        echo "<section class='basketlogin'>WISH LIST(0)</section>
            <section class='basketmain'>
                <div id='basketicon'><i class='fa fa-shopping-cart' aria-hidden='true'></i></div>
                <div id='baskettotal'>£".$total."<br><b>".$items." Items</b></div>
                <div id='basketedit'>
                    <div id='basketclear'><i class='fa fa-times' aria-hidden='true'></i></div>
                    <div id='basketdittext'>EDIT</div>
                </div>
            </section>
            <section id='basketoptions'>
                <a href='./basket/'><div class='basketoptn'>VIEW CART</div></a>
                <div class='basketoptn'>CHECKOUT</div>
            </section>
            <section id='searchsite'>
                <input type='text' placeholder='SEARCH' name='search' id='search'>
                <div onclick='clearsearch()' id='clearsearch'><i class='fa fa-times' aria-hidden='true'></i></div>                
                <div id='searchicon'><i class='fa fa-search' aria-hidden='true'></i></div>
            </section>
        </section>";
?>