<?php
session_start();
session_destroy();
var_dump($_COOKIE);
foreach($_COOKIE as $key=>$val)
{
    setcookie($key, null, time()-1);
}

echo "<br>";
var_dump($_COOKIE);
header("Location: ../");
?>