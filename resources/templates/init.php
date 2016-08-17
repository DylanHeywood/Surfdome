<?php
$con = mysqli_connect("localhost","dylan_heywood","pass123","dylan_surfdome");

//include '../classes/Helpers.php';
//include '../classes/Menu.php';

spl_autoload_register(function ($class) {
    include '../classes/' . $class . '.php';
});


if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>