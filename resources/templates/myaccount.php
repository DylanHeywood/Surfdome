<?php
require_once ("../resources/core/functions.php");
if (isset($_SESSION['UserLoggedIn']) || isset($_COOKIE['UserLoggedIn'])) {}
else
{
    header("LOCATION: ../login/");
}
if(isset($_SESSION['UserLoggedIn']))
{
    $useremail = $_SESSION['UserLoggedIn'];
}
elseif(isset($_COOKIE['UserLoggedIn']))
{
    $useremail = $_COOKIE['UserLoggedIn'];
}
?>
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
echo "<header class='smallerbg'>
          <section id='smallhead'>
          <section id='headercontent'>";
          require_once("../resources/templates/top.php");
          echo "<br><section id='left'>";
          include("../resources/templates/navi.php");
          include("../resources/templates/advert.php");
          echo "</section>
                <section id='products' class='gap'>";
if($url[4]==null)
{
    require_once("../resources/templates/accountmain.php");
}
elseif($url[4]=="new-password")
{
    require_once("../resources/templates/newpassword.php");
}
elseif($url[4]=="change-password")
{
    require_once("../resources/templates/changepassword.php");
}
elseif($url[4]=="change-personal")
{
    require_once("../resources/templates/changepersonal.php");
}
elseif($url[4]=="edit-personal")
{
    require_once("../resources/templates/editpersonal.php");
}
elseif($url[4]=="history")
{
    require_once("../resources/templates/pagehistory.php");
}