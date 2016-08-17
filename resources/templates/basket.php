<?php
if(isset($_COOKIE['baskettotal']))
{
    setcookie("baskettotal", $_COOKIE['baskettotal'] + 500, time() + 604800);
    $total = $_COOKIE['baskettotal'];
}
else
{
    setcookie("baskettotal", 500, time() + 604800);
    header("Refresh:0");
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
                <div id='baskettotal'>£".$total."<br><b>2 Items</b></div>
                <div id='basketedit'>
                    <div id='basketclear'><i class='fa fa-times' aria-hidden='true'></i></div>
                    <div id='basketdittext'>EDIT</div>
                </div>
            </section>
            <section id='basketoptions'>
                <div class='basketoptn'>VIEW CART</div>
                <div class='basketoptn'>CHECKOUT</div>
            </section>
            <section id='searchsite'>
                <input type='text' placeholder='SEARCH' name='search' id='search'>
                <div onclick='clearsearch()' id='clearsearch'><i class='fa fa-times' aria-hidden='true'></i></div>                
                <div id='searchicon'><i class='fa fa-search' aria-hidden='true'></i></div>
            </section>
        </section>";
?>