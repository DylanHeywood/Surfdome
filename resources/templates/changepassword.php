<?php
require_once ("../resources/core/functions.php");
$newpw = $_POST['newpw'];
$confirm = $_POST['newpwconfirm'];
if(isset($_POST['oldpw']))
{
    $oldpw = $_POST['oldpw'];
    echo $newpw."<br>".$confirm."<br>".$oldpw;
    if($newpw == $confirm)
    {
        $qry = "SELECT Password from users where Email = ?";
        $stmt = $con->prepare($qry);
        $stmt->bind_param('s', $useremail);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc())
        {
            $password = $row['Password'];
            if($password == $oldpw)
            {
                if(Validate::validatePassword($newpw))
                {
                    $qry = "UPDATE users SET password=?";
                    $stmt = $con->prepare($qry);
                    $stmt->bind_param('s', $newpw);
                    $stmt->execute();
                    header("LOCATION: ../");
                }
                else
                {
                    $_SESSION['newpwerror']="failed";
                    header("LOCATION: ../new-password/");
                }
            }
            else
            {
                $_SESSION['newpwerror']="wrongpw";
                header("LOCATION: ../new-password/");
            }
        }
    }
    else
    {
        $_SESSION['newpwerror']="nomatch";
        header("LOCATION: ../new-password/");
    }
}
else
{
    if($newpw == $confirm)
    {
        $qry = "UPDATE users SET password=? WHERE Email = ?";
        $stmt = $con->prepare($qry);
        $stmt->bind_param('ss', $newpw, $_POST['email']);
        $stmt->execute();
        header("Location: ../");
    }
    else
    {
        $_SESSION['newpwerror']="nomatch";
        header("Location: ../change-password/".$_POST['code']."/");
    }
}