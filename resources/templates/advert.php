<section class="advert">
    <?php
        
        include("../resources/core/db.php");
        $max = mysqli_query($con,"SELECT COUNT(*) FROM adverts WHERE 1");
        $max = $max->fetch_array();
        $advert = mt_rand(1,$max[0]);
        $qry = "SELECT URL FROM adverts WHERE ID =".$advert."";
        $result=mysqli_query($con,$qry);
        
    
    
            while ($row = $result->fetch_array())
            {
                echo "<img src='".$row['URL']."'></img>";    
            }
    ?>
</section>