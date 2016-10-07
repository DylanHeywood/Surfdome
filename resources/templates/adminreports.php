<?php
echo "<section id='center'>";
echo "<div class='adminlist'>";
echo "<br><br>";
echo "<div class='admntop'></div>";
    if(isset($url[5]))
    {
        if($url[5] == "page-hits")
        {
            if(ctype_digit ( $url[6] ))
            {
                if($url[7] !== "all")
                {
                    $qry = "SELECT * FROM pagehits WHERE UserID = ? ORDER BY Time DESC LIMIT 20";
                }
                else
                {
                    $qry = "SELECT * FROM pagehits WHERE UserID = ? ORDER BY Time DESC";
                }
                $stmt = $con->prepare($qry);
                $stmt->bind_param('s', $url[6]);
                $stmt->execute();
                $result = $stmt->get_result();
                echo "<div class='historyrow'>
         <div class='historytitle historyurl'>
              Url
         </div>
         <div class='historytitle historytime'>
               Time and date   
         </div></div>";
                while ($row = $result->fetch_assoc())
                {
                    echo "<div class='historyrow'>
                <a href='".$row['URL']."'><div class='historyurl'>".
                        $row['URL']
                        ."</div></a>
                <div class='historytime'>".
                        $row['Time']
                        ."</div></div>";
                }
                echo "<br><br>";
                echo "</div>";
                echo "<br><a href='./admin/reports/page-hits/'>back</a>";
            }
            else
            {
                echo "<h1> Please choose a user </h1>";
                $qry = "SELECT * FROM users";
                $stmt = $con->prepare($qry);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc())
                {
                    echo "<a href='./admin/reports/page-hits/".$row['ID']."/'>";
                    echo $row['FirstName']." ".$row['Surname'];
                    echo "</a><br>";
                }
            }

        }
        elseif($url[5]=="stock")
        {
            echo "<h1>Stock</h1>";
            $qry = "SELECT ID,Name FROM products";
            $stmt = $con->prepare($qry);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc())
            {
                $bought = 0;
                $qry2 = "SELECT * FROM purchases WHERE ProductID = ?";
                $stmt2 = $con->prepare($qry2);
                $stmt2->bind_param('i',$row['ID']);
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                    while ($row2 = $result2->fetch_assoc())
                    {
                        if(isset($row2['Qty']))
                        {
                            $bought = $bought + $row2['Qty'];
                        }
                        else
                        {
                            $bought = $bought + 0;
                        }
                    }
                $sold = 0;
                $qry3 = "SELECT * FROM orders WHERE ProductID = ?";
                $stmt3 = $con->prepare($qry3);
                $stmt3->bind_param('i',$row['ID']);
                $stmt3->execute();
                $result3 = $stmt3->get_result();
                    while ($row2 = $result2->fetch_assoc()) {
                        $sold = $sold + $row2['qty'];
                    }
                $quantity = $bought - $sold;
                if($quantity <= 0)
                {
                    echo "<div class='nostock'>";
                }
                elseif($quantity < 5)
                {
                    echo "<div class='ltdstock'>";
                }
                else
                {
                    echo "<div class='instock'>";
                }
                echo $row['Name']." - ".$quantity."<BR></div>";
            }
        }
        elseif($url[5]=="sale-reports")
        {
            require_once("../resources/templates/salesreports.php");
        }
        else
        {
            echo "
            <h1>Please choose an option</h1><br><br>
            <a href='./admin/reports/page-hits/'>Page hits</a><Br>
            <a href='./admin/reports/sale-reports/'>Sales Reports</a><br>
            <a href='./admin/reports/stock/'>Stock</a><br>
            <a href='./admin/reports/popular/'>Popular</a><br>";
        }
    }
?>
