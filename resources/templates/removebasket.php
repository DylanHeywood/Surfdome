
<?php
    $i = 0;
    $id = $_POST['id'];
    $colour = $_POST['colour'];
    $size = $_POST['size'];
if ($_SESSION['purchases']!= null) {
    foreach ($_SESSION['purchases'] as $row) {
        echo $row[2]."<br>";
        echo $size;
        if ($row[0] == $id && $row[2] == $size && $row[3] == $colour) {
            array_splice($_SESSION['purchases'],$i);
        }
        $i++;
    }
}
else
{
    echo "FAIL";
}
header('Location: ' .$_SERVER['HTTP_REFERER']);