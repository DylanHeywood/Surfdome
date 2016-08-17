<header id='one'>
   <section id="smallhead">
       <section id="headercontent">
            <?php
                include("../resources/templates/top.php");
                if(isset($_SESSION['user']))
                {
                    echo "<div id='loggedin'> <i class='fa fa-times' onclick='closewelc()' aria-hidden='true'></i> <h1> Logged in as </h1> <h2>".$_SESSION['user']."</2></div>";
                }
                elseif(isset($_COOKIE['user']))
                {
                    echo "<div id='loggedin'> <i class='fa fa-times' onclick='closewelc()' aria-hidden='true'></i> <h1> Logged in as </h1> <h2>".$_COOKIE['user']."</2></div>";
                }
                include("../resources/templates/basket.php");
                echo"<section id='welcome'>
                        <b><br><br><h1>WELCOME TO SURFDOME</h1><br>
                        <h4>The only online store you will ever need for all your windsurfing and kitesurfing and SUP needs</h4>
                        </b>
                    </section>
                    <section id='bannertext'>
                        <h1>SURFDOME 2016</h1>
                        <h6 id='text1'>Super easy going free ride boards based on the X-Cite Ride shape concept with additional control and super easy jibing</h6>
                        <h6 id='text2'>Richard Of York Gave Battle In Vain My Very Easy Method Just Speeds Up Name Planets Make Love Not Warcraft Twinkieeeee</h6>
                        <h6 id='text3'> i saw beyonces tizzles and my pizzle went crizzle, nulla purus euismod sheezy,gizzle luctus metus nulla et dope. Boom</h6>
                        <div onclick='moveright()' id='rightarrow'><i class='fa fa-chevron-right' aria-hidden='true'></i></div> 
                        <div onclick='moveleft()' id='leftarrow'><i class='fa fa-chevron-left' aria-hidden='true'></i></div> 
                        <div onclick='imageselect1()' id='bar1' class='currentimage imageslide'></div>
                        <div onclick='imageselect2()' id='bar2' class='imageslide'></div>
                        <div onclick='imageselect3()' id='bar3' class='imageslide'></div>
                    </section><br>";
            ?>
        <section id="left">
            <?php
                include("../resources/templates/navi.php");
                include("../resources/templates/advert.php");
                include("../resources/templates/tags.php");
            ?>
    </section>
            <?php
                include("../resources/templates/indexmain.php");
                include("../resources/templates/instagram.php");
            ?>
            <section id="largesocial">
            <div id="facebook"></div><div id="twitter"></div><div id="pintrest"></div>
        </section>
           
            <?php
                include("../resources/templates/footer.php");
                include("../resources/templates/footerbottom.php");
            ?>
        
    </section>
</section>
</header>