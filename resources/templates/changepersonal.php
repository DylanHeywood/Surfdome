<?php
$first = $_POST['firstname'];
$second = $_POST['secondname'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
if(isset($_SESSION['newperserror']))
    unset($_SESSION['newperserror']);
if($_POST['date'] <=9)
{
    $date = "0".$_POST['date'];
}
else
{
    $date = $_POST['date'];
}
if($_POST['month'] <=9)
{
    $month = "0".$_POST['month'];
}
else
{
    $month = $_POST['month'];
}
$year = $_POST['year'];
$dob = $_POST['year']."-".$month."-".$date;

if (!preg_match('/^[A-Za-z ]+$/', $first)) {
    $_SESSION['newperserror'] = "firstname";
    echo "fName";
    header("LOCATION: ../edit-personal/");
}

if (!preg_match('/^[\d]{10,11}$/', $phone1)) {
    echo "p1";
    $_SESSION['newperserror'] = 'phone1';
    //header("LOCATION: ../edit-personal/");
}
else if($phone2!==null||$phone2!==" ") {
    if (!preg_match('/^[\d]{10,11}$/', $phone2)) {
        echo "p2";
        $_SESSION['newperserror'] = "phone2";
        header("LOCATION: ../edit-personal/");
    }
}
if($month == 2 && $day>29)
{
    echo "p3";
    $_SESSION['newperserror'] = "date1";
    header("LOCATION: ../edit-personal/");
}
if($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12)
{
    if($day>31)
    {
        $_SESSION['newperserror'] = "date2";
        header("LOCATION: ../edit-personal/");
    }
}
if($month == 4 || $month==6 || $month==9 || $month==11)
{
    if($date>30)
    {
        $_SESSION['newperserror'] = "date3";
        header("LOCATION: ../edit-personal/");
    }
}
if($year <1900 || $year>2016)
{
    $_SESSION['newperserror'] = "year";
    header("LOCATION: ../edit-personal/");
}

$qry = "UPDATE users SET FirstName=?,Surname=?,Phone=?,Phone2=?,DOB=? WHERE Email = ?";
$stmt = $con->prepare($qry);
$stmt->bind_param('ssssss',$first,$second,$phone1,$phone2,$dob,$useremail);
$stmt->execute();
/*$qry = "UPDATE users SET password=?";
$stmt = $con->prepare($qry);
$stmt->bind_param('s', $newpw);
$stmt->execute();*/
