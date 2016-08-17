<!doctype html>
<html>
    <head>
      <base href="http://dev.idro.org.uk/~dylan.heywood/surfdomeCOPY/">
        <link rel="stylesheet" href="./html/css/stylenew.css">
        <script src="./html/js/script.js"></script>
        <script src="./html/js/jquery-3.0.0.min.js"></script>
        <script src='./html/js/jquery-ui.min.js'></script>
        <script src="./html/js/instafeed.min.js"></script>
        <link rel="stylesheet" href="./html/css/font-awesome-4.6.3/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:700' rel='stylesheet' type='text/css'>
        <meta charset="UTF-8">
        <title>Surfdome</title>
    </head>
    <body onload="hiding()">
    <?php
        require_once ("../resources/core/init.php");
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
    ?>
    </body>
</html>