<?php
echo "<section id='products'>
            <div class='allproducts'>
                <h1>NEW PRODUCTS</h1>
                 <span onclick='newleft()' class='switcher'> < </span><span class='space'>&nbsp;&nbsp;&nbsp;</span>
                 <span onclick='newright()' class='switcher'> > </span><br>";
                
                include("init.php");
                $db2=Data::getInstance();
                $productnames = $db2->productInfo(12);
                $i = 1;
//$qry = "SELECT * FROM products ORDER BY ID DESC";
                //echo $qry;
                echo "<div id='new1'>";
                  while($i<= 6 && $row = $productnames->fetch_array())
                    {
                        $qry2 = "SELECT URL from images WHERE ProductID =". $row['ID']."";
                        $stmt2 = $con->prepare($qry2);
                        $stmt2->execute();
                        $result2 = $stmt2->get_result();
                        $qry3 = "SELECT Price from purchases WHERE ProductID =". $row['ID']."";
                        $stmt3 = $con->prepare($qry3);
                        $stmt3->execute();
                        $result3 = $stmt3->get_result();
                        echo "
                        <div class='product'>";
                            while($row2 = $result2->fetch_assoc())
                            {
                                echo "<div class='productimg'> <img src='".$row2['URL']."'</img></div> ";
                            }
                            echo "<div class='productname'> Product: ".$row['Name']."</div>";
                            while($row3 = $result3->fetch_assoc())
                            {
                                echo "<div class='productprice'>£".$row['Price']."</div>";
                            }
                        echo "</div>";
                      $i++;
                    }
                    echo "</div><div id='new2'>";
                   while($i <= 12 && $i>6 && $row = $productnames->fetch_array())
                   {
                       $qry2 = "SELECT URL from images WHERE ProductID =". $row['ID']."";
                       $stmt2 = $con->prepare($qry2);
                       $stmt2->execute();
                       $result2 = $stmt2->get_result();
                       $qry3 = "SELECT Price from purchases WHERE ProductID =". $row['ID']."";
                       $stmt3 = $con->prepare($qry3);
                       $stmt3->execute();
                       $result3 = $stmt3->get_result();
                       echo "
                        <div class='product'>";
                       while($row2 = $result2->fetch_assoc())
                       {
                           echo "<div class='productimg'> <img src='".$row2['URL']."'</img></div> ";
                       }
                       echo "<div class='productname'> Product: ".$row['Name']."</div>";
                       while($row3 = $result3->fetch_assoc())
                       {
                           echo "<div class='productprice'>£".$row['Price']."</div>";
                       }
                       echo "</div>";
                       $i++;
                   }
                echo "</div>";
            
             echo "<div class='allproducts'>
                   <h1> TOP PRODUCTS</h1>
                <span onclick='topleft()' class='switcher'> < </span><span class='space'>&nbsp;&nbsp;&nbsp;</span>
                 <span onclick='topright()' class='switcher'> > </span><br>";
                    
             $productnames = $db2->topProducts(6);
                $i = 1;
                echo "<div id='top1'>";
                  while($i<= 3 && $row = $productnames->fetch_array())
                  {
                    $qry2 = "SELECT URL from images WHERE ProductID =". $row['ProductID']."";
                    $stmt2 = $con->prepare($qry2);
                    $stmt2->execute();
                    $result2 = $stmt2->get_result();
                    $qry3 = "SELECT Price from purchases WHERE ProductID =". $row['ProductID']."";
                    $stmt3 = $con->prepare($qry3);
                    $stmt3->execute();
                    $result3 = $stmt3->get_result();
                    $qry4 = "SELECT Name from products WHERE ID =". $row['ProductID']."";
                    $stmt4 = $con->prepare($qry4);
                    $stmt4->execute();
                    $result4 = $stmt4->get_result();
                    echo "
                    <div class='product'>";
                    while($row2 = $result2->fetch_assoc())
                    {
                        echo "<div class='productimg'> <img src='".$row2['URL']."'</img></div> ";
                    }
                    while($row4 = $result4->fetch_assoc())
                    {
                        echo "<div class='productname'> Product: ".$row4['Name']."</div>";
                    }
                    while($row3 = $result3->fetch_assoc())
                    {
                        echo "<div class='productprice'>£".$row['Price']."</div>";
                    }
                    echo "</div>";
                    $i++;
                    }
                    echo "</div><div id='top2'>";
                   while($i <= 6 && $i>3 && $row = $productnames->fetch_array())
                   {
                       $qry2 = "SELECT URL from images WHERE ProductID =". $row['ProductID']."";
                       $stmt2 = $con->prepare($qry2);
                       $stmt2->execute();
                       $result2 = $stmt2->get_result();
                       $qry3 = "SELECT Price from purchases WHERE ProductID =". $row['ProductID']."";
                       $stmt3 = $con->prepare($qry3);
                       $stmt3->execute();
                       $result3 = $stmt3->get_result();
                       $qry4 = "SELECT Name from products WHERE ID =". $row['ProductID']."";
                       $stmt4 = $con->prepare($qry4);
                       $stmt4->execute();
                       $result4 = $stmt4->get_result();
                       echo "
                    <div class='product'>";
                       while($row2 = $result2->fetch_assoc())
                       {
                           echo "<div class='productimg'> <img src='".$row2['URL']."'</img></div> ";
                       }
                       while($row4 = $result4->fetch_assoc())
                       {
                           echo "<div class='productname'> Product: ".$row4['Name']."</div>";
                       }
                       while($row3 = $result3->fetch_assoc())
                       {
                           echo "<div class='productprice'>£".$row['Price']."</div>";
                       }
                       echo "</div>";
                       $i++;
                   }
                echo "</div>";



            
            while($i<=3 && $row = $result->fetch_array())
            {
                    $productqry = "SELECT * FROM products WHERE ID = ".$row['ProductID']."";
                    $product = mysqli_query($con,$productqry);
                    $finalproduct = $product->fetch_array();
                    $qry2 = "SELECT Price FROM purchases WHERE ProductID =".$finalproduct['ID']."";
                    $price= mysqli_query($con,$qry2);
                    $finalprice = $price->fetch_array();
                    $qry3 = "SELECT URL FROM images WHERE ProductID =".$row['ProductID']."";
                    $image= mysqli_query($con,$qry3);
                    $finalimage = $image->fetch_array();
                    $i++;
                    $url = $finalimage['URL'];
                    echo "<div class='product'>
                    <div class='productimg'><img src='".$url."' alt=''></img></div>
                    <div class='productname'>Product: ".$finalproduct["Name"]."</div>
                    <div class='productprice'>£".$finalprice['Price']."</div></div>";
            }
            echo "</div><div id='top2'>";
            while($i>3 && $i<=6 && $row = $result->fetch_array())
            {
                    $productqry = "SELECT * FROM products WHERE ID = ".$row['ProductID']."";
                    $product = mysqli_query($con,$productqry);
                    $finalproduct = $product->fetch_array();
                    $qry2 = "SELECT Price FROM purchases WHERE ProductID =".$finalproduct['ID']."";
                    $price= mysqli_query($con,$qry2);
                    $finalprice = $price->fetch_array();
                    $qry3 = "SELECT URL FROM images WHERE ProductID =".$row['ProductID']."";
                    $image= mysqli_query($con,$qry3);
                    $finalimage = $image->fetch_array();
                    $i++;
                    $url = $finalimage['URL'];
                    echo "<div class='product'>
                    <div class='productimg'><img src='".$url."' alt=''></img></div>
                    <div class='productname'>Product: ".$finalproduct["Name"]."</div>
                    <div class='productprice'>£".$finalprice['Price']."</div></div>";
            }
            echo "</div>";       
                    
                    
            echo "<div class='allproducts'>
                <h1> ON SALE</h1>
                 <span class='switcher'> < </span><span class='space'>&nbsp;&nbsp;&nbsp;</span> <span class='switcher'> > </span><br>
                
                <div class='product'>
                    <div class='productimg'><img src='./html/images/products/10.jpg' alt='' class=''></div>
                    <div class='productname'>ROXY Thermal</div>
                    <div class='productprice'>£63.99</div>
                </div>
                <div class='product'>
                    <div class='productimg'><img src='./html/images/products/11.jpg' alt='' class=''></div>
                    <div class='productname'>HURLEY Thermal</div>
                    <div class='productprice'>£21.99</div>
                </div>
                <div class='product'>
                    <div class='productimg'><img src='./html/images/products/12.jpg' alt='' class=''></div>
                    <div class='productname'>Ripcurl Thermal Vest</div>
                    <div class='productprice'>£88.99</div>
                </div>
            </div>
            <div id='viewmore'>Show More</div>
        </section>";

?>