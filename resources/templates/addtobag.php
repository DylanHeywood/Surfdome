<?php
$i = 0;
if(!isset($_SESSION['purchases']))
{
    $_SESSION['purchases'] = array();
}
$_SESSION['purchases'];
    $id = $_POST['product'];
    $size = $_POST['size'];
    $colour = $_POST['colour'];
    $quantity = $_POST['qty'];
echo $id." , ".$size." , ".$colour." , ".$quantity."<br>";
if ($_SESSION['purchases']!= null)
{
    foreach($_SESSION['purchases'] as $row)
    {

        if($row[0] == $id && $row[2] == $size && $row[3] == $colour)
        {
            $_SESSION['purchases'][$i][1]=$_SESSION['purchases'][$i][1]+$quantity;
            echo $row[1]."<br>";
        }
        else
        {
            array_push($_SESSION['purchases'],array($id,$quantity,$size,$colour));
            $_SESSION['basket'] = 'true';
        }
        $i++;
    }

}
else
{
    array_push($_SESSION['purchases'],array($id,$quantity,$size,$colour));
    $_SESSION['basket'] = 'true';
}
header('Location: ' .$_SERVER['HTTP_REFERER']);