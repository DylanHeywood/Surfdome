<section id="tags">
    <h1>Products</h1><br>
    <?php
        include("init.php");
        $db2=Data::getInstance();
        $productnames = $db2->getProductNames(16);
        echo "<div id='tagcontain'>";
        if(!$productnames == null)
        {
            foreach($productnames as $name)
            {
                echo "<div class='producttag'>";
                echo $name;
                echo "</div>";
            }

        }
    else
    {
        echo "<h2> Sorry but there is no products available at this time</h2>";
    }
    echo "</div>";
//    echo $qry;
  //  print_r($result->fetch_array());
    ?>
</section>