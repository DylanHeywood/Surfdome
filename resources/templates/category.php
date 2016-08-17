<?php
    if($url[4]==null)
    {
        echo "<header class='smallbg'>";
    }
?>
<section id="smallhead">
<section id="headercontent">
<?php
    include("../resources/templates/top.php");
    include("../resources/templates/basket.php");
?>
<section id="left"><br><br>
<?php
    include("../resources/templates/navi.php");
    include("../resources/templates/navi2.php");
    include("../resources/templates/advert.php");
    include("../resources/templates/tags.php");
    echo "</section>";
    include("../resources/templates/categorymain.php");
?>
<section id="largesocial">
    <div id="facebook"></div><div id="twitter"></div><div id="pintrest"></div>
</section>
<?php
    include("../resources/templates/footer.php");
    include("../resources/templates/footerbottom.php");
?>