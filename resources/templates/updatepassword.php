<?php

$code = $url[4];

$qry = "SELECT * FROM PasswordReset WHERE Active = 1";
$result = mysqli_query($con, $qry);
while ($r = $result->fetch_array()) {
    if($r['Code']==$code)
    {
        echo "<div id='newpassform'>";
        echo "<h2>New Password</h2><br><Br>";
        if(isset($_SESSION['newpwerror']))
        {
            if($_SESSION['newpwerror'] == "failed")
            {
                echo "<h3> Please make sure your password has at least 8 characters, 1 letter and 1 number </h3>";
            }
            else
            {
                echo "<h3> Please make sure your passwords match </h3>";
            }
            unset($_SESSION['newpwerror']);
            echo "<form method='POST' action='./change-password2/'>
            <input required class='changepasswordinput' id='newpw' name='newpw' onkeyup='checkpw()' type='password' placeholder='Enter New Password'><Br><br>
            <input required class='changepasswordinput' id='newpwconfirm' name='newpwconfirm' onkeyup='checkpw()' type='password' placeholder='Confirm New Password'><br><br>
            <input type='text' hidden value='".$code."' name='code'>
            <input type='text' hidden value='".$r['Email']."' name='email'>
            <input type='submit' value='change password'><br><Br>
            </form>";
        }
        else
        {
            echo "<form method='POST' action='./change-password2/'>
            <input required class='changepasswordinput' id='newpw' name='newpw' onkeyup='checkpw()' type='password' placeholder='Enter New Password'><Br><br>
            <input required class='changepasswordinput' id='newpwconfirm' name='newpwconfirm' onkeyup='checkpw()' type='password' placeholder='Confirm New Password'><br><br>
            <input type='text' hidden value='".$code."' name='code'>
            <input type='text' hidden value='".$r['Email']."' name='email'>
            <input type='submit' value='change password'><br><Br>
            </form>";
        }
    }
    else
    {
        echo "Dont try and be smart, please wait for an email with your code or requests on <a href='http://dev.idro.org.uk/~dylan.heywood/surfdomeCOPY/forgot-password/'>here</a>";
    }
}