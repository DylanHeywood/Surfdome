
<body>
<?php
echo "<header class='smallbg'>";
?>
<section id="smallhead">
    <section id="headercontent">
        <?php

        include("../resources/templates/top.php");
        include("../resources/templates/basket.php");
        ?>
        <section id="left">
            <?php
            echo "<br><br>";
            include("../resources/templates/navi.php");
            include("../resources/templates/advert.php");
            ?>
        </section>
        <section id='products'>
            <div class='allproducts'>
                <h1 id="loginh1">Recover Password</h1>
                <section id="loginform">
                <form form action="./send-email/" method="post"  onsubmit="return checkemail()">
                    <label for="email">Enter Your Email Address</label>
                    <div id="emailinput"><input id="emaillogin" onkeydown="hideerrors()" name="email" type="email" placeholder="Recover Password Here">
                        <div id="emailerror">
                            Please make sure you enter a valid Email
                        </div>
                    </div>
                    <button id="button2" type="submit">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </button><br><br>
                </form>
                </section>
        </section>
        <section id="largesocial">
            <div id="facebook"></div><div id="twitter"></div><div id="pintrest"></div>
        </section>
        <?php
        include("../resources/templates/footer.php");
        include("../resources/templates/footerbottom.php");
        ?>
        </div>

    </section>
</section>
</body>
</header>

</body>