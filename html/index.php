<!doctype html>
<html>
    <head>
      <base href="http://dev.idro.org.uk/~dylan.heywood/surfdomeCOPY/">
        <link rel="stylesheet" href="./html/css/stylenew.css">
        <script src="./html/js/jquery-3.0.0.min.js"></script>
        <script src='./html/js/jquery-ui.min.js'></script>
        <script src="./html/js/instafeed.min.js"></script>
        <script src="./html/js/drift-master/dist/Drift.min.js"></script>
        <script src="./html/js/elevatezoom-master/jquery.elevateZoom-3.0.8.min.js"></script>
        <script src="./html/js/script.js"></script>
        <link rel="stylesheet" href="./html/css/font-awesome-4.6.3/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:700' rel='stylesheet' type='text/css'>
        <meta charset="UTF-8">
        <title>Surfdome</title>
    </head>
    <body onload="hiding()">
    <?php
    require_once ("../resources/core/init.php");
    if(isset($_SESSION['UserLoggedIn']))
    {
        $useremail = $_SESSION['UserLoggedIn'];
    }
    elseif(isset($_COOKIE['UserLoggedIn']))
    {
        $useremail = $_COOKIE['UserLoggedIn'];
    }
        $qry = "SELECT ID FROM users WHERE Email = ?";
        $stmt = $con->prepare($qry);
        $stmt->bind_param('s', $useremail);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc())
        {
            $ID = $row['ID'];
        }
        $qry = "INSERT INTO pagehits VALUES(null,?,?,?)";
        $timestamp = date('Y-m-d G:i:s');
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if(!isset($ID))
        {
            $ID = 102;
        }
        $stmt = $con->prepare($qry);
        $stmt->bind_param('iss', $ID, $url, $timestamp);
        $stmt->execute();

        $url = explode("/",$_SERVER['REQUEST_URI']);
        if($url[3]==null)
        {
            require_once("../resources/templates/home.php");
        }
        elseif($url[3]=="category")
        {
            require_once("../resources/templates/category.php");
        }
        elseif($url[3]=="admin")
        {
            require_once("../resources/templates/admin.php");
        }
        elseif($url[3]=="my-account")
        {
            require_once("../resources/templates/myaccount.php");
        }
        elseif($url[3]=="forgot-password")
        {
            require_once("../resources/templates/forgotpass.php");
        }
        elseif($url[3]=="login")
        {
            header ("location: ../html/login/");
        }
        elseif($url[3]=="send-email")
        {
            require_once("../resources/templates/sendemail.php");
        }
        elseif($url[3]=="change-password")
        {
            require_once("../resources/templates/updatepassword.php");
        }
        elseif($url[3]=="change-password2")
        {
            require_once("../resources/templates/changepassword.php");
        }
        elseif($url[3]=="product" && $url[4]!==null)
        {
            require_once("../resources/templates/product.php");
        }
        elseif($url[3]=="product" && $url[4]==null)
        {
            require_once("../resources/templates/allproduct.php");
        }
        elseif($url[3]=="add-to-bag" && $url[4]==null)
        {
            require_once("../resources/templates/addtobag.php");
        }
        elseif($url[3]=="basket" && $url[4]==null)
        {
            require_once("../resources/templates/fullbasket.php");
        }
        elseif($url[3]=="updatebasket" && $url[4]==null)
        {
            require_once("../resources/templates/updatebasket.php");
        }
        elseif($url[3]=="removebasket" && $url[4]==null)
        {
            require_once("../resources/templates/removebasket.php");
        }
        elseif($url[3]=="checkout" && $url[4]==null)
        {
            require_once("../resources/templates/checkout.php");
        }
    ?>
    </body>
</html>