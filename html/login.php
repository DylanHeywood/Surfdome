<!doctype html>
<html>
<head>
 <?php
        include ("../resources/core/init.php");
    if(isset($_COOKIE['UserLoggedIn']) || isset($_SESSION['UserLoggedIn']))
    {
        header("Location: ./");
    }
    ?>
  <base href="http://dev.idro.org.uk/~dylan.heywood/surfdomeCOPY/">
   <link rel="stylesheet" href="./html/css/stylenew.css">
   <script src="./html/js/jquery-3.0.0.min.js"></script>
   <script src="./html/js/jquery-ui.min.js"></script>
   <script src="./html/js/script.js"></script>
   <link rel="stylesheet" href="./html/css/font-awesome-4.6.3/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:700' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <title>Surfdome</title>
</head>
<body onload="hidelogin()">
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
                <h1 id="loginh1">LOG IN</h1>
        <section id="loginform">
        <?php
        if(isset($_SESSION['banned']))
        {
           echo "<div id='emailerror'>
                 Please make sure you enter a valid Email
                 </div>";
        }
            if(isset($_SESSION['error']) && $_SESSION['error'] == "login")
            {
                echo "<form form action='./html/checklogin.php' method='get'>
                   <label for='email'>Enter Your Email Address</label>
                    <div id='emailinput'><input id='emaillogin' onkeydown='hideerrors()' name='email' type='email' value='".$_SESSION['email']."' placeholder='Sign in here'>
                    <div id='emailerror'>
                        Please make sure you enter a valid Email
                    </div>
                    </div>
                    <input id='passwordlogin' onkeydown='hideerrors()' name='password' value='".$_SESSION['pass']."' type='password' placeholder='Password'>
                    <div id='passerror'>
                        Sorry you have entered an invalid login please try again
                    </div>
                    <div class='button'  onclick='checkemail()'>
                        <i id='button1' class='fa fa-arrow-right' aria-hidden='true'></i>
                    </div>
                    <button id='button2' type='submit'>
                       <i class='fa fa-arrow-right' aria-hidden='true'></i>
                    </button><br><br>
                </form>";
                $_SESSION['error'] = "FALSE";
                $_SESSION['email'] = "";
                $_SESSION['pass'] = "";
            }
            else
            {
        ?>
        <form form action="./html/checklogin.php" method="get">
           <label for="email">Enter Your Email Address</label>
            <div id="emailinput"><input id="emaillogin" onkeydown="hideerrors()" name="email" type="email" placeholder="Sign in here">
            <div id="emailerror">
                Please make sure you enter a valid Email
            </div>
            </div>
            <input id="passwordlogin" onkeydown="hideerrors()" name="password" type="password" placeholder="Password">
            <input id="remember" type="checkbox" name="remember" value="true">Remember Me<br><br>
            <a style="color:#333" href="./forgot-password/">Forgot Password?</a>
            <div class="button"  onclick="checkemail()">
                <i id="button1" class="fa fa-arrow-right" aria-hidden="true"></i>
            </div>
            <button id="button2" type="submit">
               <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </button><br><br>
       </form>
       <?php
            }
            ?>
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
</html>