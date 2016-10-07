<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
</script>
<?php
    if($url[6]=="")
    {
        echo "<h1>Sales Reports</h1><br><br>";
        echo "<a href='./admin/reports/sale-reports/product'>Products</a><br>";
        echo "<a href='./admin/reports/sale-reports/subcategory'>Sub-Category</a><br>";
        echo "<a href='./admin/reports/sale-reports/category'>Category</a>";
    }
    elseif($url[6]=="product")
    {
        echo "<form method='post' action='./admin/reports/sale-reports/product/day'>
        <input style='border: 1px solid black!important;' type='date'>
        </form>";
        $qry = "SELECT SalesID, ProductID, COUNT(*) as total FROM orders GROUP BY ProductID ORDER BY total DESC";
        $stmt = $con->prepare($qry);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc())
        {

        }
    }
    elseif($url[6]=="subcategory")
    {
        echo "<h1>Please choose a subcategory</h1>";
    }
    elseif($url[6]=="category")
    {
        echo "<h1>Please choose a category</h1>";
    }
